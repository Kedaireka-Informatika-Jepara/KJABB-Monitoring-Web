<?php 
require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class Data extends RestController{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_dashboard');
		$this->load->model('M_sensor');
	}
    public function index_get(){
        $isi['sensor'] = $this->M_dashboard->curSensor();
		$isi['graph'] = $this->M_dashboard->graph();
		$isi['data'] = $this->db->get('data_sensor')->result();
		$isi['message'] = "Successfully Retrieved Data Recap";
        $this->response($isi,200);
    }
	public function sensoredit_post(){
		$id_sensor = $_POST['id_sensor'];
        $data = array(
            'nama_sensor' => $_POST['nama_sensor'],
            'batas_bawah' => $_POST['batas_bawah'],
            'batas_atas' => $_POST['batas_atas']
        );
        $response = $this->M_sensor->update($id_sensor, $data);
        // $response['message'] = "Successfully Update Sensor Data";
		$this->response($response,200);
	}
	public function threshold_get(){
	    $threshold = $this->db->get('sensor')->result();
	   // $threshold['message'] = "Successfully Retrieved Sensor Data";
	    $this->response($threshold,200);
	}
}