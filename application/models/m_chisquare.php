<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_chisquare extends CI_Model {

	public function allDataCorpus()
	{
		$q=$this->db->query("select * from datacorpus");
      	return $q;

	}

	public function allChiSquare()
	{
		$q=$this->db->query("select count(*) as allChiSquare from datafeature where chisquare=0")->result();
      	return $q;

	}

	public function insertCorpus($data){
		// print_r($data);
		$this->db->insert('datacorpus',$data);
	}
	public function updateFeatureStatus($id){
		$this->db->set('chisquare', 1);
		$this->db->where('id', $id);
		$this->db->update('datafeature'); 
	}

}

/* End of file m_chisquare.php */
/* Location: ./application/models/m_chisquare.php */