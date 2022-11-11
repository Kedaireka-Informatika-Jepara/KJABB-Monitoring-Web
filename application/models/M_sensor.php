<?php

class M_sensor extends CI_Model
{

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

    public function hapus($id)
    {
        $this->db->where('id_sensor', $id);
        $this->db->delete('sensor');
    }
}
