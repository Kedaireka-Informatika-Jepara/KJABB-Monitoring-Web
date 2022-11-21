<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Link Of CSS -->
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

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/images/favicon.svg">
    <!-- Title -->
    <title>Joxi - Admin Dashboard Bootstrap 5 Template</title>
</head>

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
                                    <img src="assets/dist/img/undip.png" alt="main-logo" width="50px" height="50px">
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
                                        <img src="assets/images/icon/notification.svg" alt="notification">
                                        <span class="badge"><?= $notif_count; ?></span>
                                    </div>
                                </div>

                                <div class="dropdown-menu">
                                    <div class="dropdown-header d-flex justify-content-between align-items-center bg-linear">
                                        <span class="title d-inline-block"><?= $notif_count?> New Notifications</span>
                                        <span class="mark-all-btn d-inline-block">Mark all as read</span>
                                    </div>

                                    <div class="dropdown-wrap" data-simplebar>
                                    <?php foreach($notif as $data) : ?>
                                        <a href="<?= base_url() ?>notifikasi" class="dropdown-item d-flex align-items-center">
                                            <div class="icon">
                                                <i class='bx bx-comment-dots'></i>
                                            </div>

                                            <div class="content">
                                                <span class="d-block"><?= $data['judul'];?></span>
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
                                    <img src="assets/images/avatar.png" alt="avatar">
                                    <div class="d-none d-lg-block d-md-block">
                                        <h3>Farrel</h3>
                                        <span>Super Admin</span>
                                    </div>
                                </a>

                                <div class="dropdown-menu">
                                    <div class="dropdown-header d-flex flex-column align-items-center">
                                        <div class="figure mb-3">
                                            <img src="assets/images/avatar.png" class="rounded-circle" alt="avatar">
                                        </div>

                                        <div class="info text-center">
                                            <span class="name">Admin</span>
                                            <p class="mb-3 email">
                                                <a href="<?= base_url() ?>mailto:johnsmilga@hello.com">johnsmilga@hello.com</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="dropdown-footer">
                                        <ul class="profile-nav">
                                            <li class="nav-item">
                                                <a href="<?= base_url() ?>login/logout" class="nav-link">
                                                    <i class="ri-login-circle-line"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="header-right-option template-option">
                                <a class="dropdown-item" href="<?= base_url() ?>#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                    <img src="assets/images/icon/setting.svg" alt="setting">
                                </a>
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
                <li class="list-group-item main-grid active">
                    <a href="<?= base_url() ?>dashboard" class="icon">
                        <img src="assets/images/icon/element.svg" alt="element">
                    </a>
                </li>

                <li class="list-group-item main-grid">
                    <a href="<?= base_url() ?>rekap" class="icon">
                        <img src="assets/images/icon/calendar.svg" alt="calendar">
                    </a>
                </li>

                <li class="list-group-item main-grid">
                    <a href="<?= base_url() ?>sensor" class="icon">
                        <img src="assets/images/icon/messages.svg" alt="messages">
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar Menu Area -->

        <!-- Start Main Content Area -->
        <main class="main-content-wrap">

            <!-- Start Features Area -->
            <div class="features-area">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-features">
                                <div class="row align-items-center">
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="single-click-content">
                                            <span class="features-title">CLICK THROUGH</span>
                                            <h3>9,670 <span>-0.21%</span></h3>
                                            <p>Lorem ipsum dolor sit amet, conset etur sadipscing elitr, sed.</p>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-sm-6">
                                        <div class="single-click-chart">
                                            <div id="click_chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="single-features color-style-1765fd">
                                <div class="row align-items-center">
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="single-click-content">
                                            <span class="features-title">VIEW THROUGH</span>
                                            <h3>5,952 <span>+0.21%</span></h3>
                                            <p>Lorem ipsum dolor sit amet, conset etur sadipscing elitr, sed.</p>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-sm-6">
                                        <div class="single-click-chart">
                                            <div id="view_chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="single-features color-style-5c31d6">
                                <div class="row align-items-center">
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="single-click-content">
                                            <span class="features-title">TOTAL CONVERSIONS</span>
                                            <h3>10,302 <span>+0.21%</span></h3>
                                            <p>Lorem ipsum dolor sit amet, conset etur sadipscing elitr, sed.</p>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-sm-6">
                                        <div class="single-click-chart">
                                            <div id="conversions_chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Features Area -->

            <!-- Start Overview Area -->
            <div class="overview-area">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="overview-content-wrap card-box-style">
                                <div class="overview-content d-flex justify-content-between align-items-center">
                                    <div class="overview-title">
                                        <h3>Audience Overview</h3>
                                        <span>1 July, 2021 - 14 July, 2021</span>
                                    </div>

                                    <ul class="total-overview">
                                        <li>
                                            <button class="today">Today</button>
                                        </li>
                                        <li>
                                            <button>7d</button>
                                        </li>
                                        <li>
                                            <button class="active">2w</button>
                                        </li>
                                        <li>
                                            <button>1m</button>
                                        </li>
                                        <li>
                                            <button>3m</button>
                                        </li>
                                        <li>
                                            <button>1y</button>
                                        </li>
                                    </ul>
                                </div>

                                <div class="audience-content-wrap">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="single-audience d-flex justify-content-between align-items-center">
                                                <div class="audience-content">
                                                    <h5>New Users</h5>
                                                    <h4>19,202 <span>+55%</span></h4>
                                                </div>
                                                <div class="icon">
                                                    <img src="assets/images/icon/white-profile-2user.svg" alt="white-profile-2user">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="single-audience d-flex justify-content-between align-items-center">
                                                <div class="audience-content">
                                                    <h5>Page Views</h5>
                                                    <h4>21,202 <span>+32%</span></h4>
                                                </div>
                                                <div class="icon">
                                                    <img src="assets/images/icon/eye.svg" alt="eye">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="single-audience d-flex justify-content-between align-items-center">
                                                <div class="audience-content">
                                                    <h5>Page Sessions</h5>
                                                    <h4>15,251 <span>+23%</span></h4>
                                                </div>
                                                <div class="icon">
                                                    <img src="assets/images/icon/timer.svg" alt="timer">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="single-audience d-flex justify-content-between align-items-center">
                                                <div class="audience-content color-style-fe5957">
                                                    <h5>Bounce Rate</h5>
                                                    <h4>21,202 <span>-15%</span></h4>
                                                </div>
                                                <div class="icon">
                                                    <img src="assets/images/icon/mask.svg" alt="mask">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="audience-chart">
                                        <div id="overview_chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="traffic-content card-box-style">
                                <div class="main-title d-flex justify-content-between align-items-center">
                                    <h3>Traffic Channel</h3>

                                    <select class="form-select form-control" aria-label="Default select example">
                                        <option selected>15 days</option>
                                        <option value="1">16 days</option>
                                        <option value="2">17 days</option>
                                        <option value="3">18 days</option>
                                    </select>
                                </div>

                                <div class="traffic-chart text-center">
                                    <div id="traffic_chart"></div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-xxl-3 col-md-3 col-sm-3">
                                        <div class="single-traffic">
                                            <span class="title">Organic Search</span>
                                            <h4>19,202 <span>+32.50%</span></h4>
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-md-3 col-sm-3">
                                        <div class="single-traffic border-style-5c31d6">
                                            <span class="title">Social Media</span>
                                            <h4>15,202 <span>+32.50%</span></h4>
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-md-3 col-sm-3">
                                        <div class="single-traffic border-style-4fcb8d">
                                            <span class="title">Email</span>
                                            <h4>502 <span>+2%</span></h4>
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-md-3 col-sm-3">
                                        <div class="single-traffic border-style-fec107">
                                            <span class="title">Referrals</span>
                                            <h4>1,202 <span>+32.50%</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Overview Area -->

            <!-- Start Device Website Area -->
            <div class="device-website-area">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-xxl-7">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="device-content card-box-style">
                                        <div class="main-title d-flex justify-content-between align-items-center">
                                            <h3>Device Sessions</h3>

                                            <select class="form-select form-control" aria-label="Default select example">
                                                <option selected>30 days</option>
                                                <option value="1">15 days</option>
                                                <option value="2">10 days</option>
                                                <option value="3">5 days</option>
                                            </select>
                                        </div>

                                        <div class="device-chart text-center">
                                            <div id="device_chart"></div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <div class="single-device">
                                                    <span class="title">Mobile</span>
                                                    <h4>32,590 <span>+2%</span></h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <div class="single-device border-style-4fcb8d">
                                                    <span class="title">Desktop</span>
                                                    <h4>19,202 <span>+32.50%</span></h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <div class="single-device border-style-fec107">
                                                    <span class="title">Tablet</span>
                                                    <h4>1,202 <span>+32.50%</span></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="device-content website card-box-style">
                                        <div class="main-title d-flex justify-content-between align-items-center">
                                            <h3>Website Performance</h3>

                                            <select class="form-select form-control" aria-label="Default select example">
                                                <option selected>30 days</option>
                                                <option value="1">15 days</option>
                                                <option value="2">10 days</option>
                                                <option value="3">5 days</option>
                                            </select>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-12 col-sm-6">
                                                <div class="single-website-performance d-flex justify-content-between align-items-center">
                                                    <div class="website-performance-content">
                                                        <h5>Bounce Rate (avg)</h5>
                                                        <h4>24.67% <span>+04.18%</span></h4>
                                                    </div>
                                                    <div class="website-chart">
                                                        <div id="bounce_rate"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-6">
                                                <div class="single-website-performance d-flex justify-content-between align-items-center">
                                                    <div class="website-performance-content color-style-fe5957">
                                                        <h5>Page Views (avg)</h5>
                                                        <h4>7.32% <span>-0.21%</span></h4>
                                                    </div>
                                                    <div class="website-chart">
                                                        <div id="page_views"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-6">
                                                <div class="single-website-performance d-flex justify-content-between align-items-center">
                                                    <div class="website-performance-content">
                                                        <h5>Time On Site (avg)</h5>
                                                        <h4>1min 30s <span>+2.50%</span></h4>
                                                    </div>
                                                    <div class="website-chart">
                                                        <div id="time_on_site"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-5">
                            <div class="website-up-down card-box-style">
                                <div class="main-title d-flex justify-content-between align-items-center">
                                    <h3>Website Performance</h3>

                                    <select class="form-select form-control" aria-label="Default select example">
                                        <option selected>30 days</option>
                                        <option value="1">15 days</option>
                                        <option value="2">10 days</option>
                                        <option value="3">5 days</option>
                                    </select>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="single-up-and-down d-flex justify-content-between align-items-center">
                                            <div class="up-and-down-content">
                                                <h5>Monthly</h5>
                                                <h4><span>+32%</span></h4>
                                            </div>
                                            <div class="total">
                                                <h4 class="mb-0">7.32%</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="single-up-and-down d-flex justify-content-between align-items-center">
                                            <div class="up-and-down-content color-style-fe5957">
                                                <h5>Weekly</h5>
                                                <h4><span>-01.17%</span></h4>
                                            </div>
                                            <div class="total">
                                                <h4 class="mb-0">7.32%</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="single-up-and-down d-flex justify-content-between align-items-center mb-0">
                                            <div class="up-and-down-content">
                                                <h5>Today</h5>
                                                <h4><span>+03.93%</span></h4>
                                            </div>
                                            <div class="total">
                                                <h4 class="mb-0">7.32%</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="sessions-chart">
                                    <div id="sessions_chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Device Website Area -->

            <!-- Start Total Visits Area -->
            <div class="total-visits-browse-area">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-xxl-6">
                            <div class="total-visits-content card-box-style">
                                <div class="main-title d-flex justify-content-between align-items-center">
                                    <h3>Total Visits</h3>

                                    <select class="form-select form-control" aria-label="Default select example">
                                        <option selected>30 days</option>
                                        <option value="1">15 days</option>
                                        <option value="2">10 days</option>
                                        <option value="3">7 days</option>
                                    </select>
                                </div>

                                <table class="table align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">LINK</th>
                                            <th scope="col">PAGE TITLE</th>
                                            <th scope="col">PERCENTAGE (%)</th>
                                            <th scope="col" class="present">VALUE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <a href="<?= base_url() ?>index.html">
                                                    <img src="assets/images/icon/link.svg" alt="link">
                                                </a>
                                            </th>
                                            <td>
                                                <span>Homepage</span>
                                            </td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 65.35%;" aria-valuenow="65.35" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="present">
                                                <span>65.35%</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">
                                                <a href="<?= base_url() ?>index.html">
                                                    <img src="assets/images/icon/link.svg" alt="link">
                                                </a>
                                            </th>
                                            <td>
                                                <span>Our Services</span>
                                            </td>
                                            <td>
                                                <div class="progress services">
                                                    <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 40.25%;" aria-valuenow="40.25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="present">
                                                <span>40.25%</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">
                                                <a href="<?= base_url() ?>index.html">
                                                    <img src="assets/images/icon/link.svg" alt="link">
                                                </a>
                                            </th>
                                            <td>
                                                <span>List of Products</span>
                                            </td>
                                            <td>
                                                <div class="progress products">
                                                    <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 25.15%;" aria-valuenow="25.15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="present">
                                                <span>25.15%</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">
                                                <a href="<?= base_url() ?>index.html">
                                                    <img src="assets/images/icon/link.svg" alt="link">
                                                </a>
                                            </th>
                                            <td>
                                                <span>Blog</span>
                                            </td>
                                            <td>
                                                <div class="progress blog">
                                                    <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 80.95%;" aria-valuenow="80.95" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="present">
                                                <span>80.95%</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">
                                                <a href="<?= base_url() ?>index.html">
                                                    <img src="assets/images/icon/link.svg" alt="link">
                                                </a>
                                            </th>
                                            <td>
                                                <span>Contact Us</span>
                                            </td>
                                            <td>
                                                <div class="progress contact">
                                                    <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 42.35%;" aria-valuenow="42.35" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="present">
                                                <span>42.35%</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-xxl-6">
                            <div class="total-browse-content card-box-style">
                                <div class="main-title d-flex justify-content-between align-items-center">
                                    <h3>Browser Used By Users</h3>

                                    <select class="form-select form-control" aria-label="Default select example">
                                        <option selected>30 days</option>
                                        <option value="1">15 days</option>
                                        <option value="2">10 days</option>
                                        <option value="3">7 days</option>
                                    </select>
                                </div>

                                <table class="table align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">BROWSER</th>
                                            <th scope="col">SESSIONS</th>
                                            <th scope="col">BOUNCE RATE</th>
                                            <th scope="col">CONVERSION RATE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <a href="<?= base_url() ?>index.html">
                                                    <img src="assets/images/apps/chrome.svg" alt="chrome">
                                                    <span class="ms-2">Google Chrome</span>
                                                </a>
                                            </th>
                                            <td>
                                                <span>13,410</span>
                                            </td>
                                            <td>
                                                <span>65.35%</span>
                                            </td>
                                            <td>
                                                <span>12.32%</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">
                                                <a href="<?= base_url() ?>index.html">
                                                    <img src="assets/images/apps/mozilla.svg" alt="mozilla">
                                                    <span class="ms-2">Mozilla Firefox</span>
                                                </a>
                                            </th>
                                            <td>
                                                <span>14,530</span>
                                            </td>
                                            <td>
                                                <span>40.25%</span>
                                            </td>
                                            <td>
                                                <span>19.59%</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">
                                                <a href="<?= base_url() ?>index.html">
                                                    <img src="assets/images/apps/safari.svg" alt="safari">
                                                    <span class="ms-2">Apple Safari</span>
                                                </a>
                                            </th>
                                            <td>
                                                <span>2,515</span>
                                            </td>
                                            <td>
                                                <span>25.15%</span>
                                            </td>
                                            <td>
                                                <span>11.42%</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">
                                                <a href="<?= base_url() ?>index.html">
                                                    <img src="assets/images/apps/edge.svg" alt="edge">
                                                    <span class="ms-2">Microsoft Edge</span>
                                                </a>
                                            </th>
                                            <td>
                                                <span>1095</span>
                                            </td>
                                            <td>
                                                <span>80.95%</span>
                                            </td>
                                            <td>
                                                <span>13.31%</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">
                                                <a href="<?= base_url() ?>index.html">
                                                    <img src="assets/images/apps/opera.svg" alt="opera">
                                                    <span class="ms-2">Opera</span>
                                                </a>
                                            </th>
                                            <td>
                                                <span>235</span>
                                            </td>
                                            <td>
                                                <span>42.35%</span>
                                            </td>
                                            <td>
                                                <span>2.35%</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">
                                                <a href="<?= base_url() ?>index.html">
                                                    <img src="assets/images/apps/uc-browser.svg" alt="uc-browser">
                                                    <span class="ms-2">UC Browser</span>
                                                </a>
                                            </th>
                                            <td>
                                                <span>132</span>
                                            </td>
                                            <td>
                                                <span>42.35%</span>
                                            </td>
                                            <td>
                                                <span>12.21%</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Total Visits Area -->

            <!-- Start Footer Area -->
            <div class="footer-area">
                <div class="container-fluid">
                    <div class="footer-content">
                        <p>© Joxi is Proudly Owned by <a href="<?= base_url() ?>https://envytheme.com/" target="_blank">EnvyTheme</a></p>
                    </div>
                </div>
            </div>
            <!-- End Footer Area -->

        </main>
        <!-- End Main Content Area -->
    </div>
    <!-- End All Section Area -->

    <!-- Start Template Sidebar Area -->
    <div class="template-sidebar-area">
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
            <div class="offcanvas-header">
                <a href="<?= base_url() ?>index.html">
                    <img src="assets/images/main-logo.svg" alt="main-logo">
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul>
                    <li>
                        <a class="default-btn btn active" target="_blank" href="<?= base_url() ?>#">
                            Buy Now
                        </a>
                    </li>
                    <li>
                        <a class="default-btn btn" target="_blank" href="<?= base_url() ?>https://themeforest.net/user/envytheme/portfolio">
                            Our Portfolio
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Template Sidebar Area -->

    <!-- Start Go Top Area -->
    <div class="go-top">
        <i class="ri-arrow-up-s-fill"></i>
        <i class="ri-arrow-up-s-fill"></i>
    </div>
    <!-- End Go Top Area -->
