<?php
class Rekap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_rekap');
        $this->load->model('M_squrity');
        $this->load->model('M_dashboard');
    }

    public function index()
    {
        $this->M_squrity->getSqurity();
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filter yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                $label = 'Data Rekap Tanggal ' . $tgl;
                $url_export = 'rekap/export_data?filter=1&tanggal=' . $tgl;
                $url_export2 = 'rekap/export_data2?filter=1&tanggal=' . $tgl;
                $url_export3 = 'rekap/export_data3?filter=1&tanggal=' . $tgl;
                $url_export4 = 'rekap/export_data4?filter=1&tanggal=' . $tgl;
                $url_export5 = 'rekap/export_data5?filter=1&tanggal=' . $tgl;
                $url_export6 = 'rekap/export_data6?filter=1&tanggal=' . $tgl;
                $url_export7 = 'rekap/export_data7?filter=1&tanggal=' . $tgl;
                $rekap = $this->M_rekap->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $label = 'Data Rekap Bulan ' . $bulan . ' ' . $tahun;
                $url_export = 'rekap/export_data?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $url_export2 = 'rekap/export_data2?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $url_export3 = 'rekap/export_data3?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $url_export4 = 'rekap/export_data4?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $url_export5 = 'rekap/export_data5?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $url_export6 = 'rekap/export_data6?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $url_export7 = 'rekap/export_data7?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $rekap = $this->M_rekap->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                $label = 'Data Rekap Tahun ' . $tahun;
                $url_export = 'rekap/export_data?filter=3&tahun=' . $tahun;
                $url_export2 = 'rekap/export_data2?filter=3&tahun=' . $tahun;
                $url_export3 = 'rekap/export_data3?filter=3&tahun=' . $tahun;
                $url_export4 = 'rekap/export_data4?filter=3&tahun=' . $tahun;
                $url_export5 = 'rekap/export_data5?filter=3&tahun=' . $tahun;
                $url_export6 = 'rekap/export_data6?filter=3&tahun=' . $tahun;
                $url_export7 = 'rekap/export_data7?filter=3&tahun=' . $tahun;
                $rekap = $this->M_rekap->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan

            $label = 'Semua Data Rekap';
            $url_export = 'rekap/export_data';
            $url_export2 = 'rekap/export_data2';
            $url_export3 = 'rekap/export_data3';
            $url_export4 = 'rekap/export_data4';
            $url_export5 = 'rekap/export_data5';
            $url_export6 = 'rekap/export_data6';
            $url_export7 = 'rekap/export_data7';
            $rekap = $this->M_rekap->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $isi['content'] = 'rekap/V_rekap';
        $isi['judul'] = 'Monitoring | Rekap Data Sensor';
        $isi['notifikasi'] = $this->M_dashboard->getUnreadNotif();
		$isi['user'] = $this->M_dashboard->petugas();
        $isi['rekap'] = $rekap;
        $isi['label'] = $label;
        $isi['export'] = $url_export;
        $isi['export_suhu'] = $url_export2;
        $isi['export_amonia'] = $url_export3;
        $isi['export_curah_hujan'] = $url_export4;
        $isi['export_ph'] = $url_export5;
        $isi['export_do'] = $url_export6;
        $isi['export_turbidity'] = $url_export7;
        $isi['option_tahun'] = $this->M_rekap->option_tahun();
        $this->load->view('V_dashboard', $isi);

        //cetak 
        if (isset($_POST['role'])) {
            $cetak = $_POST['role'];
            if ($cetak == 'semua') {
                redirect($url_export);
            }
            if ($cetak == 'suhu') {
                redirect($url_export2);
            }
            if ($cetak == 'co2') {
                redirect($url_export3);
            }
            if ($cetak == 'curah') {
                redirect($url_export4);
            }
            if ($cetak == 'ph'){
                redirect($url_export5);
            }
            if ($cetak == 'tds'){
                redirect($url_export6);
            }
            if ($cetak == 'turbidity'){
                redirect($url_export7);
            }
            // $_POST = array();
        }
    }

    public function export_data()
    {
        $this->M_squrity->getSqurity();
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                $label = 'Data Rekap Tanggal ' . $tgl;
                $rekap = $this->M_rekap->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                $label = 'Data Rekap Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $rekap = $this->M_rekap->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                $label = 'Data Rekap Tahun ' . $tahun;
                $rekap = $this->M_rekap->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan

            $label = 'Semua Data Rekap';
            $rekap = $this->M_rekap->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $label . '.xls"');
        // echo tabel
?>
        <!-- table -->

        <table border="1" width="100%">
            <thead> 
                <th colspan="9"><?= $label?></th>
            </thead>
            <tbody>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Suhu</th>
                <th>CO2</th>
                <th>Curah Hujan</th>
                <th>pH</th>
                <th>Total Dissolved Solids</th>
                <th>Turbidity</th>
            </tr>
            <?php
            $no = 1;
            foreach ($rekap as $row) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row->tanggal; ?></td>
                    <td><?php echo $row->waktu; ?></td>
                    <td><?php echo $row->suhu; ?></td>
                    <td><?php echo $row->co2; ?></td>
                    <td><?php if($row->curah_hujan == 1) {echo "Tidak Hujan";}else{echo "Hujan";} ?></td>
                    <td><?php echo $row->ph; ?></td>
                    <td><?php echo $row->tds; ?></td>
                    <td><?php echo $row->turbidity; ?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
<?php
        exit;
    }

    public function export_data2()
    {
        $this->M_squrity->getSqurity();
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                $label = 'Data Rekap Sensor Suhu Tanggal ' . $tgl;
                $rekap = $this->M_rekap->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                $label = 'Data Rekap Sensor Suhu Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $rekap = $this->M_rekap->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                $label = 'Data Rekap Sensor Suhu Tahun ' . $tahun;
                $rekap = $this->M_rekap->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan

            $label = 'Semua Data Rekap Sensor Suhu';
            $rekap = $this->M_rekap->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $label . '.xls"');
        // echo tabel
