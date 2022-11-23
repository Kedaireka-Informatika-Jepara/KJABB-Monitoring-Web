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
                    } ?></h3>
                <p>Lorem ipsum dolor sit amet, conset etur sadipscing elitr, sed.</p>
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
                    } ?></h3>
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
<div class="total-browse-content card-box-style">
  <div class="main-title d-flex justify-content-between align-items-center">
    <h3>Data Sensor</h3>

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
          <th>Waktu</th>
          <th>Tanggal</th>
          <th>Suhu</th>
          <th>Amonia</th>
          <th>Curah Hujan</th>
          <th>Keadaan Relay</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data as $row) { ?>
          <tr>
            <td><?= $row->waktu; ?></td>
            <td><?= $row->tanggal; ?></td>
            <td><?= $row->suhu; ?></td>
            <td><?= $row->amonia; ?></td>
            <td><?= $row->curah_hujan; ?></td>
            <td><?php
                if ($row->relay == 1) {
                  echo "<span class='label label-success'>ON</span>";
                } else {
                  echo "<span class='label label-danger'>OFF</span>";
                }
                ?>
            </td>
          </tr>

        <?php }

        ?>
  </table>
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

  