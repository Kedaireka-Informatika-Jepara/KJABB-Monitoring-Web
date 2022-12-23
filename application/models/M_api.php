<?php

class M_api extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('Asia/Bangkok');
        
    }
    public function insertDataSensor(){
        $d = date("Y-m-d");
        $t = date("H:i:s");
        $data = array(
            'suhu' => $_POST['suhu'],
            'amonia' => $_POST['gas'],
            'curah_hujan' => $_POST['raindrop'],
            'ph' => $_POST['ph'],
            'turbidity' => $_POST['turbidity'],
            'do' => $_POST['tds'],
            'tanggal' => $d,
            'waktu' => $t
        );
        $this->db->insert('data_sensor', $data);
        $sensor = $this->db->get('sensor')->result();
        $notif = array(
            'tanggal_notif' => $d,
            'waktu_notif' => $t,
            'judul' => '',
            'pesan' => ''
        );
        foreach ($sensor as $s) {
            if($s->nama_sensor == "Suhu" && (($data['suhu'] > $s->batas_atas)||($data['suhu'] < $s->batas_bawah))){
                $notif['judul'] = 'Suhu air melewati batas normal';
                $notif['pesan'] = 'Suhu air saat ini melewati batas normal, yaitu '.$data['suhu'].' derajat celcius';
                $this->db->insert('notifikasi', $notif);
            }
            if($s->nama_sensor == "Amonia" && (($data['amonia'] > $s->batas_atas)||($data['amonia'] < $s->batas_bawah))){
                $notif['judul'] = 'Kadar amonia melewati batas normal';
                $notif['pesan'] = 'Kadar amonia saat ini melewati batas normal, yaitu '.$data['amonia'].' ppm';
                $this->db->insert('notifikasi', $notif);
            }
            // if($s->nama_sensor == "Curah Hujan" && (($data['curah_hujan'] > $s->batas_atas)||($data['curah_hujan'] < $s->batas_bawah))){
            //     $notif['judul'] = 'Curah hujan melewati batas normal';
            //     $notif['pesan'] = 'Curah hujan saat ini melewati batas normal, yaitu '.$data['curah_hujan'].' mm';
            //     $this->db->insert('notifikasi', $notif);
            // }
            if($s->nama_sensor == "pH" && (($data['ph'] > $s->batas_atas)||($data['ph'] < $s->batas_bawah))){
                $notif['judul'] = 'Kadar pH melewati batas normal';
                $notif['pesan'] = 'Kadar pH saat ini melewati batas normal, yaitu '.$data['ph'];
                $this->db->insert('notifikasi', $notif);
            }
            if($s->nama_sensor == "Turbidity" && (($data['turbidity'] > $s->batas_atas)||($data['turbidity'] < $s->batas_bawah))){
                $notif['judul'] = 'Kadar turbidity melewati batas normal';
                $notif['pesan'] = 'Kadar turbidity saat ini melewati batas normal, yaitu '.$data['turbidity'].' NTU';
                $this->db->insert('notifikasi', $notif);
            }
            if($s->nama_sensor == "TDS" && (($data['do'] > $s->batas_atas)||($data['do'] < $s->batas_bawah))){
                $notif['judul'] = 'Kadar DO melewati batas normal';
                $notif['pesan'] = 'Kadar DO saat ini melewati batas normal, yaitu '.$data['do'].' mg/L';
                $this->db->insert('notifikasi', $notif);
            }
        }
    }
}