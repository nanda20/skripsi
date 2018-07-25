<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChiSquare extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_chisquare');
	}
 
	public function template($data)
	{
		$this->load->view('template/header', $data);
		$this->load->view('template/left');
		$this->load->view('template/content');
		$this->load->view('template/footer');
	}
	public function viewCorpus(){

		$data['title'] = 'Chi Square';
		$data['header'] = '';
		$data['script'] = '';
		$value['data'] = $this->m_chisquare->allDataCorpus();
		// $value['allChiSquare']=$this->m_chisquare->allChiSquare();
		$data['content'] = $this->load->view('v_datacorpus',$value, true);
		$this->template($data);

		if($this->input->post('submit')){
			$this->processchisquare();
		}
	}

	public function viewFilter (){

		$qfeature=$this->db->query("select feature,label from datafeature ")->result();
		
		foreach ($qfeature as $value) 
		{
			
			$qChi=$this->db->query("select feature from datacorpus where feature='".$value->feature."' and label='".$value->label."' ")->result();
			
			if(count($qChi)>0){
				echo $value->feature.'=='.$qChi[0]->feature.' label = '.$value->label .'<br>';
			}else{
				echo $value->feature.' - '.$value->label.'<br>';
			}
			
		}		
 

		// $data['title'] = 'Filter Chi Square';
		// $data['header'] = '';
		// $data['script'] = '';
		// $value['data'] = $this->m_chisquare->allDataCorpus();
		// $data['content'] = $this->load->view('v_chisquarefilter',$value,true);
		// $this->template($data);
	}

	

}

/* End of file chisquare.php */
/* Location: ./application/controllers/chisquare.php */