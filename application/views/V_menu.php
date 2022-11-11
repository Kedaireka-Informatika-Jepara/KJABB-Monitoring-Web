  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url() ?>assets/dist/img/yes.jpg" class="img-circle" salt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>

        <li><a href="<?= base_url() ?>sensor"><i class="fa fa-download"></i><span>Input Sensor</span></a></li>

        <li><a href="<?= base_url() ?>rekap"><i class="fa fa-database"></i><span>Rekap Data</span></a></li>

        <li><a href="<?= base_url() ?>notifikasi"><i class="fa fa-bell"></i><span>Notifikasi</span></a></li>

        <hr>
        <li><a  data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-sign-out"></i><span>Logout</span></a></li>

        </a>
      </ul>
      <!-- Button trigger modal -->


    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Logout</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <b> Apakah anda yakin ingin keluar?</b>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-primary" href="<?= base_url() ?>login/logout">Logout</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>