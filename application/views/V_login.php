<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Monitoring App</title>
  <!-- backgroud -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="<?= base_url() ?>assets/dist/img/icon.png">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/animate.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/remixicon.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/boxicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/iconsax.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/metismenu.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/simplebar.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/calendar.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/sweetalert2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/jbox.all.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/editor.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/loaders.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/header.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/sidebar-menu.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/footer.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/responsive.css">
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

<body class="hold-transition login-page"  style="background-image: url(<?php echo base_url('assets/dist/img/KJABB.jpeg'); ?>);background-size:cover">
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

  <div class="account-content mt-4">
    <div class="account-header">
      <a href="">
        <img src="assets/dist/img/kedaireka2.png" alt="main-logo">
      </a>
      <?= $this->session->flashdata('info'); ?>
      <h3>Login Aplikasi Monitoring</h3>
    </div>

    <form class="account-wrap" method="post" action="<?= base_url() ?>index.php/login/proses_login">
      <div class="form-group mb-24 icon">
        <input type="text" name="nama" class="form-control" placeholder="Username" required>
        <img src="<?= base_url() ?>assets/images/icon/sms.svg" alt="sms">
      </div>
      <div class="form-group mb-24 icon">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <img src="<?= base_url() ?>assets/images/icon/key.svg" alt="key">
      </div>
      <div class="form-group mb-24">
        <button type="submit" class="default-btn">Log In</button>
      </div>
    </form>


  </div>

  <script src="<?= base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
  <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/js/owl.carousel.min.js"></script>
  <script src="<?= base_url() ?>assets/js/metismenu.min.js"></script>
  <script src="<?= base_url() ?>assets/js/simplebar.min.js"></script>
  <script src="<?= base_url() ?>assets/js/geticons.js"></script>
  <script src="<?= base_url() ?>assets/js/sweetalert2.all.min.js"></script>
  <script src="<?= base_url() ?>assets/js/jbox.all.min.js"></script>
  <script src="<?= base_url() ?>assets/js/editor.js"></script>
  <script src="<?= base_url() ?>assets/js/form-validator.min.js"></script>
  <script src="<?= base_url() ?>assets/js/contact-form-script.js"></script>
  <script src="<?= base_url() ?>assets/js/ajaxchimp.min.js"></script>
  <script src="<?= base_url() ?>assets/js/custom.js"></script>
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