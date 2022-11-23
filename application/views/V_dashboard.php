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
    <title>Monitoring | Dashboard</title>
</head>

<body class="body-bg-f8faff">
    <!-- Start Preloader Area -->
    <!-- <div class="preloader">
        <img src="assets/dist/img/logo.png" alt="main-logo">
    </div> -->
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
                                        <h3>
                                          <!-- name user -->
                                          <?php
                                          $user = $this->db->get_where('petugas', ['idpetugas' => $this->session->userdata('idpetugas')])->row_array();
                                          echo $user['nama'];
                                          ?>
                                        </h3>
                                        <span><?=$user['idpetugas']?></span>
                                    </div>
                                </a>

                                <div class="dropdown-menu">
                                    <div class="dropdown-header d-flex flex-column align-items-center">
                                        <div class="figure mb-3">
                                            <img src="assets/images/avatar.png" class="rounded-circle" alt="avatar">
                                        </div>

                                        <div class="info text-center">
                                            <span class="name"><?=$user['nama']?></span>
                                            <span><?=$user['idpetugas']?></span>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Area -->

        <!-- Start Sidebar Menu Area -->
        <nav class="sidebar-menu">
            <ul class="list-group flex-column d-inline-block first-menu" data-simplebar>
                <li class="list-group-item main-grid <?php if(uri_string() == 'dashboard')echo 'active'?>">
                    <a href="<?= base_url() ?>dashboard" class="icon">
                        <img src="assets/images/icon/element.svg" alt="element">
                    </a>
                </li>

                <li class="list-group-item main-grid <?php if(uri_string() == 'rekap')echo 'active'?>">
                    <a href="<?= base_url() ?>rekap" class="icon">
                        <img src="assets/images/icon/calendar.svg" alt="calendar">
                    </a>
                </li>

                <li class="list-group-item main-grid <?php if(uri_string() == 'sensor')echo 'active'?>" >
                    <a href="<?= base_url() ?>sensor" class="icon">
                        <img src="assets/images/icon/messages.svg" alt="messages">
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