<script>
    function getfilter() {
        var filter = document.forms["FormFilter"]["filter"].value;
        if(filter == 'pilih'){
            document.getElementById("tanggal").disabled = true;
            document.getElementById("bulan").disabled = true;
            document.getElementById("tahun").disabled = true;
            document.getElementById("btn-tampilkan").disabled = true;
        }
        else if (filter == '1') { //per tanggal
            document.getElementById("tanggal").disabled = false;
            document.getElementById("bulan").disabled = true;
            document.getElementById("tahun").disabled = true;
            document.getElementById("btn-tampilkan").disabled = false;
        } else if (filter == '2') { //per bulan 
            document.getElementById("tanggal").disabled = true;
            document.getElementById("bulan").disabled = false;
            document.getElementById("tahun").disabled = false;
            document.getElementById("btn-tampilkan").disabled = true;
            if(document.getElementById("bulan").value == "pilih" ||  document.getElementById("tahun").value == "pilih"){
                document.getElementById("btn-tampilkan").disabled = true;
            }
            else{
                document.getElementById("btn-tampilkan").disabled = false;
            }
            
        } else { //per tahun
            document.getElementById("tanggal").disabled = true;
            document.getElementById("bulan").disabled = true;
            document.getElementById("tahun").disabled = false;
            document.getElementById("btn-tampilkan").disabled = true;
            if(document.getElementById("tahun").value == "pilih"){
                document.getElementById("btn-tampilkan").disabled = true;
            }
            else{
                document.getElementById("btn-tampilkan").disabled = false;
            }
        }
    }

    function getexport() {
        // var export = document.getElementById("export");
        // if(!isset($_GET['filter']) && empty($_GET['filter'])){
        document.getElementById("export").setAttribute('style', 'pointer-events:auto');

    }

    function getpilih() {
        var pilih = document.forms["pilih"]['role'].value;
        if (pilih == "semua") {
            document.getElementById("cetak").setAttribute("href", "<?php echo $export; ?>");
        }
    }
</script>

<?php
if (!empty($this->session->flashdata('info'))) { ?>
    <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>

<?php }
?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Filter Rekap Data</h3>
    </div>
    <div class="box-body">
        <!-- <table id="example1" class="table table-bordered table-striped"> -->
        <form method="get" name="FormFilter" id="FormFilter" action="" onsubmit="return getexport()">
            <div class="row">
                <div class="col-sm-3 col-md-2">
                    <div class="form-group">
                        <label>Filter Berdasarkan</label>
                        <select name="filter" id="filter" class="form-control" onchange="getfilter()">
                            <option value="pilih">Pilih</option>
                            <option value="1">Per Tanggal</option>
                            <option value="2">Per Bulan</option>
                            <option value="3">Per Tahun</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" class="form-control datepicker" autocomplete="off" disabled/>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2" id="form-bulan">
                    <div class="form-group">
                        <label>Bulan</label>
                        <select name="bulan" id="bulan" class="form-control" onchange="getfilter()" disabled>
                            <option value="pilih">Pilih</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2" id="form-tahun">
                    <div class="form-group">
                        <label>Tahun</label>
                        <select name="tahun" id="tahun" class="form-control" onchange="getfilter()" disabled>
                            <option value="pilih">Pilih</option>
                            <?php
                            foreach ($option_tahun as $data) { // Ambil data tahun dari model yang dikirim dari controller
                                echo '<option value="' . $data->tahun . '">' . $data->tahun . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" id="form-tanggal">
            </div>
            <div class="row">
            </div>
            <button disabled id="btn-tampilkan" type="submit" class="btn btn-primary">Tampilkan</button>
            <a href="<?= base_url() ?>rekap" class="btn btn-warning">Reset Filter</a>
        </form>
        <br>
    </div>
</div>

<div class="col">
                                <div class="total-browse-content card-box-style">
                                    <div class="main-title d-flex justify-content-between align-items-center">
                                        <h3>Rekap Data</h3>
                                    </div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Sensor</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <table class="table align-middle">
  <thead>
        <tr>
          <th>Waktu</th>
          <th>Tanggal</th>
          <th>Suhu</th>
          <th>Amonia</th>
          <th>Curah Hujan</th>
          <th>pH</th>
          <th>DO</th>
          <th>Keadaan Relay</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($rekap as $row) { ?>
          <tr>
            <td><?= $row->waktu; ?></td>
            <td><?= $row->tanggal; ?></td>
            <td><?= $row->suhu; ?></td>
            <td><?= $row->amonia; ?></td>
            <td><?= $row->curah_hujan; ?></td>
            <td><?= $row->ph; ?></td>
            <td><?= $row->do; ?></td>
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
    </div></div></div>
    </div>
    <a data-toggle="modal" data-target="#modalExport" name="export" id="export" class="btn btn-success"><i class="fa fa-print"></i> Cetak Data</a>
</div>

<form method="post" action="" id="pilih" name="pilih" class="form-group">
    <div class="modal fade" id="modalExport" tabindex="-1" role="dialog" aria-labelledby="modalExportTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cetak Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <b>Silahkan pilih data sensor yang akan dicetak</b> <br>
                </div>
                <div class="row">
                    <label class="col-sm-3 control-label text-right">Pilih Data<span class="text-red">*</span></label>
                    <div class="col-sm-8">
                        <select name="role" id="role" class="form-control" style="width: 100%;">
                            <option disabled selected>Pilih Data</option>
                            <option value="semua">Semua Data</option>
                            <option value="suhu">Suhu Air</option>
                            <option value="amonia">Amonia</option>
                            <option value="curah">Curah Hujan</option>
                        </select>
                        <br>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Cetak Excel</button>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</form>