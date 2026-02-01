<?= $this->extend('layout/wrapper') ?>

<!-- Menyisipkan CSS Grocery CRUD ke bagian head layout -->
<?= $this->section('styles') ?>
    <?php foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Manajemen Data Pengguna</h3>
    </div>
    <div class="box-body">
        <!-- Area Utama Output Grocery CRUD -->
        <?= $output ?>
    </div>
</div>

<?= $this->endSection() ?>

<!-- Menyisipkan JS Grocery CRUD ke bagian footer layout -->
<?= $this->section('script') ?>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
<?= $this->endSection() ?>