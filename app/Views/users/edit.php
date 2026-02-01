<?= $this->extend('layout/wrapper') ?>

<?= $this->section('content') ?>

<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Administrator</h3>
        <a href="<?= base_url('users') ?>" class="btn btn-default btn-sm btn-flat pull-right"><i class="fa fa-undo"></i> Kembali</a>
    </div>
    
    <form action="<?= base_url('users/update/' . $user['id']) ?>" method="post" class="form-horizontal">
        <?= csrf_field() ?>
        
        <div class="box-body">
            <?php if(validation_list_errors()): ?>
                <div class="alert alert-danger"><?= validation_list_errors() ?></div>
            <?php endif; ?>

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="<?= old('name', $user['name']) ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" value="<?= old('username', $user['username']) ?>">
                </div>
            </div>

            <hr>
            <div class="alert alert-info">Kosongkan kolom password di bawah jika tidak ingin mengganti password user ini.</div>

            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password Baru</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Biarkan kosong jika tidak diubah">
                </div>
            </div>

            <div class="form-group">
                <label for="conf_password" class="col-sm-2 control-label">Konfirmasi Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="conf_password" placeholder="Ulangi password baru">
                </div>
            </div>
        </div>
        
        <div class="box-footer">
            <button type="submit" class="btn btn-warning pull-right btn-flat">Update User</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>