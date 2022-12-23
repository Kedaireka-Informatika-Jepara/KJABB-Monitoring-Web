<?php

class Sensor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_sensor');
        $this->load->model('M_squrity');
    }

    public function index()
    {
        $this->M_squrity->getSqurity();
        $isi['content'] = 'sensor/V_sensor';
        $isi['judul'] = 'Monitoring | Daftar Data Batas Sensor';
        $isi['data'] = $this->M_sensor->getSensor();
        $this->load->view('V_dashboard', $isi);
    }


    public function edit($id)
    {
        $this->M_squrity->getSqurity();
        $isi['content'] = 'sensor/Edit_sensor';
        $isi['judul'] = 'Monitoring | Form Edit Batas Sensor';
        $isi['data'] = $this->M_sensor->edit($id);
        $this->load->view('V_dashboard', $isi);
    }

    public function update()
    {
        $this->M_squrity->getSqurity();
        $id_sensor = $this->input->post('id_sensor');
        $data = array(
            'nama_sensor' => $this->input->post('nama_sensor'),
            'batas_bawah' => $this->input->post('batas_bawah'),
            'batas_atas' => $this->input->post('batas_atas')
        );
        $query = $this->M_sensor->update($id_sensor, $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Di-update');
            redirect('sensor');
        }
    }

    public function hapus($id)
    {
        $this->M_squrity->getSqurity();
        $query = $this->M_sensor->hapus($id);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Dihapus');
            redirect('sensor');
        }
    }
}
