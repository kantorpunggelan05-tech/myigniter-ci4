<?= $this->extend('layout/wrapper') ?>

<?= $this->section('content') ?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Daftar Dosen Pengajar</h3>
        <div class="box-tools pull-right">
            <a href="<?= base_url('dosen/tambah') ?>" class="btn btn-primary btn-sm btn-flat">
                <i class="fa fa-plus"></i> Tambah Dosen
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>NIDN</th>
                        <th>Nama Lengkap</th>
                        <th>Gelar</th>
                        <th>Mata Kuliah</th>
                        <th width="150" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($data_dosen as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nidn'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['gelar'] ?></td>
                        <td><?= $row['mata_kuliah'] ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('dosen/edit/' . $row['id']) ?>" class="btn btn-warning btn-xs btn-flat"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="<?= base_url('dosen/hapus/' . $row['id']) ?>" class="btn btn-danger btn-xs btn-flat" onclick="return confirm('Yakin hapus data ini?')"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                    <?php if(empty($data_dosen)): ?>
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data dosen.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>