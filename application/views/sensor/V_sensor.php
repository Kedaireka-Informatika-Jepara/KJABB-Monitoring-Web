<?php
if (!empty($this->session->flashdata('info'))) { ?>
    <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>

<?php }
?>

<br>
<div class="device-content website card-box-style">
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Input Batas Sensor</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="dataSensor" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Sensor</th>
                    <th>Nama Sensor</th>
                    <th>Batas Bawah</th>
                    <th>Batas Atas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $row) { ?>
                    <tr>
                        <td><?= $row->id_sensor; ?></td>
                        <td><?= $row->nama_sensor; ?></td>
                        <td><?= $row->batas_bawah; ?></td>
                        <td><?= $row->batas_atas; ?></td>
                        <td>
                            <a href="<?= base_url() ?>sensor/edit/<?= $row->id_sensor; ?>" class="btn btn-success btn-xs">Edit</a>

                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>