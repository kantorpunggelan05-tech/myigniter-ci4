<?= $this->extend('layout/wrapper') ?>

<?= $this->section('content') ?>

<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Perbarui Data Mahasiswa</h3>
        <a href="<?= base_url('coba') ?>" class="btn btn-default btn-sm btn-flat pull-right"><i class="fa fa-undo"></i> Kembali</a>
    </div>
    
    <!-- Form Start -->
    <form action="<?= base_url('update/' . $mahasiswa['id']) ?>" method="post" class="form-horizontal">
        <?= csrf_field() ?>
        
        <div class="box-body">
            <!-- Tampilkan Error Validasi -->
            <?php if(validation_list_errors()): ?>
                <div class="alert alert-danger">
                    <?= validation_list_errors() ?>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="nim" class="col-sm-2 control-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nim" name="nim" value="<?= old('nim', $mahasiswa['nim']) ?>" placeholder="Nomor Induk Mahasiswa">
                </div>
            </div>

            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama', $mahasiswa['nama']) ?>" placeholder="Nama Lengkap">
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        
        <div class="box-footer">
            <button type="submit" class="btn btn-warning pull-right btn-flat">Update Data</button>
        </div>
        <!-- /.box-footer -->
    </form>
</div>

<?= $this->endSection() ?>