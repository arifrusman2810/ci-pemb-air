<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in - Pelanggan</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/iCheck/square/blue.css">

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href=""><b>App</b>Tagihan Air</a>
    </div>

    <div class="login-box-body">
      <h4 class="login-box-msg text-danger">Login Pelanggan</h4>
      <hr style="margin-top:0">
      <form action="<?= site_url('customer/auth/process') ?>" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
          </div>

          <div class="col-xs-4">
            <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>

        </div>
      </form>
    </div>
  </div>

  <script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js" type="f499c61fb0e446b436d47778-text/javascript"></script>
  <script src="<?= base_url('assets/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js" type="f499c61fb0e446b436d47778-text/javascript"></script>
  <script src="<?= base_url('assets/') ?>plugins/iCheck/icheck.min.js" type="f499c61fb0e446b436d47778-text/javascript"></script>
</body>
</html>
