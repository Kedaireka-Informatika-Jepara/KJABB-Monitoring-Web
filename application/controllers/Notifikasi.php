<?php

class Notifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_notifikasi');
        $this->load->model('M_squrity');
    }

    public function index()
    {
        $this->M_squrity->getSqurity();
        $isi['content'] = 'notifikasi/V_notifikasi';
        $isi['judul'] = 'Daftar Notifikasi';
        $isi['data'] = $this->M_notifikasi->getNotif();
        $this->load->view('V_dashboard', $isi);
    }

    public function tandai($id)
    {
        $this->M_squrity->getSqurity();
        $query = $this->M_notifikasi->tandai($id);
        if($query = true){
        $this->session->set_flashdata('info', 'Notifikasi Sudah Dibaca');
        redirect('notifikasi');
        }
    }

    public function hapus($id)
    {
        $this->M_squrity->getSqurity();
        $query = $this->M_notifikasi->hapus($id);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Notifikasi Berhasil Dihapus');
            redirect('notifikasi');
        }
    }

    public function tandaisemua()
    {
        $this->M_squrity->getSqurity();
        $query = $this->M_notifikasi->tandaisemua();
        if($query = true){
        $this->session->set_flashdata('info', 'Semua Notifikasi Sudah Dibaca');
        redirect('notifikasi');
        }
    }

    public function hapussemua(){
        $this->M_squrity->getSqurity();
        $query = $this->M_notifikasi->hapussemua();
        if($query = true){
        $this->session->set_flashdata('info', 'Semua Notifikasi Berhasil Dihapus');
        redirect('notifikasi');
        }
    }
}
