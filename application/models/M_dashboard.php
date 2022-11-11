<?php

class M_dashboard extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function graph()
    {
        $data = $this->db->query("SELECT * FROM data_sensor ORDER BY data_sensor.tanggal DESC LIMIT 20");
        return $data->result();
    }

    public function curSensor()
    {
        $data = $this->db->query("SELECT * FROM data_sensor WHERE id = (SELECT MAX(id) FROM data_sensor)");
        return $data->result();
    }
}
