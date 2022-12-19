<div class="features-area">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card-box-style">
          <div class="single-click-content">
            <span class="features-title text-success">Suhu Air</span>
            <h3><?php foreach ($sensor as $row) {
                  echo $row->suhu;
                } ?>°C</h3>
          </div>
          <div id="suhu_chart"></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card-box-style">
          <div class="single-click-content">
            <span class="features-title text-primary">Amonia</span>
            <h3><?php foreach ($sensor as $row) {
                  echo $row->amonia;
                } ?>PPM</h3>
          </div>
          <div id="amonia_chart"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="card-box-style">
          <div class="single-click-content">
            <span class="features-title text-info">Curah Hujan</span>
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
          <div id="curah_chart"></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card-box-style">
          <div class="single-click-content">
            <span class="features-title">pH</span>
            <h3><?php foreach ($sensor as $row) {
                  echo $row->ph;
                } ?></h3>
          </div>
          <div id="ph_chart"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="card-box-style">
          <div class="single-click-content">
            <span class="features-title">Dissolved Oxygen</span>
            <h3><?php
                    foreach ($sensor as $row) {
                      echo $row->do;
                    }
                    ?></h3>
          </div>
          <div id="do_chart"></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card-box-style">
          <div class="single-click-content">
            <span class="features-title">Kekeruhan Air</span>
            <h3><?php foreach ($sensor as $row) {
                  echo $row->turbidity;
                } ?> NTU</h3>
          </div>
          <div id="turbidity_chart"></div>
        </div>
      </div>
    </div>
    <!-- <div class="row justify-content-center">
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
                <span class="features-title">Kekeruhan Air</span>
                <h3><?php foreach ($sensor as $row) {
                      echo $row->turbidity;
                    } ?> NTU</h3>

              </div>
            </div>

            <div class="col-xl-6 col-sm-6">
              <div class="single-click-chart">
                <div id="turbidity_chart"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

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
<script src="<?= base_url() ?>assets/js/apexcharts/apexcharts.min.js"></script>
<script>
  // Click Chart
  var options = {
      chart: {
        height: 200,
        type: 'area',
        zoom: {
          enabled: false
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'straight'
      },
      colors: [
        "#00c300"
      ],
      series: [{
        name: "Suhu",
        data: [<?php
                if (count($graph) > 0) {
                  foreach (array_reverse($graph) as $row) {
                    echo $row->suhu . ", ";
                  }
                } ?>]
      }],
      labels: [<?php
                if (count($graph) > 0) {
                  foreach ($graph as $row) {
                    echo '"' . $row->waktu . '",';
                  }
                }
                ?>],

      legend: {
        horizontalAlign: 'left'
      },
      grid: {
        show: true,
        borderColor: '#f6f6f7',
      },
    },
    chart = new ApexCharts(
      document.querySelector("#suhu_chart"),
      options
    );
  chart.render();

  
  var options = {
      chart: {
        height: 200,
        type: 'area',
        zoom: {
          enabled: false
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'straight'
      },
      colors: [
        "#0000ff"
      ],
      series: [{
        name: "Amonia",
        data: [<?php
                if (count($graph) > 0) {
                  foreach (array_reverse($graph) as $row) {
                    echo $row->amonia . ", ";
                  }
                } ?>]
      }],
      labels: [<?php
                if (count($graph) > 0) {
                  foreach ($graph as $row) {
                    echo '"' . $row->waktu . '",';
                  }
                }
                ?>],

      legend: {
        horizontalAlign: 'left'
      },
      grid: {
        show: true,
        borderColor: '#f6f6f7',
      },
    },
    chart = new ApexCharts(
      document.querySelector("#amonia_chart"),
      options
    );
  chart.render();
  // Curah Hujan Chart
  var options = {
      chart: {
        height: 200,
        type: 'area',
        zoom: {
          enabled: false
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'straight'
      },
      colors: [
        "#0000ff"
      ],
      series: [{
        name: "Curah Hujan",
        data: [<?php
                if (count($graph) > 0) {
                  foreach (array_reverse($graph) as $row) {
                    echo $row->curah_hujan . ", ";
                  }
                } ?>]
      }],
      labels: [<?php
                if (count($graph) > 0) {
                  foreach ($graph as $row) {
                    echo '"' . $row->waktu . '",';
                  }
                }
                ?>],

      legend: {
        horizontalAlign: 'left'
      },
      grid: {
        show: true,
        borderColor: '#f6f6f7',
      },
    },
    chart = new ApexCharts(
      document.querySelector("#curah_chart"),
      options
    );
  chart.render();
  // Conversions Chart
  var options = {
      chart: {
        height: 200,
        type: 'area',
        zoom: {
          enabled: false
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'straight'
      },
      colors: [
        "#0000ff"
      ],
      series: [{
        name: "pH",
        data: [<?php
                if (count($graph) > 0) {
                  foreach (array_reverse($graph) as $row) {
                    echo $row->ph . ", ";
                  }
                } ?>]
      }],
      labels: [<?php
                if (count($graph) > 0) {
                  foreach ($graph as $row) {
                    echo '"' . $row->waktu . '",';
                  }
                }
                ?>],

      legend: {
        horizontalAlign: 'left'
      },
      grid: {
        show: true,
        borderColor: '#f6f6f7',
      },
    },
    chart = new ApexCharts(
      document.querySelector("#ph_chart"),
      options
    );
  chart.render();
  // DO
  var options = {
      chart: {
        height: 200,
        type: 'area',
        zoom: {
          enabled: false
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'straight'
      },
      colors: [
        "#0000ff"
      ],
      series: [{
        name: "Dissolved Oxygen",
        data: [<?php
                if (count($graph) > 0) {
                  foreach (array_reverse($graph) as $row) {
                    echo $row->do . ", ";
                  }
                } ?>]
      }],
      labels: [<?php
                if (count($graph) > 0) {
                  foreach ($graph as $row) {
                    echo '"' . $row->waktu . '",';
                  }
                }
                ?>],

      legend: {
        horizontalAlign: 'left'
      },
      grid: {
        show: true,
        borderColor: '#f6f6f7',
      },
    },
    chart = new ApexCharts(
      document.querySelector("#do_chart"),
      options
    );
  chart.render();
  // turbidity
  var options = {
      chart: {
        height: 200,
        type: 'area',
        zoom: {
          enabled: false
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'straight'
      },
      colors: [
        "#0000ff"
      ],
      series: [{
        name: "Turbidity",
        data: [<?php
                if (count($graph) > 0) {
                  foreach (array_reverse($graph) as $row) {
                    echo $row->turbidity . ", ";
                  }
                } ?>]
      }],
      labels: [<?php
                if (count($graph) > 0) {
                  foreach ($graph as $row) {
                    echo '"' . $row->waktu . '",';
                  }
                }
                ?>],

      legend: {
        horizontalAlign: 'left'
      },
      grid: {
        show: true,
        borderColor: '#f6f6f7',
      },
    },
    chart = new ApexCharts(
      document.querySelector("#turbidity_chart"),
      options
    );
  chart.render();
</script>