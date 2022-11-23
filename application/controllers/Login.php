<?php

class Login extends CI_Controller{

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('M_login');
	}

	public function index()
	{
		if($this->session->userdata('nama') != ''){
			redirect('dashboard');
		}
		else{

			$this->load->view('V_login');
		}
	}

	public function proses_login()
	{
		$nama = $this->input->post('nama');
		$pass = $this->input->post('password');
		$this->M_login->proses_login($nama,$pass);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}

