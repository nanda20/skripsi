<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_chisquare extends CI_Model {

	public function allDataCorpus()
	{
		$q=$this->db->query("select dc.idDataCorpus,dc.feature,df.frequency,df.label,dc.valueChiSquare from datacorpus dc join dataFeature df on dc.idDataFeature=df.idDatafeature");
      	return $q;
	}

	public function allChiSquare()
	{
		$q=$this->db->query("select count(*) as allChiSquare from datafeature ")->result();
      	return $q;
	}

	public function insertCorpus($data){
		// print_r($data);
		$this->db->insert('datacorpus',$data);
	}
	public function truncateCorpus(){
		$this->db->empty_table("datanb");
		$this->db->empty_table("datacorpus");
		// $this->db->truncate('datanb'); 
		// $this->db->truncate('datacorpus'); 
	}
	// public function viewChiFilter(){
	// 	$q=$this->db->query("select count(*) as allChiSquare from datafeature ")->result();
 //      	return $q;		
	// }
	

}

/* End of file m_chisquare.php */
/* Location: ./application/models/m_chisquare.php */