<?= $this->extend('layout/wrapper') ?>

<?= $this->section('content') ?>

<div class="row">
    
    <!-- Kolom Kiri: Kartu Profil Singkat -->
    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/img/avatar.png') ?>" alt="User profile picture">
                <h3 class="profile-username text-center"><?= $user['name'] ?></h3>
                <p class="text-muted text-center">Administrator</p>
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Username</b> <a class="pull-right"><?= $user['username'] ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Member Since</b> <a class="pull-right"><?= date('d M Y', strtotime($user['created_at'])) ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Kolom Kanan: Form Edit (Tabs) -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <!-- Logika PHP sederhana untuk menentukan tab aktif saat redirect -->
                <?php $activeTab = session()->getFlashdata('activeTab') ?? 'profil'; ?>
                
                <li class="<?= $activeTab == 'profil' ? 'active' : '' ?>"><a href="#profil" data-toggle="tab">Edit Profil</a></li>
                <li class="<?= $activeTab == 'password' ? 'active' : '' ?>"><a href="#password" data-toggle="tab">Ganti Password</a></li>
            </ul>
            
            <div class="tab-content">
                
                <!-- TAB 1: EDIT PROFIL -->
                <div class="<?= $activeTab == 'profil' ? 'active' : '' ?> tab-pane" id="profil">
                    <form class="form-horizontal" action="<?= base_url('pengaturan/updateProfil') ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <?php if(validation_show_error('name') || validation_show_error('username')): ?>
                            <div class="alert alert-danger">
                                <p><?= validation_show_error('name') ?></p>
                                <p><?= validation_show_error('username') ?></p>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="<?= old('name', $user['name']) ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username" value="<?= old('username', $user['username']) ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary btn-flat">Simpan Profil</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- TAB 2: GANTI PASSWORD -->
                <div class="<?= $activeTab == 'password' ? 'active' : '' ?> tab-pane" id="password">
                    <form class="form-horizontal" action="<?= base_url('pengaturan/updatePassword') ?>" method="post">
                        <?= csrf_field() ?>

                        <!-- Error Khusus Password -->
                        <?php if(session()->getFlashdata('error_pass') || validation_show_error('password_lama') || validation_show_error('password_baru') || validation_show_error('konfirmasi_password')): ?>
                            <div class="alert alert-danger">
                                <p><?= session()->getFlashdata('error_pass') ?></p>
                                <p><?= validation_show_error('password_lama') ?></p>
                                <p><?= validation_show_error('password_baru') ?></p>
                                <p><?= validation_show_error('konfirmasi_password') ?></p>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="password_lama" class="col-sm-3 control-label">Password Lama</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Masukkan password saat ini">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_baru" class="col-sm-3 control-label">Password Baru</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Minimal 6 karakter">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="konfirmasi_password" class="col-sm-3 control-label">Konfirmasi</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Ulangi password baru">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-danger btn-flat">Ubah Password</button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
</div>

<?= $this->endSection() ?>