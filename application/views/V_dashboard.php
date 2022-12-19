<?php $this->load->view('template/header'); ?>

<body class="body-bg-f8faff">
    
    <!-- Start Preloader Area -->
    <div class="preloader">
        <img src="assets/dist/img/logo.png" alt="main-logo">
    </div>
    <!-- End Preloader Area -->


    <!-- Start All Section Area -->
    <div class="all-section-area">
        <!-- Start Header Area -->
        <div class="header-area">
            <div class="container-fluid">
                <div class="header-content-wrapper">
                    <div class="header-content d-flex justify-content-between align-items-center">
                        <div class="header-left-content d-flex">
                            <div class="responsive-burger-menu d-block d-lg-none">
                                <span class="top-bar"></span>
                                <span class="middle-bar"></span>
                                <span class="bottom-bar"></span>
                            </div>

                            <div class="main-logo">
                                <a href="<?= base_url() ?>dashboard">
                                    <img src="<?= base_url() ?>assets/dist/img/undip.png" alt="main-logo" width="50px" height="50px">
                                </a>
                            </div>

                        </div>

                        <div class="header-right-content d-flex align-items-center">


                            <div class="header-right-option notification-option dropdown">
                                <?php
                                $notif = $this->db->get_where('notifikasi', ['is_read' => 0])->result_array();
                                $notif_count = count($notif);
                                ?>
                                <div class="dropdown-item dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="notification-btn">
                                        <img src="<?= base_url() ?>assets/images/icon/notification.svg" alt="notification">
                                        <span class="badge"><?= $notif_count; ?></span>
                                    </div>
                                </div>

                                <div class="dropdown-menu">
                                    <div class="dropdown-header d-flex justify-content-between align-items-center bg-linear">
                                        <span class="title d-inline-block"><?= $notif_count ?> New Notifications</span>
                                        <a href="<?= base_url()?>notifikasi/tandaisemua" class="mark-all-btn text-white d-inline-block">Mark all as read</a>
                                    </div>

                                    <div class="dropdown-wrap" data-simplebar>
                                        <?php foreach ($notif as $data) : ?>
                                            <a href="<?= base_url() ?>notifikasi" class="dropdown-item d-flex align-items-center">
                                                <div class="icon">
                                                    <i class='bx bx-comment-dots'></i>
                                                </div>

                                                <div class="content">
                                                    <span class="d-block"><?= $data['judul']; ?></span>
                                                </div>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>

                                    <div class="dropdown-footer">
                                        <a href="<?= base_url() ?>notifikasi" class="dropdown-item">View All</a>
                                    </div>
                                </div>
                            </div>

                            <div class="header-right-option dropdown profile-nav-item pt-0 pb-0">
                                <a class="dropdown-item dropdown-toggle avatar d-flex align-items-center" href="<?= base_url() ?>#" id="navbarDropdown-4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?= base_url() ?>assets/images/avatar.png" alt="avatar">
                                    <div class="d-none d-lg-block d-md-block">
                                        <h3>
                                            <!-- name user -->
                                            <?php
                                            $user = $this->db->get_where('petugas', ['idpetugas' => $this->session->userdata('idpetugas')])->row_array();
                                            echo $user['nama'];
                                            ?>
                                        </h3>
                                        <span>ID : <?= $user['idpetugas'] ?></span>
                                    </div>
                                </a>

                                <div class="dropdown-menu">
                                    <div class="dropdown-header d-flex flex-column align-items-center">
                                        <div class="figure mb-3">
                                            <img src="<?= base_url() ?>assets/images/avatar.png" class="rounded-circle" alt="avatar">
                                        </div>

                                        <div class="info text-center">
                                            <span class="name"><?= $user['nama'] ?></span>
                                            <span>ID : <?= $user['idpetugas'] ?></span>
                                        </div>
                                    </div>
                                    <div class="dropdown-footer">
                                        <ul class="profile-nav">
                                            <li class="nav-item">
                                                <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter"" class="nav-link">
                                                    <i class="ri-login-circle-line"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Area -->

        <!-- Start Sidebar Menu Area -->
        <nav class="sidebar-menu">
            <ul class="list-group flex-column d-inline-block first-menu" data-simplebar>
                <li class="list-group-item main-grid <?php if (uri_string() == 'dashboard') echo 'active' ?>">
                    <a href="<?= base_url() ?>dashboard" class="icon">
                        <img src="<?= base_url() ?>assets/images/icon/element.svg" alt="element">
                    </a>
                </li>

                <li class="list-group-item main-grid <?php if (uri_string() == 'rekap') echo 'active' ?>">
                    <a href="<?= base_url() ?>rekap" class="icon">
                        <img src="<?= base_url() ?>assets/images/icon/calendar.svg" alt="calendar">
                    </a>
                </li>

                <li class="list-group-item main-grid <?php if (preg_match('/sensor/', uri_string())) echo 'active' ?>">
                    <a href="<?= base_url() ?>sensor" class="icon">
                        <img src="<?= base_url() ?>assets/images/icon/messages.svg" alt="messages">
                    </a>
                </li>
                <li class="list-group-item main-grid <?php if (uri_string() == 'notifikasi') echo 'active' ?>">
                    <a href="<?= base_url() ?>notifikasi" class="icon">
                        <img src="<?= base_url() ?>assets/images/icon/notification.svg" alt="notif">
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar Menu Area -->

        <!-- Start Main Content Area -->
        <main class="main-content-wrap">

            <section class="content">
                <?php $this->load->view($content); ?>
            </section>
            <!-- End Features Area -->

        </main>
        <!-- End Main Content Area -->
    </div>
    <!-- End All Section Area -->

    <!-- Start Go Top Area -->
    <div class="go-top">
        <i class="ri-arrow-up-s-fill"></i>
        <i class="ri-arrow-up-s-fill"></i>
    </div>
    <!-- End Go Top Area -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Logout</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <b> Apakah anda yakin ingin keluar?</b>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-primary" href="<?= base_url() ?>login/logout">Logout</a>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    <!-- Jquery Min JS -->
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>assets/js/metismenu.min.js"></script>
    <script src="<?= base_url() ?>assets/js/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/js/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>assets/js/geticons.js"></script>
    <script src="<?= base_url() ?>assets/js/calendar.js"></script>
    <script src="<?= base_url() ?>assets/js/editor.js"></script>
    <script src="<?= base_url() ?>assets/js/form-validator.min.js"></script>
    <script src="<?= base_url() ?>assets/js/contact-form-script.js"></script>
    <script src="<?= base_url() ?>assets/js/ajaxchimp.min.js"></script>
    <script src="<?= base_url() ?>assets/js/custom.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/datatable/datatables.min.js"></script>

    <script>
        $(function() {
            $('#dataRekap').DataTable({
                order: []
            });
            $('#dataSensor').DataTable({
                order: []
            });
            $('#dataNotif').DataTable({
                order: []
            });

        })
    </script>
</body>

</html>