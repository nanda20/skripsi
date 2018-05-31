<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	public function index()
	{
			

		$this->load->view('v_user_header');

		$this->load->view('v_user_home' ,true);
		$this->load->view('v_user_footer');
				
	}
	
	public function classification()
	{
			

		$this->load->view('v_user_header');
		$this->load->view('v_user_classification' ,true);
		$this->load->view('v_user_footer');

		
			
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */