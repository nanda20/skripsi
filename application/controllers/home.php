<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function index()
	{
		$this->load->model('m_home');
		$data['countData']=$this->m_home->getData();

		$data['title'] = 'Home';
		$data['header'] = '';
		$data['script'] = '';
		$value['data'] = '';
		$data['content'] = $this->load->view('v_home',$data,true);
		$this->template($data);
	}


	public function template($data)
	{
		$this->load->view('template/header', $data);
		$this->load->view('template/left');
		$this->load->view('template/content');
		$this->load->view('template/footer');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */