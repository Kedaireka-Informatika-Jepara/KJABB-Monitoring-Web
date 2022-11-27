<div class="features-area">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6">
        <div class="single-features">
          <div class="row align-items-center">
            <div class="col-xl-6 col-sm-6">
              <div class="single-click-content">
                <span class="features-title">Suhu Air</span>
                <h3><?php foreach ($sensor as $row) {
                      echo $row->suhu;
                    } ?>°C</h3>
                </div>
            </div>

            <div class="col-xl-6 col-sm-6">
              <div class="single-click-chart">
                <div id="suhu_chart"></div>
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
                <span class="features-title">Amonia</span>
                <h3><?php foreach ($sensor as $row) {
                      echo $row->amonia;
                    } ?> PPM</h3>
                </div>
            </div>

            <div class="col-xl-6 col-sm-6">
              <div class="single-click-chart">
                <div id="amonia_chart"></div>
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
                <span class="features-title">Curah Hujan</span>
                <h3><?php
            if ($row->curah_hujan < 600) {
              echo "Hujan Deras";
            } else if ($row->curah_hujan < 800 && $row->curah_hujan >= 600) {
              echo "Hujan Ringan";
            } else {
              echo "Tidak Hujan";
            }
            ?></h3>
                </div>
            </div>

            <div class="col-xl-6 col-sm-6">
              <div class="single-click-chart">
                <div id="curah_chart"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6">
        <div class="single-features color-style-ff0000">
          <div class="row align-items-center">
            <div class="col-xl-6 col-sm-6">
              <div class="single-click-content">
                <span class="features-title text-danger">pH</span>
                <h3><?php foreach ($sensor as $row) {
                      echo $row->ph;
                    } ?></h3>
                </div>
            </div>

            <div class="col-xl-6 col-sm-6">
              <div class="single-click-chart">
                <div id="ph_chart"></div>
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
                <span class="features-title text-warning">DO</span>
                <h3><?php foreach ($sensor as $row) {
                      echo $row->do;
                    } ?></h3>
                </div>
            </div>

            <div class="col-xl-6 col-sm-6">
              <div class="single-click-chart">
                <div id="do_chart"></div>
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
                <span class="features-title">Curah Hujan</span>
                <h3><?php
            if ($row->curah_hujan < 600) {
              echo "Hujan Deras";
            } else if ($row->curah_hujan < 800 && $row->curah_hujan >= 600) {
              echo "Hujan Ringan";
            } else {
              echo "Tidak Hujan";
            }
            ?></h3>
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
    <script>
