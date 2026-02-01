<?= $this->extend('layout/wrapper') ?>

<?= $this->section('content') ?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Tambah Administrator Baru</h3>
        <a href="<?= base_url('users') ?>" class="btn btn-default btn-sm btn-flat pull-right"><i class="fa fa-undo"></i> Kembali</a>
    </div>
    
    <form action="<?= base_url('users/simpan') ?>" method="post" class="form-horizontal">
        <?= csrf_field() ?>
        
        <div class="box-body">
            <!-- Tampilkan Error Validasi -->
            <?php if(validation_list_errors()): ?>
                <div class="alert alert-danger"><?= validation_list_errors() ?></div>
            <?php endif; ?>

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="<?= old('name') ?>" placeholder="Nama Lengkap">
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" value="<?= old('username') ?>" placeholder="Username untuk login">
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Minimal 6 karakter">
                </div>
            </div>

            <div class="form-group">
                <label for="conf_password" class="col-sm-2 control-label">Konfirmasi Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="conf_password" placeholder="Ulangi password">
                </div>
            </div>
        </div>
        
        <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right btn-flat">Simpan User</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>