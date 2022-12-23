<?php

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_squrity');
		$this->load->model('M_dashboard');
		$this->load->model('M_notifikasi');
	}

	public function index()
	{
		$this->M_squrity->getSqurity();
		$isi['content'] = 'V_home';
		$isi['judul'] = 'Monitoring | Dashboard';
		// dashboard
		$isi['sensor'] = $this->M_dashboard->curSensor();
		$isi['graph'] = $this->M_dashboard->graph();
		$isi['data'] = $this->db->get('data_sensor')->result();
		$isi['notifikasi'] = $this->M_dashboard->getUnreadNotif();
		$isi['user'] = $this->M_dashboard->petugas();
		$this->load->view('V_dashboard', $isi);
	}
}
