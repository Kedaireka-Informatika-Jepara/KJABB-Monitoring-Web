<?php
class Rekap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_rekap');
        $this->load->model('M_squrity');
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
            $rekap = $this->M_rekap->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $isi['content'] = 'rekap/V_rekap';
        $isi['judul'] = 'Monitoring | Rekap Data Sensor';
        $isi['rekap'] = $rekap;
        $isi['label'] = $label;
        $isi['export'] = $url_export;
        $isi['export_suhu'] = $url_export2;
        $isi['export_amonia'] = $url_export3;
        $isi['export_curah_hujan'] = $url_export4;
        $isi['export_ph'] = $url_export5;
        $isi['export_do'] = $url_export5;
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
            if ($cetak == 'amonia') {
                redirect($url_export3);
            }
            if ($cetak == 'curah') {
                redirect($url_export4);
            }
            if ($cetak == 'ph'){
                redirect($url_export5);
            }
            if ($cetak == 'do'){
                redirect($url_export6);
            }
            // $_POST = array();
        }
    }

    public function export_data()
    {
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
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Suhu</th>
                <th>Amonia</th>
                <th>Curah Hujan</th>
                <th>pH</th>
                <th>Dissolve Oxygen</th>
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
                    <td><?php echo $row->amonia; ?></td>
                    <td><?php echo $row->curah_hujan; ?></td>
                    <td><?php echo $row->ph; ?></td>
                    <td><?php echo $row->do; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
<?php
        exit;
    }

    public function export_data2()
    {
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
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                $label = 'Data Rekap Sensor Amonia Tanggal ' . $tgl;
                $rekap = $this->M_rekap->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                $label = 'Data Rekap Sensor Amonia Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $rekap = $this->M_rekap->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                $label = 'Data Rekap Sensor Amonia Tahun ' . $tahun;
                $rekap = $this->M_rekap->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan

            $label = 'Semua Data Rekap Sensor Amonia';
            $rekap = $this->M_rekap->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $label . '.xls"');
        // echo tabel
?>
        <!-- table -->

        <table border="1" width="100%">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Amonia</th>
            </tr>
            <?php
            $no = 1;
            foreach ($rekap as $row) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row->tanggal; ?></td>
                    <td><?php echo $row->waktu; ?></td>
                    <td><?php echo $row->amonia; ?></td>
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
                    <td><?php echo $row->curah_hujan; ?></td>
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
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                $label = 'Data Rekap Sensor Dissolve Oxygen Tanggal ' . $tgl;
                $rekap = $this->M_rekap->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                $label = 'Data Rekap Sensor Dissolve Oxygen Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $rekap = $this->M_rekap->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                $label = 'Data Rekap Sensor Dissolve Oxygen Tahun ' . $tahun;
                $rekap = $this->M_rekap->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan

            $label = 'Semua Data Rekap Sensor Dissolve Oxygen';
            $rekap = $this->M_rekap->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $label . '.xls"');
        // echo tabel
?>
        <!-- table -->

        <table border="1" width="100%">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Dissolve Oxygen</th>
            </tr>
            <?php
            $no = 1;
            foreach ($rekap as $row) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row->tanggal; ?></td>
                    <td><?php echo $row->waktu; ?></td>
                    <td><?php echo $row->do; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
<?php
        exit;
    }
}
