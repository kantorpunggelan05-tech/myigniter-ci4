<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | MyIgniter CI4</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/css/AdminLTE.min.css') ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/js/plugins/iCheck/square/blue.css') ?>">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url() ?>"><b>MyIgniter</b>CI4</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-warning"><?= session()->getFlashdata('msg') ?></div>
    <?php endif;?>

    <?php if(session()->getFlashdata('error')):?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif;?>

    <form action="<?= base_url('auth/loginProcess') ?>" method="post">
      <?= csrf_field() ?>
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="<?= base_url('assets/js/plugins/jQuery/jQuery-2.1.4.min.js') ?>"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<!-- iCheck -->
<script src="<?= base_url('assets/js/plugins/iCheck/icheck.min.js') ?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>