// Click Chart
var options = {
        series: [
            { name: "Suhu Air", 
                data: [<?php
                  if (count($graph) > 0) {
                    foreach ($graph as $row) {
                      echo $row->suhu . ", ";
                    }
                  }
                  ?>] 
            }
        ],
        chart: { 
            type: "area", 
            height: 50, 
            sparkline: { 
                enabled: !0 
            } 
        },
        stroke: { 
            curve: "smooth", 
            width: 4,
            lineCap: "round" 
        },
        colors: [
            "#4FCB8D"
        ],
        fill: { 
            type: "gradient", 
            gradient: { 
                shadeIntensity: 0, 
                inverseColors: !0, 
                opacityFrom: 0, 
                opacityTo: 0, 
                stops: [
                    75, 100, 100, 100
                ] 
            } 
        },
        tooltip: { 
            fixed: { 
                enabled: !1 
            }, 
            x: { 
                show: !1 
            }, 
            marker: { 
                show: !1 
            } 
        },
    },
    chart = new ApexCharts(
        document.querySelector("#suhu_chart"), 
        options
    );
    chart.render();

    var options = {
        series: [
            { name: "Amonia", 
                data: [<?php
                if (count($graph) > 0) {
                    foreach ($graph as $row) {
                      echo $row->amonia . ", ";
                    }
                  }?>] 
            }
        ],
        chart: { 
            type: "area", 
            height: 50, 
            sparkline: { 
                enabled: !0 
            } 
        },
        stroke: { 
            curve: "smooth", 
            width: 4,
            lineCap: "round" 
        },
        colors: [
            "#1765FD"
        ],
        fill: { 
            type: "gradient", 
            gradient: { 
                shadeIntensity: 0, 
                inverseColors: !0, 
                opacityFrom: 0, 
                opacityTo: 0, 
                stops: [
                    75, 100, 100, 100
                ] 
            } 
        },
        tooltip: { 
            fixed: { 
                enabled: !1 
            }, 
            x: { 
                show: !1 
            }, 
            marker: { 
                show: !1 
            } 
        },
    },
    chart = new ApexCharts(
        document.querySelector("#amonia_chart"), 
        options
    );
    chart.render();

    // Conversions Chart
    var options = {
        series: [
            { name: "Curah Hujan", 
                data: [<?php 
                if (count($graph) > 0) {
                    foreach ($graph as $row) {
                      echo $row->curah_hujan . ", ";
                    }
                  }?>] 
            }
        ],
        chart: { 
            type: "area", 
            height: 50, 
            sparkline: { 
                enabled: !0 
            } 
        },
        stroke: { 
            curve: "smooth", 
            width: 4,
            lineCap: "round" 
        },
        colors: [
            "#5C31D6"
        ],
        fill: { 
            type: "gradient", 
            gradient: { 
                shadeIntensity: 0, 
                inverseColors: !0, 
                opacityFrom: 0, 
                opacityTo: 0, 
                stops: [
                    75, 100, 100, 100
                ] 
            } 
        },
        tooltip: { 
            fixed: { 
                enabled: !1 
            }, 
            x: { 
                show: !1 
            }, 
            marker: { 
                show: !1 
            } 
        },
    },
    chart = new ApexCharts(
        document.querySelector("#curah_chart"), 
        options
    );
    chart.render();
    // Conversions Chart
    var options = {
        series: [
            { name: "pH", 
                data: [<?php 
                if (count($graph) > 0) {
                    foreach ($graph as $row) {
                      echo $row->ph . ", ";
                    }
                  }?>] 
            }
        ],
        chart: { 
            type: "area", 
            height: 50, 
            sparkline: { 
                enabled: !0 
            } 
        },
        stroke: { 
            curve: "smooth", 
            width: 4,
            lineCap: "round" 
        },
        colors: [
            "#ff0000"
        ],
        fill: { 
            type: "gradient", 
            gradient: { 
                shadeIntensity: 0, 
                inverseColors: !0, 
                opacityFrom: 0, 
                opacityTo: 0, 
                stops: [
                    75, 100, 100, 100
                ] 
            } 
        },
        tooltip: { 
            fixed: { 
                enabled: !1 
            }, 
            x: { 
                show: !1 
            }, 
            marker: { 
                show: !1 
            } 
        },
    },
    chart = new ApexCharts(
        document.querySelector("#ph_chart"), 
        options
    );
    chart.render();
    // DO
    var options = {
        series: [
            { name: "DO", 
                data: [<?php 
                if (count($graph) > 0) {
                    foreach ($graph as $row) {
                      echo $row->do . ", ";
                    }
                  }?>] 
            }
        ],
        chart: { 
            type: "area", 
            height: 50, 
            sparkline: { 
                enabled: !0 
            } 
        },
        stroke: { 
            curve: "smooth", 
            width: 4,
            lineCap: "round" 
        },
        colors: [
            "#5C31D6"
        ],
        fill: { 
            type: "gradient", 
            gradient: { 
                shadeIntensity: 0, 
                inverseColors: !0, 
                opacityFrom: 0, 
                opacityTo: 0, 
                stops: [
                    75, 100, 100, 100
                ] 
            } 
        },
        tooltip: { 
            fixed: { 
                enabled: !1 
            }, 
            x: { 
                show: !1 
            }, 
            marker: { 
                show: !1 
            } 
        },
    },
    chart = new ApexCharts(
        document.querySelector("#do_chart"), 
        options
    );
    chart.render();
    </script>
  