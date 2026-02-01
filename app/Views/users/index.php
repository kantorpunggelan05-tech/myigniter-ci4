<?= $this->extend('layout/wrapper') ?>

<?= $this->section('content') ?>

<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Daftar Administrator</h3>
        <div class="box-tools pull-right">
            <a href="<?= base_url('users/tambah') ?>" class="btn btn-primary btn-sm btn-flat">
                <i class="fa fa-user-plus"></i> Tambah User
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Terdaftar</th>
                        <th width="150" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($data_user as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= date('d M Y', strtotime($row['created_at'])) ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('users/edit/' . $row['id']) ?>" class="btn btn-warning btn-xs btn-flat"><i class="fa fa-pencil"></i> Edit</a>
                            
                            <?php if(session()->get('id') != $row['id']): ?>
                                <a href="<?= base_url('users/hapus/' . $row['id']) ?>" class="btn btn-danger btn-xs btn-flat" onclick="return confirm('Yakin hapus user ini?')"><i class="fa fa-trash"></i> Hapus</a>
                            <?php else: ?>
                                <button class="btn btn-default btn-xs btn-flat" disabled>Me</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>