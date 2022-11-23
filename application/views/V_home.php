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

  