?>
        <!-- table -->

        <table border="1" width="100%">
        <thead> 
                <th colspan="4"><?= $label?></th>
            </thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Suhu</th>
            </tr>
            <?php
            $no = 1;
            foreach ($rekap as $row) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row->tanggal; ?></td>
                    <td><?php echo $row->waktu; ?></td>
                    <td><?php echo $row->suhu; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
<?php
        exit;
    }

    public function export_data3()
    {
        $this->M_squrity->getSqurity();
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                $label = 'Data Rekap Sensor CO2 Tanggal ' . $tgl;
                $rekap = $this->M_rekap->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                $label = 'Data Rekap Sensor CO2 Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $rekap = $this->M_rekap->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                $label = 'Data Rekap Sensor CO2 Tahun ' . $tahun;
                $rekap = $this->M_rekap->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan

            $label = 'Semua Data Rekap Sensor CO2';
            $rekap = $this->M_rekap->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $label . '.xls"');
        // echo tabel
?>
        <!-- table -->

        <table border="1" width="100%">
        <thead> 
                <th colspan="4"><?= $label?></th>
            </thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>CO2</th>
            </tr>
            <?php
            $no = 1;
            foreach ($rekap as $row) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row->tanggal; ?></td>
                    <td><?php echo $row->waktu; ?></td>
                    <td><?php echo $row->co2; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
<?php
        exit;
    }

    public function export_data4()
    {
        $this->M_squrity->getSqurity();
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                $label = 'Data Rekap Sensor Curah Hujan Tanggal ' . $tgl;
                $rekap = $this->M_rekap->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                $label = 'Data Rekap Sensor Curah Hujan Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $rekap = $this->M_rekap->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                $label = 'Data Rekap Sensor Curah Hujan Tahun ' . $tahun;
                $rekap = $this->M_rekap->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan

            $label = 'Semua Data Rekap Sensor Curah Hujan';
            $rekap = $this->M_rekap->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $label . '.xls"');
        // echo tabel
?>
        <!-- table -->

        <table border="1" width="100%">
        <thead> 
                <th colspan="4"><?= $label?></th>
            </thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Curah Hujan</th>
            </tr>
            <?php
            $no = 1;
            foreach ($rekap as $row) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row->tanggal; ?></td>
                    <td><?php echo $row->waktu; ?></td>
                    <td><?php if($row->curah_hujan == 1) {echo "Tidak Hujan";}else{echo "Hujan";} ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
<?php
        exit;
    }
    public function export_data5()
    {
        $this->M_squrity->getSqurity();
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                $label = 'Data Rekap Sensor pH Tanggal ' . $tgl;
                $rekap = $this->M_rekap->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                $label = 'Data Rekap Sensor pH Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $rekap = $this->M_rekap->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                $label = 'Data Rekap Sensor pH Tahun ' . $tahun;
                $rekap = $this->M_rekap->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan

            $label = 'Semua Data Rekap Sensor pH';
            $rekap = $this->M_rekap->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $label . '.xls"');
        // echo tabel
?>
        <!-- table -->

        <table border="1" width="100%">
        <thead> 
                <th colspan="4"><?= $label?></th>
            </thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>pH</th>
            </tr>
            <?php
            $no = 1;
            foreach ($rekap as $row) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row->tanggal; ?></td>
                    <td><?php echo $row->waktu; ?></td>
                    <td><?php echo $row->ph; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
<?php
        exit;
    }
    public function export_data6()
    {
        $this->M_squrity->getSqurity();
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                $label = 'Data Rekap Sensor Total Dissolved Solids Tanggal ' . $tgl;
                $rekap = $this->M_rekap->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                $label = 'Data Rekap Sensor Total Dissolved Solids Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $rekap = $this->M_rekap->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                $label = 'Data Rekap Sensor Total Dissolved Solids Tahun ' . $tahun;
                $rekap = $this->M_rekap->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan

            $label = 'Semua Data Rekap Sensor Total Dissolved Solids';
            $rekap = $this->M_rekap->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $label . '.xls"');
        // echo tabel
?>
        <!-- table -->

        <table border="1" width="100%">
        <thead> 
                <th colspan="4"><?= $label?></th>
            </thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Total Dissolved Solids</th>
            </tr>
            <?php
            $no = 1;
            foreach ($rekap as $row) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row->tanggal; ?></td>
                    <td><?php echo $row->waktu; ?></td>
                    <td><?php echo $row->tds; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
<?php
        exit;
    }
    public function export_data7()
    {
        $this->M_squrity->getSqurity();
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                $label = 'Data Rekap Sensor Turbidity Tanggal ' . $tgl;
                $rekap = $this->M_rekap->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                $label = 'Data Rekap Sensor Turbidity Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $rekap = $this->M_rekap->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                $label = 'Data Rekap Sensor Turbidity Tahun ' . $tahun;
                $rekap = $this->M_rekap->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan

            $label = 'Semua Data Rekap Sensor Turbidity';
            $rekap = $this->M_rekap->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $label . '.xls"');
        // echo tabel
?>
        <!-- table -->

        <table border="1" width="100%">
        <thead> 
                <th colspan="4"><?= $label?></th>
            </thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Turbidity</th>
            </tr>
            <?php
            $no = 1;
            foreach ($rekap as $row) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row->tanggal; ?></td>
                    <td><?php echo $row->waktu; ?></td>
                    <td><?php echo $row->turbidity; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
<?php
        exit;
    }
    
}
