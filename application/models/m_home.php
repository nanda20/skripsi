<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_home extends CI_Model {

		function getData(){
			$data["countDataTraining"]= $this->db->query("select count(*) as countDataTraining from dataTraining ")->result();
			$data["countDataStemming"]= $this->db->query("select count(*) as countDataStemming from dataStemming ")->result();
			$data["countDataCorpus"]= $this->db->query("select count(*) as countDataCorpus from dataCorpus ")->result();
			$data["countDataFeature"]= $this->db->query("select count(*) as countDataFeature from dataFeature ")->result();
			return $data;

		}

	

}

/* End of file m_home.php */
/* Location: ./application/models/m_home.php */