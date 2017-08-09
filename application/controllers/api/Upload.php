<?php
 
require APPPATH . '/libraries/REST_Controller.php';

class Upload extends REST_Controller {
 
    function __construct($config = 'rest') {
        parent::__construct($config);
    }

 function index_post() {

	  
		$target_path = "upload/";
		
		$result = array("success" => $_FILES["file"]["name"]);
		$fileName=basename( $_FILES['file']['name']);
		$file_path = $target_path.$fileName;

		if(move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {

                $data = array(
                	'id1'           => $this->post('id1'),
                    'id_pel'        => $this->post('id_pel'),
                    'kelainan'      => $this->post('kelainan'),
                    'stand_kini'    => $this->post('stand'),
                    'foto'		 	=> $fileName
                    );

                $this->load->model("model_transaksi");
					
				$insert = $this->model_transaksi->api_transaksi($data);
				// // echo $insert;
				// // print_r($insert);

		        if ($insert) {
		        	$result = array( "status" => "success");
		        	// $this->response(array('status' => 'Success', 502));
		            // $this->response($data, 200);
		        } else {
		            $result = array( "status" => "error");
		        }
		}
		echo json_encode($result, JSON_PRETTY_PRINT);

 }

}