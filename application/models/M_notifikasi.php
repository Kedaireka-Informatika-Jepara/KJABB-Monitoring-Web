<?php

class M_notifikasi extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function tandai($id)
    {
        $data = [
            'is_read' => 1
        ];
        $this->db->update('notifikasi', $data, ['id_notif' => $id]);
    }
    public function tandaisemua(){
        $data = [
            'is_read' => 1
        ];
        $this->db->update('notifikasi', $data);
    }
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
    public function hapussemua(){
        $this->db->empty_table('notifikasi');
    }
}
