<?php

class M_notifikasi extends CI_Model
{

    public function hapus($id)
    {
        $this->db->where('id_notif', $id);
        $this->db->delete('notifikasi');
    }
}
