<?php
if (!empty($this->session->flashdata('info'))) { ?>
    <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>

<?php }
?>

<br>
<div class="total-browse-content card-box-style">
<div class="box">
    <div class="box-header row">
        <h3 class="box-title col-10">Data Notifikasi</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="dataNotif" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Judul</th>
                    <th>Pesan</th>
                    <th>Sudah Dibaca</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $row) { ?>
                    <tr>
                        <td><?= $row->tanggal_notif; ?></td>
                        <td><?= $row->waktu_notif; ?></td>
                        <td><?= $row->judul; ?></td>
                        <td><?= $row->pesan; ?></td>
                        <td>
                            <?php if ($row->is_read == 0) : ?>
                                <a href="<?= base_url() ?>notifikasi/tandai/<?= $row->id_notif; ?>" class="btn btn-primary btn-xs">Tandai Sudah Dibaca</a>
                            <?php else : ?>
                                <i class="fa fa-check-circle" style="color:#228b22"></i>
                            <?php endif; ?>

                        </td>
                        <td>
                            <button data-bs-toggle="modal" data-bs-target="#modalhapus<?= $row->id_notif; ?>" class="btn btn-danger btn-xs"><i class="ri-delete-bin-fill"></i> Hapus</button>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <a href="<?= base_url() ?>notifikasi/tandaisemua" class="col-lg-3 mb-3 btn btn-primary">Tandai Semua Sudah Dibaca</a>
<button data-bs-toggle="modal" data-bs-target="#modalhapussemua" class="col-2 ms-3 mb-3 btn btn-danger">Hapus Semua</button>

</div>
<!-- Modal -->
<?php foreach ($data as $row) { ?>
<div class="modal fade" id="modalhapus<?= $row->id_notif; ?>" tabindex="-1" role="dialog" aria-labelledby="hapus" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="hapus">Hapus Notifikasi</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <b>Apakah anda yakin ingin menghapus notifikasi?</b>
        </div>
        <div class="modal-footer">
            <a type="button" class="btn btn-primary" href="<?= base_url() ?>notifikasi/hapus/<?= $row->id_notif; ?>">Hapus</a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<div class="modal fade" id="modalhapussemua" tabindex="-1" role="dialog" aria-labelledby="hapussemua" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="hapus">Hapus Semua Notifikasi</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <b>Apakah anda yakin ingin menghapus semua notifikasi?</b>
        </div>
        <div class="modal-footer">
            <a type="button" class="btn btn-danger" href="<?= base_url() ?>notifikasi/hapussemua">Hapus</a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
