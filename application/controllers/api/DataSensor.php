<?php

class DataSensor extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_api');
    }
    public function index()
    {
        $data = $this->M_api->insertDataSensor();
        echo json_encode($data);
    }
    public function ucupasu(){
        $data = $this->M_api->ucupAsu();
        echo json_encode($data);
    }
}