<!-- chart -->
<script>
    $(function() {
      $('.select2').select2()
    });
  </script>

  <script>
    $(function() {
      $('#datepicker').datepicker({
        autoclose: true
      })
    });
  </script>

  <script>
    $(function() {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      })
    })
  </script>

  <script>
    $(function() {
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */

      //--------------
      //- AREA CHART -
      //--------------

      // Get context with jQuery - using jQuery's .get() method.
      var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
      // This will get the first returned node in the jQuery collection.
      var areaChart = new Chart(areaChartCanvas)

      var areaChartData = {
        labels: [<?php
                  if (count($graph) > 0) {
                    foreach ($graph as $row) {
                      echo "'" . $row->waktu . "',";
                    }
                  }
                  ?>],
        datasets: [{
          label: 'Digital Goods',
          fillColor: 'rgba(60,141,188,0.9)',
          strokeColor: 'rgba(60,141,188,0.8)',
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: [<?php
                  if (count($graph) > 0) {
                    foreach ($graph as $row) {
                      echo $row->relay . ", ";
                    }
                  }
                  ?>]
        }]
      }

      var areaChartOptions = {
        //Boolean - If we should show the scale at all
        showScale: true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines: false,
        //String - Colour of the grid lines
        scaleGridLineColor: 'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        scaleGridLineWidth: 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: true,
        //Boolean - Whether the line is curved between points
        bezierCurve: true,
        //Number - Tension of the bezier curve between points
        bezierCurveTension: 0.3,
        //Boolean - Whether to show a dot for each point
        pointDot: false,
        //Number - Radius of each point dot in pixels
        pointDotRadius: 4,
        //Number - Pixel width of point dot stroke
        pointDotStrokeWidth: 1,
        //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
        pointHitDetectionRadius: 20,
        //Boolean - Whether to show a stroke for datasets
        datasetStroke: true,
        //Number - Pixel width of dataset stroke
        datasetStrokeWidth: 2,
        //Boolean - Whether to fill the dataset with a color
        datasetFill: true,
        //String - A legend template
        legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio: true,
        //Boolean - whether to make the chart responsive to window resizing
        responsive: true
      }

      //Create the line chart
      areaChart.Line(areaChartData, areaChartOptions)

      //----------------
      //- AREA CHART 2 -
      //----------------

      // Get context with jQuery - using jQuery's .get() method.
      var areaChartCanvas2 = $('#areaChart2').get(0).getContext('2d')
      // This will get the first returned node in the jQuery collection.
      var areaChart2 = new Chart(areaChartCanvas2)
      var areaChartOptions2 = areaChartOptions

      var areaChartData2 = {
        labels: [<?php
                  if (count($graph) > 0) {
                    foreach ($graph as $row) {
                      echo "'" . $row->waktu . "',";
                    }
                  }
                  ?>],
        datasets: [{
          label: 'Digital Goods',
          fillColor: '#5ac18e',
          strokeColor: '#5ac18e',
          pointColor: '#3b8bba',
          pointStrokeColor: '#5ac18e',
          pointHighlightFill: '#fff',
          pointHighlightStroke: '#5ac18e',
          data: [<?php
                  if (count($graph) > 0) {
                    foreach ($graph as $row) {
                      echo $row->suhu . ", ";
                    }
                  }
                  ?>]
        }]
      }
      areaChart2.Line(areaChartData2, areaChartOptions2)

      //----------------
      //- AREA CHART 3 -
      //----------------

      // Get context with jQuery - using jQuery's .get() method.
      var areaChartCanvas3 = $('#areaChart3').get(0).getContext('2d')
      // This will get the first returned node in the jQuery collection.
      var areaChart3 = new Chart(areaChartCanvas3)
      var areaChartOptions3 = areaChartOptions

      var areaChartData3 = {
        labels: [<?php
                  if (count($graph) > 0) {
                    foreach ($graph as $row) {
                      echo "'" . $row->waktu . "',";
                    }
                  }
                  ?>],
        datasets: [{
          label: 'Digital Goods',
          fillColor: '#ffa500',
          strokeColor: '#ffa500',
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: [<?php
                  if (count($graph) > 0) {
                    foreach ($graph as $row) {
                      echo $row->amonia . ", ";
                    }
                  }
                  ?>]
        }]
      }
      areaChart3.Line(areaChartData3, areaChartOptions3)

      //----------------
      //- AREA CHART 4 -
      //----------------

      // Get context with jQuery - using jQuery's .get() method.
      var areaChartCanvas4 = $('#areaChart4').get(0).getContext('2d')
      // This will get the first returned node in the jQuery collection.
      var areaChart4 = new Chart(areaChartCanvas4)
      var areaChartOptions4 = areaChartOptions

      var areaChartData4 = {
        labels: [<?php
                  if (count($graph) > 0) {
                    foreach ($graph as $row) {
                      echo "'" . $row->waktu . "',";
                    }
                  }
                  ?>],
        datasets: [{
          label: 'Digital Goods',
          fillColor: '#ff0000',
          strokeColor: '#ff0000',
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: [<?php
                  if (count($graph) > 0) {
                    foreach ($graph as $row) {
                      echo $row->curah_hujan . ", ";
                    }
                  }
                  ?>]
        }]
      }
      areaChart4.Line(areaChartData4, areaChartOptions4)
    })
  </script>
  <!-- end chart -->
    <!-- Jquery Min JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/simplebar.min.js"></script>
    <script src="assets/js/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/apexcharts/website-analytics.js"></script>
    <script src="assets/js/geticons.js"></script>
    <script src="assets/js/calendar.js"></script>
    <script src="assets/js/editor.js"></script>
    <script src="assets/js/form-validator.min.js"></script>
    <script src="assets/js/contact-form-script.js"></script>
    <script src="assets/js/ajaxchimp.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>