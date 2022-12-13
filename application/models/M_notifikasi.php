<?php

class M_notifikasi extends CI_Model
{
    public function getNotif()
    {
        $this->db->order_by('id_notif', 'DESC');
        $query = $this->db->get('notifikasi');
        return $query->result();
    }
    public function hapus($id)
    {
        $this->db->where('id_notif', $id);
        $this->db->delete('notifikasi');
    }
}
