<?php

class M_dashboard extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function graph()
    {
        $data = $this->db->query("SELECT * FROM data_sensor ORDER BY id DESC LIMIT 20");
        return $data->result();
    }

    public function curSensor()
    {
        $data = $this->db->query("SELECT * FROM data_sensor WHERE id = (SELECT MAX(id) FROM data_sensor)");
        return $data->result();
    }
    public function petugas(){
        $data = $this->db->get_where('petugas', ['idpetugas' => $this->session->userdata('idpetugas')]);
        return $data->row_array();
    }
    public function getUnreadNotif(){
        $this->db->where('is_read', 0);
        $this->db->order_by('id_notif', 'DESC');
        $query = $this->db->get('notifikasi');
        return $query->result();
    }
}
