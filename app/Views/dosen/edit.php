<?= $this->extend('layout/wrapper') ?>

<?= $this->section('content') ?>

<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Data Dosen</h3>
        <a href="<?= base_url('dosen') ?>" class="btn btn-default btn-sm btn-flat pull-right"><i class="fa fa-undo"></i> Kembali</a>
    </div>
    
    <form action="<?= base_url('dosen/update/' . $dosen['id']) ?>" method="post" class="form-horizontal">
        <?= csrf_field() ?>
        
        <div class="box-body">
            <?php if(validation_list_errors()): ?>
                <div class="alert alert-danger"><?= validation_list_errors() ?></div>
            <?php endif; ?>

            <div class="form-group">
                <label for="nidn" class="col-sm-2 control-label">NIDN</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nidn" value="<?= old('nidn', $dosen['nidn']) ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="<?= old('nama', $dosen['nama']) ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="gelar" class="col-sm-2 control-label">Gelar Akademik</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="gelar" value="<?= old('gelar', $dosen['gelar']) ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="mata_kuliah" class="col-sm-2 control-label">Mata Kuliah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="mata_kuliah" value="<?= old('mata_kuliah', $dosen['mata_kuliah']) ?>">
                </div>
            </div>
        </div>
        
        <div class="box-footer">
            <button type="submit" class="btn btn-warning pull-right btn-flat">Update Data</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>