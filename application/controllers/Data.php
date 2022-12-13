<?php 
require APPPATH . 'libraries\RestController.php';
require APPPATH . 'libraries\Format.php';
use chriskacerguis\RestServer\RestController;

class Data extends RestController{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_dashboard');
	}
    public function index_get(){
		$isi['sensor'] = $this->db->get('sensor')->result();
		$isi['data'] = $this->db->get('data_sensor')->result();
        $this->response($isi,200);
    }
}
