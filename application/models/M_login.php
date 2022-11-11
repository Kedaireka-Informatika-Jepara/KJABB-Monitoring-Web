<?php

class M_login extends CI_Model{

	public function proses_login($nama,$pass)
	{
		$password = md5($pass);
		$nama = $this->db->where('nama',$nama);
		$pass = $this->db->where('password',$password);
		$query = $this->db->get('petugas');
		if($query->num_rows()>0){
			foreach ($query->result() as $row){
				$sess = array(
					'idpetugas'		=>$row->idpetugas,
					'nama'			=>$row->nama,
					'password'		=>$row->password
				);
				$this->session->set_userdata($sess);
			}
			redirect('dashboard');
		}else{
			$this->session->set_flashdata('info','<div class="alert alert-danger">Login Gagal, Silahkan Periksa Username dan Password !</div>');
			redirect ('login');
		}
	}
}