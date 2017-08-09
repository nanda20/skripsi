<?php
 
require APPPATH . '/libraries/REST_Controller.php';

class Pelanggan extends REST_Controller {
 
    function __construct($config = 'rest') {
        parent::__construct($config);
    }

 function index_get() {

 		// $dt=$this->db->query("select * from login")->result();
 		// echo json_encode($dt);

        $this->load->model('Model_pelanggan');
        // $data=array();
        // 
        $pelanggan = $this->Model_pelanggan->api_pelanggan()->result();
        //  // var_dump($pelanggan);
        $data=['hasil'=>$pelanggan];
        // $this->response($data, 200); 
        echo json_encode($data,JSON_UNESCAPED_SLASHES);
 }
	 

	 // function index_post(){
	 // 	$data = array(
  //                   'id'  => $this->post('id_pel'),
  //                   'username'  => "test",
  //                   'password'  => "12345",
  //                   'nama'  => "Test",
  //                   'jabatan'  => "admin"
  //        );
	 // 	$this->db->insert('login',$data);
		
		// echo json_encode($data, JSON_PRETTY_PRINT);

	 // }


}