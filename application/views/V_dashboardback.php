<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Monitoring | <?= $judul; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="icon" href="<?= base_url() ?>assets/dist/img/icon.png">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- jQuery 3 -->
  <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  
</head>

<body class="hold-transition skin-blue-light sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?= base_url() ?>dashboard" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b><img src="<?= base_url() ?>assets/dist/img/fishh.png" width="50" height="45"></b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Monitoring</b>Ikan</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <?php
            $notif = $this->db->get_where('notifikasi', ['is_read' => 0])->result_array();
            $notif_count = count($notif);
            ?>
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o " style="font-size:17px;"></i>
                <span class="label label-warning"><?= $notif_count; ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Anda memiliki <?= $notif_count; ?> notifikasi</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <?php foreach ($notif as $data) : ?>
                        <a href="<?= base_url() ?>notifikasi">
                          <i class="fa fa-warning text-yellow"></i> <?= $data['judul']; ?>
                        </a>
                      <?php endforeach; ?>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="<?= base_url() ?>notifikasi">View all</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- Awal Menu  -->

    <?php $this->load->view('V_menu'); ?>

    <!-- Akhir Menu -->

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?= $judul; ?>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <?php $this->load->view($content); ?>
      </section>
    </div>
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- jQuery UI 1.11.4 -->
  <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <script src="<?= base_url() ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/chart.js/Chart.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/raphael/raphael.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/morris.js/morris.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
  <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
  <script src="<?= base_url() ?>assets/dist/js/pages/dashboard.js"></script>
  <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

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
</body>

</html>