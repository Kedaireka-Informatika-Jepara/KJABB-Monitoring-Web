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
                $rekap = $this->M_rekap->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $label = 'Data Rekap Bulan ' . $bulan . ' ' . $tahun;
                $url_export = 'rekap/export_data?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $url_export2 = 'rekap/export_data2?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $url_export3 = 'rekap/export_data3?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $url_export4 = 'rekap/export_data4?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $rekap = $this->M_rekap->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                $label = 'Data Rekap Tahun ' . $tahun;
                $url_export = 'rekap/export_data?filter=3&tahun=' . $tahun;
                $url_export2 = 'rekap/export_data2?filter=3&tahun=' . $tahun;
                $url_export3 = 'rekap/export_data3?filter=3&tahun=' . $tahun;
                $url_export4 = 'rekap/export_data4?filter=3&tahun=' . $tahun;
                $rekap = $this->M_rekap->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan

            $label = 'Semua Data Rekap';
            $url_export = 'rekap/export_data';
            $url_export2 = 'rekap/export_data2';
            $url_export3 = 'rekap/export_data3';
            $url_export4 = 'rekap/export_data4';
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
        $isi['option_tahun'] = $this->M_rekap->option_tahun();
        $this->load->view('V_dashboard', $isi);

        //cetak 
        if (isset($_POST['submit'])) {
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

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        $object->getProperties()->setCreator("Monitoring Ikan");
        $object->getProperties()->setLastModifiedBy("Monitoring Ikan");
        $object->getProperties()->setTitle("Rekap Data Sensor");
        $object->getProperties()->setSubject("");
        $object->getProperties()->setDescription("");

        $object->setActiveSheetIndex(0)->setCellValue('C1', "DATA REKAP SENSOR SUHU AIR"); // Set kolom E1 
        $object->getActiveSheet()->mergeCells('C1:I1'); // Set Merge Cell pada kolom E1 sampai E1
        $object->getActiveSheet()->getStyle('C1')->getFont()->setBold(TRUE); // Set bold kolom E1
        $object->getActiveSheet()->getStyle('C1')->getFont()->setSize(15); // Set font size 15 untuk kolom E1
        $object->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        $object->setActiveSheetIndex(0)->setCellValue('C2', $label); // Set kolom E2 
        $object->getActiveSheet()->mergeCells('C2:I2'); // Set Merge Cell pada kolom E2 sampai E2
        $object->getActiveSheet()->getStyle('C2')->getFont()->setBold(TRUE); // Set bold kolom E2
        $object->getActiveSheet()->getStyle('C2')->getFont()->setSize(15); // Set font size 15 untuk kolom E2
        $object->getActiveSheet()->getStyle('C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom E2

        $object->setActiveSheetIndex(0);
        $object->getActiveSheet()->setCellValue('E4', 'No.');
        $object->getActiveSheet()->setCellValue('F4', 'Waktu');
        $object->getActiveSheet()->setCellValue('G4', 'Tanggal');
        $object->getActiveSheet()->setCellValue('H4', 'Suhu');

        $object->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
        $object->getActiveSheet()->getStyle('F4')->applyFromArray($style_col);
        $object->getActiveSheet()->getStyle('G4')->applyFromArray($style_col);
        $object->getActiveSheet()->getStyle('H4')->applyFromArray($style_col);

        $baris = 5;
        $no = 1;

        foreach ($rekap as $row) {
            $object->getActiveSheet()->setCellValue('E' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('F' . $baris, $row->waktu);
            $object->getActiveSheet()->setCellValue('G' . $baris, $row->tanggal);
            $object->getActiveSheet()->setCellValue('H' . $baris, $row->suhu);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $object->getActiveSheet()->getStyle('E' . $baris)->applyFromArray($style_row);
            $object->getActiveSheet()->getStyle('F' . $baris)->applyFromArray($style_row);
            $object->getActiveSheet()->getStyle('G' . $baris)->applyFromArray($style_row);
            $object->getActiveSheet()->getStyle('H' . $baris)->applyFromArray($style_row);

            $baris++;
        }

        // Set width kolom
        $object->getActiveSheet()->getColumnDimension('E')->setWidth(5); // Set width kolom A
        $object->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom B
        $object->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom C
        $object->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom D

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $object->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $object->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        $filename = $label . '.xlsx';

        $object->getActiveSheet()->setTitle("Data Rekap Sensor");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');

        $writer->save('php://output');
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

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        $object->getProperties()->setCreator("Monitoring Ikan");
        $object->getProperties()->setLastModifiedBy("Monitoring Ikan");
        $object->getProperties()->setTitle("Rekap Data Sensor");
        $object->getProperties()->setSubject("");
        $object->getProperties()->setDescription("");

        $object->setActiveSheetIndex(0)->setCellValue('C1', "DATA REKAP SENSOR AMONIA"); // Set kolom E1 
        $object->getActiveSheet()->mergeCells('C1:I1'); // Set Merge Cell pada kolom E1 sampai E1
        $object->getActiveSheet()->getStyle('C1')->getFont()->setBold(TRUE); // Set bold kolom E1
        $object->getActiveSheet()->getStyle('C1')->getFont()->setSize(15); // Set font size 15 untuk kolom E1
        $object->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        $object->setActiveSheetIndex(0)->setCellValue('C2', $label); // Set kolom E2 
        $object->getActiveSheet()->mergeCells('C2:I2'); // Set Merge Cell pada kolom E2 sampai E2
        $object->getActiveSheet()->getStyle('C2')->getFont()->setBold(TRUE); // Set bold kolom E2
        $object->getActiveSheet()->getStyle('C2')->getFont()->setSize(15); // Set font size 15 untuk kolom E2
        $object->getActiveSheet()->getStyle('C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom E2

        $object->setActiveSheetIndex(0);
        $object->getActiveSheet()->setCellValue('E4', 'No.');
        $object->getActiveSheet()->setCellValue('F4', 'Waktu');
        $object->getActiveSheet()->setCellValue('G4', 'Tanggal');
        $object->getActiveSheet()->setCellValue('H4', 'Amonia');

        $object->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
        $object->getActiveSheet()->getStyle('F4')->applyFromArray($style_col);
        $object->getActiveSheet()->getStyle('G4')->applyFromArray($style_col);
        $object->getActiveSheet()->getStyle('H4')->applyFromArray($style_col);

        $baris = 5;
        $no = 1;

        foreach ($rekap as $row) {
            $object->getActiveSheet()->setCellValue('E' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('F' . $baris, $row->waktu);
            $object->getActiveSheet()->setCellValue('G' . $baris, $row->tanggal);
            $object->getActiveSheet()->setCellValue('H' . $baris, $row->amonia);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $object->getActiveSheet()->getStyle('E' . $baris)->applyFromArray($style_row);
            $object->getActiveSheet()->getStyle('F' . $baris)->applyFromArray($style_row);
            $object->getActiveSheet()->getStyle('G' . $baris)->applyFromArray($style_row);
            $object->getActiveSheet()->getStyle('H' . $baris)->applyFromArray($style_row);

            $baris++;
        }

        // Set width kolom
        $object->getActiveSheet()->getColumnDimension('E')->setWidth(5); // Set width kolom A
        $object->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom B
        $object->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom C
        $object->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom D

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $object->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $object->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        $filename = $label . '.xlsx';

        $object->getActiveSheet()->setTitle("Data Rekap Sensor");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');

        $writer->save('php://output');
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


        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        $object->getProperties()->setCreator("Monitoring Ikan");
        $object->getProperties()->setLastModifiedBy("Monitoring Ikan");
        $object->getProperties()->setTitle("Rekap Data Sensor");
        $object->getProperties()->setSubject("");
        $object->getProperties()->setDescription("");

        $object->setActiveSheetIndex(0)->setCellValue('C1', "DATA REKAP SENSOR CURAH HUJAN"); // Set kolom E1 
        $object->getActiveSheet()->mergeCells('C1:I1'); // Set Merge Cell pada kolom E1 sampai E1
        $object->getActiveSheet()->getStyle('C1')->getFont()->setBold(TRUE); // Set bold kolom E1
        $object->getActiveSheet()->getStyle('C1')->getFont()->setSize(15); // Set font size 15 untuk kolom E1
        $object->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        $object->setActiveSheetIndex(0)->setCellValue('C2', $label); // Set kolom E2 
        $object->getActiveSheet()->mergeCells('C2:I2'); // Set Merge Cell pada kolom E2 sampai E2
        $object->getActiveSheet()->getStyle('C2')->getFont()->setBold(TRUE); // Set bold kolom E2
        $object->getActiveSheet()->getStyle('C2')->getFont()->setSize(15); // Set font size 15 untuk kolom E2
        $object->getActiveSheet()->getStyle('C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom E2

        $object->setActiveSheetIndex(0);
        $object->getActiveSheet()->setCellValue('E4', 'No.');
        $object->getActiveSheet()->setCellValue('F4', 'Waktu');
        $object->getActiveSheet()->setCellValue('G4', 'Tanggal');
        $object->getActiveSheet()->setCellValue('H4', 'Curah Hujan');

        $object->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
        $object->getActiveSheet()->getStyle('F4')->applyFromArray($style_col);
        $object->getActiveSheet()->getStyle('G4')->applyFromArray($style_col);
        $object->getActiveSheet()->getStyle('H4')->applyFromArray($style_col);

        $baris = 5;
        $no = 1;

        foreach ($rekap as $row) {
            $object->getActiveSheet()->setCellValue('E' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('F' . $baris, $row->waktu);
            $object->getActiveSheet()->setCellValue('G' . $baris, $row->tanggal);
            $object->getActiveSheet()->setCellValue('H' . $baris, $row->curah_hujan);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $object->getActiveSheet()->getStyle('E' . $baris)->applyFromArray($style_row);
            $object->getActiveSheet()->getStyle('F' . $baris)->applyFromArray($style_row);
            $object->getActiveSheet()->getStyle('G' . $baris)->applyFromArray($style_row);
            $object->getActiveSheet()->getStyle('H' . $baris)->applyFromArray($style_row);

            $baris++;
        }

        // Set width kolom
        $object->getActiveSheet()->getColumnDimension('E')->setWidth(5); // Set width kolom A
        $object->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom B
        $object->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom C
        $object->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom D

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $object->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $object->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        $filename = $label . '.xlsx';

        $object->getActiveSheet()->setTitle("Data Rekap Sensor");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');

        $writer->save('php://output');
        exit;
    }
}
