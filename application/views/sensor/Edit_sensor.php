<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $judul; ?></h3>
        </div>

        <form method="post" action="<?= base_url() ?>sensor/update" class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">ID Sensor</label>
                    <div class="col-sm-10">
                        <input type="text" name="id_sensor" value="<?= $data['id_sensor']; ?>" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Nama Sensor</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_sensor" value="<?= $data['nama_sensor']; ?>" class="form-control" placeholder="Nama Sensor" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Batas Bawah</label>
                    <div class="col-sm-10">
                        <input type="number" name="batas_bawah" value="<?= $data['batas_bawah']; ?>" class="form-control" placeholder="Batas Bawah" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Batas Atas</label>
                    <div class="col-sm-10">
                        <input type="number" name="batas_atas" value="<?= $data['batas_atas']; ?>" class="form-control" placeholder="Batas Atas" required>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <a href="<?= base_url() ?>sensor" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

    </div>
    </form>

</div>
</div>