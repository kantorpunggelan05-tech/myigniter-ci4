<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?? 'MyIgniter CI4' ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- CSS Utama -->
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/AdminLTE.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/skins/_all-skins.min.css') ?>">

  <!-- Section Styles Khusus Halaman (Grocery CRUD butuh ini) -->
  <?= $this->renderSection('styles') ?>

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Header -->
  <?= $this->include('layout/header_content') ?>

  <!-- Sidebar -->
  <?= $this->include('layout/sidebar') ?>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= $title ?? 'Page Title' ?>
            <small><?= $subtitle ?? '' ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?= $title ?? '' ?></li>
        </ol>
    </section>

    <section class="content">
        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Konten Utama -->
        <?= $this->renderSection('content') ?>

    </section>
  </div>

  <!-- Footer -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs"><b>Version</b> 1.0.0</div>
    <strong>Copyright &copy; <?= date('Y') ?> <a href="#">Kantor Punggelan Tech</a>.</strong> All rights reserved.
  </footer>

</div>

<!-- Script Utama -->
<script src="<?= base_url('assets/js/plugins/jQuery/jQuery-2.1.4.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/app.min.js') ?>"></script>
<script src="<?= base_url('assets/js/pace.min.js') ?>"></script>

<!-- Section Script Khusus Halaman (Grocery CRUD butuh ini) -->
<?= $this->renderSection('script') ?>

</body>
</html>