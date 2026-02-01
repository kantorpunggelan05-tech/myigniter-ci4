<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?? 'MyIgniter CI4' ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/AdminLTE.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/skins/_all-skins.min.css') ?>">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="<?= base_url() ?>" class="logo">
      <span class="logo-mini"><b>M</b>I4</span>
      <span class="logo-lg"><b>MyIgniter</b>CI4</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url('assets/img/avatar.png') ?>" class="user-image" alt="User Image">
              <!-- NAMA DINAMIS -->
              <span class="hidden-xs"><?= session()->get('name') ?? 'Guest' ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?= base_url('assets/img/avatar.png') ?>" class="img-circle" alt="User Image">
                <p>
                  <?= session()->get('name') ?? 'Guest' ?> - Admin
                  <small>User: <?= session()->get('username') ?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url('profil') ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>