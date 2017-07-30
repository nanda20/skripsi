<?php
 
require APPPATH . '/libraries/REST_Controller.php';

class Pelanggan extends REST_Controller {
 
    function __construct($config = 'rest') {
        parent::__construct($config);
    }

 function index_get() {
        $this->load->model('Model_pelanggan');
        $data=array();
        
        $pelanggan = $this->Model_pelanggan->all_pelanggan()->result();
         // var_dump($pelanggan);
        $data=['hasil'=>$pelanggan];
        $this->response($data, 200); 
 }

}