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
            <span class="features-title text-primary">CO2</span>
            <h3><?php foreach ($sensor as $row) {
                  echo $row->co2;
                } ?> PPM</h3>
          </div>
          <div id="co2_chart"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="card-box-style">
          <div class="single-click-content">
            <span class="features-title text-info">Curah Hujan</span>
            <h3><?php foreach ($sensor as $row) {
                    if ($row->curah_hujan == 1) {
                      echo "Tidak Hujan";
                    } 
                    else {
                      echo "Hujan";
                    }
                  }
                    ?></h3>
          </div>
          <div id="curah_chart"></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card-box-style">
          <div class="single-click-content">
            <span class="features-title text-danger">pH</span>
            <h3><?php foreach ($sensor as $row) {
                  echo $row->ph;
                } ?> pH</h3>
          </div>
          <div id="ph_chart"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="card-box-style">
          <div class="single-click-content">
            <span class="features-title ">Total Dissolved Solids</span>
            <h3><?php
                    foreach ($sensor as $row) {
                      echo $row->tds;
                    }
                    ?> ppm</h3>
          </div>
          <div id="tds_chart"></div>
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
                  foreach (array_reverse($graph) as $row) {
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
        "#5bc0de"
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
                  foreach (array_reverse($graph) as $row) {
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
        "#ff0000"
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
                  foreach (array_reverse($graph) as $row) {
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
  // tds
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
        name: "Total Dissolve Solids",
        data: [<?php
                if (count($graph) > 0) {
                  foreach (array_reverse($graph) as $row) {
                    echo $row->tds . ", ";
                  }
                } ?>]
      }],
      labels: [<?php
                if (count($graph) > 0) {
                  foreach (array_reverse($graph) as $row) {
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
      document.querySelector("#tds_chart"),
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
        "#67748e"
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
                  foreach (array_reverse($graph) as $row) {
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
        name: "CO2",
        data: [<?php
                if (count($graph) > 0) {
                  foreach (array_reverse($graph) as $row) {
                    echo $row->co2 . ", ";
                  }
                } ?>]
      }],
      labels: [<?php
                if (count($graph) > 0) {
                  foreach (array_reverse($graph) as $row) {
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
      document.querySelector("#co2_chart"),
      options
    );
  chart.render();
</script>