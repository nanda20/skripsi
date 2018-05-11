<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class onlinecrawling extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_datatraining');
	}
	public function template($data)
	{
		$this->load->view('template/header', $data);
		$this->load->view('template/left');
		$this->load->view('template/content');
		$this->load->view('template/footer');
	}
	
	public function tambahdatacrawling(){

		$data['title'] = 'Tambah Data';
		$data['header'] = '';
		$data['script'] = '';
		
		// echo $this->input->post('tweet1');

		if($this->input->post('tweet1') !="" ){
			
			$qty = $this->input->post("tweetQty");
			
			for ($i=0; $i <= $qty ; $i++) { 
				if ($this->input->post("check".$i)=="on") {
					// echo $this->input->post('tweet'.$i)."<br>";		
					$data=array(
						'id'=>null,
						'username'=>$this->input->post('user'.$i),
						'tweet'=>$this->input->post('tweet'.$i)
						);
					$this->m_datatraining->insertDataTraining($data);
				}
				
			}
			// echo "Data Berhasil di inputkan";
			redirect('datatraining/viewtraining','refresh');
		}else{
			$data['content'] = $this->load->view('v_datatrainingcrawling','', true);
			$this->template($data);	
		}

		
	}

}

/* End of file onlinecrawling.php */
/* Location: ./application/controllers/onlinecrawling.php */