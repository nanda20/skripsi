<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_chisquare extends CI_Model {

	public function allDataCorpus()
	{
		$q=$this->db->query("select * from datacorpus");
      	return $q;

	}
	public function insertCorpus($data){
		// print_r($data);
		$this->db->insert('datacorpus',$data);
	}

}

/* End of file m_chisquare.php */
/* Location: ./application/models/m_chisquare.php */