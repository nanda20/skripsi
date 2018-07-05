<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_naivebayes extends CI_Model {

	function getAll(){

		$q=$this->db->query("select * from datanb");
      	return $q;
	}
	
	public function truncateNb(){
		$this->db->truncate('datanb'); 
	}

	function updateDataTraining($data){
		$this->db->where('id', $data['id']);
		$value=array('nilaiPositif'=>$data['nilai'][0],
					'nilaiNegatif'=>$data['nilai'][1],
					'nilaiNetral'=>$data['nilai'][2],
					'labelNB'=>$data['labelMax']);

   		$this->db->update('datatesting', $value); 
		
		// $this->db->update('datatesting',$data);
	}

	

}

/* End of file m_naivebayes.php */
/* Location: ./application/models/m_naivebayes.php */