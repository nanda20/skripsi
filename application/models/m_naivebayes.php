<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_naivebayes extends CI_Model {

	function getAll(){

		$q=$this->db->query("select * from datanb");
      	return $q;
	}

	

}

/* End of file m_naivebayes.php */
/* Location: ./application/models/m_naivebayes.php */