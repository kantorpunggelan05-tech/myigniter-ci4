<?= $this->extend('layout/wrapper') ?>

<?= $this->section('content') ?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Input Data Dosen</h3>
        <a href="<?= base_url('dosen') ?>" class="btn btn-default btn-sm btn-flat pull-right"><i class="fa fa-undo"></i> Kembali</a>
    </div>
    
    <form action="<?= base_url('dosen/simpan') ?>" method="post" class="form-horizontal">
        <?= csrf_field() ?>
        
        <div class="box-body">
            <?php if(validation_list_errors()): ?>
                <div class="alert alert-danger"><?= validation_list_errors() ?></div>
            <?php endif; ?>

            <div class="form-group">
                <label for="nidn" class="col-sm-2 control-label">NIDN</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nidn" value="<?= old('nidn') ?>" placeholder="Nomor Induk Dosen Nasional">
                </div>
            </div>

            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="<?= old('nama') ?>" placeholder="Contoh: Budi Santoso">
                </div>
            </div>

            <div class="form-group">
                <label for="gelar" class="col-sm-2 control-label">Gelar Akademik</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="gelar" value="<?= old('gelar') ?>" placeholder="Contoh: S.Kom, M.Kom">
                </div>
            </div>

            <div class="form-group">
                <label for="mata_kuliah" class="col-sm-2 control-label">Mata Kuliah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="mata_kuliah" value="<?= old('mata_kuliah') ?>" placeholder="Mata Kuliah yang diampu">
                </div>
            </div>
        </div>
        
        <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right btn-flat">Simpan Data</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>