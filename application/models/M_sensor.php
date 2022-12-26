<?php

class M_sensor extends CI_Model
{ 
    public function __construct()
    {
        $this->load->database();
    }
    public function getSensor()
    {
        $this->db->order_by('id_sensor', 'ASC');
        $query = $this->db->get('sensor');
        return $query->result();
    }
    public function edit($id)
    {
        $this->db->where('id_sensor', $id);
        return $this->db->get('sensor')->row_array();
    }

    public function update($id_sensor, $data)
    {
        $this->db->where('id_sensor', $id_sensor);
        $this->db->update('sensor', $data);
    }
}
