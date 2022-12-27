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
            'co2' => $_POST['gas'],
            'curah_hujan' => $_POST['raindrop'],
            'ph' => $_POST['ph'],
            'turbidity' => $_POST['turbidity'],
            'tds' => $_POST['tds'],
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
            if($s->nama_sensor == "CO2" && (($data['co2'] > $s->batas_atas)||($data['co2'] < $s->batas_bawah))){
                $notif['judul'] = 'Kadar co2 melewati batas normal';
                $notif['pesan'] = 'Kadar co2 saat ini melewati batas normal, yaitu '.$data['co2'].' ppm';
                $this->db->insert('notifikasi', $notif);
            }
            if($s->nama_sensor == "Curah Hujan" && $data['curah_hujan']==0){
                    $notif['judul'] = 'Terjadi Hujan Deras';
                    $notif['pesan'] = 'Hujan Deras terjadi di sekitar keramba';
                    $this->db->insert('notifikasi', $notif);
                
            }
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
            if($s->nama_sensor == "TDS" && (($data['tds'] > $s->batas_atas)||($data['tds'] < $s->batas_bawah))){
                $notif['judul'] = 'Kadar tds melewati batas normal';
                $notif['pesan'] = 'Kadar tds saat ini melewati batas normal, yaitu '.$data['tds'].' ppm';
                $this->db->insert('notifikasi', $notif);
            }
        }
    }
}