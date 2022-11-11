<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
         <h3><?php foreach ($sensor as $row) {
             // mengatur time zone untuk WIB.
                date_default_timezone_set("Asia/Jakarta");
                $mydate = explode("-", $row->tanggal);
                $mytime = explode(":", $row->waktu);
                
                // mencari mktime untuk tanggal 1 Januari 2011 00:00:00 WIB
                $selisih1 = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                
                // mencari mktime untuk current time
                $selisih2 = mktime($mytime[0], $mytime[1], $mytime[2], $mydate[1], $mydate[2], $mydate[0]);
                
                // mencari selisih detik antara kedua waktu
                $delta = $selisih1 - $selisih2;
                
                // proses mencari jumlah hari
                $a = floor($delta / 86400);
                
                // proses mencari jumlah jam
                $sisa = $delta % 86400;
                $b  = floor($sisa / 3600);
                
                // proses mencari jumlah menit
                $sisa = $sisa % 3600;
                $c = floor($sisa / 60);
                
                // proses mencari jumlah detik
                $sisa = $sisa % 60;
                $d = floor($sisa / 1);
                
                //echo $a;
                if ($c > 10) {
                    echo "OFF";
                } else {
                    echo "ON";
                }
                //echo date("i Y", mktime($mytime[0], $mytime[1]+10, $mytime[2], $mydate[1], $mydate[2], $mydate[0]));
            } ?></h3>

        <p>Keadaan Relay</p>
      </div>
      <div class="icon">
        <i class="ion ion-power"></i>
      </div>
      <a href="<?= base_url() ?>rekap" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php foreach ($sensor as $row) {
              echo $row->suhu;
            } ?><sup style="font-size: 20px">&#176</sup>C</h3>

        <p>Suhu Air</p>
      </div>
      <div class="icon">
        <i class="ion ion-thermometer"></i>
      </div>
      <a href="<?= base_url() ?>rekap" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php
            if ($row->curah_hujan < 600) {
              echo "Hujan Deras";
            } else if ($row->curah_hujan < 800 && $row->curah_hujan >= 600) {
              echo "Hujan Ringan";
            } else {
              echo "Tidak Hujan";
            }
            ?></h3>

        <p>Curah Hujan</p>
      </div>
      <div class="icon">
        <i class="ion ion-waterdrop"></i>
      </div>
      <a href="<?= base_url() ?>rekap" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php foreach ($sensor as $row) {
              echo $row->amonia;
            } ?> PPM</h3>

        <p>Amonia</p>
      </div>
      <div class="icon">
        <i class="ion ion-beaker"></i>
      </div>
      <a href="<?= base_url() ?>rekap" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>

<!-- Main content Chart -->
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <!-- RELAY CHART-->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Chart Data Relay</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="chart">
            <canvas id="areaChart" style="height:250px"></canvas>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- SUHU CHART -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Chart Data Suhu</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="chart">
            <canvas id="areaChart2" style="height:250px"></canvas>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </div>
    <!-- /.col (LEFT) -->
    <div class="col-md-6">
      <!-- AMONIA CHART -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Chart Data Amonia</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="chart">
            <canvas id="areaChart3" style="height:250px"></canvas>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- PH CHART -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Chart Data Curah Hujan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="chart">
            <canvas id="areaChart4" style="height:250px"></canvas>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </div>
    <!-- /.col (RIGHT) -->
  </div>
  <!-- /.row -->

</section>

<!-- tabel -->

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Sensor</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
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
      </tbody>
    </table>
  </div>
</div>