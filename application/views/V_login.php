<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Monitoring App</title>
  <!-- backgroud -->
  <!-- <div style="background-image: url(<?php echo base_url('assets/dist/img/keramba.jpg'); ?>);background-size:cover"> -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="<?= base_url() ?>assets/dist/img/icon.png">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/iCheck/square/blue.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
    .login {
      font-size: 24px;
      font-weight: bold;
      color: lightblue;
    }
  </style>
</head>

<body class="hold-transition login-page" style="background-image: url(<?php echo base_url('assets/dist/img/kerambaa.jpg'); ?>);background-size:cover">
  <nav class="navbar navbar-default" role="navigation" style="height: 60px;">
    <ul style="position: absolute; width: 100%;left: 0; text-align: center; margin:0 auto; z-index:3; top: 7px;">
      <img src="<?php echo base_url('assets/dist/img/undip.png'); ?>" width="35px" height="35px" style="margin-right: 15px;">
      <img src="<?php echo base_url('assets/dist/img/unpad.png'); ?>" width="35px" height="35px" style="margin-right: 15px;">
      <img src="<?php echo base_url('assets/dist/img/kampusmerdeka.png'); ?>" width="50px" height="35px" style="margin-right: 15px;">
      <img src="<?php echo base_url('assets/dist/img/tutwuri.png'); ?>" width="40px" height="35px" style="margin-right: 15px;">
      <img src="<?php echo base_url('assets/dist/img/kedaireka2.png'); ?>" width="70px" height="30px" style="margin-right: 15px;">
      <img src="<?php echo base_url('assets/dist/img/rai.png'); ?>" width="80px" height="50px" style="margin-right: 15px;">
      <img src="<?php echo base_url('assets/dist/img/cemebsa.png'); ?>" width="60px" height="35px" style="margin-right: 15px;">
      <img src="<?php echo base_url('assets/dist/img/mstp.png'); ?>" width="60px" height="35px" style="margin-right: 15px;">
      <img src="<?php echo base_url('assets/dist/img/lody.png'); ?>" width="50px" height="35px" style="margin-right: 15px;">
    </ul>
  </nav>
  <div class="login-box" style="margin-top: 120px;">
    <div class="login-box-body">
      <p class="login-box-msg login">Login <br> Aplikasi Monitoring</p><br>
      <?= $this->session->flashdata('info'); ?>

      <form method="post" action="<?= base_url() ?>index.php/login/proses_login">
        <div class="form-group has-feedback">
          <input type="text" name="nama" class="form-control" placeholder="Username" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
          <center><button type="submit" style="width: 100px;" class="btn btn-primary"> Login </button></center>
        </div>
      </form>
    </div>
  </div>

  <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
</body>

</html>