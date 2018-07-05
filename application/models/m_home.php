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
		function getLogAll(){
			return $this->db->get('log')->result();
		}

		function getLog(){
			$data["docPositif"]= $this->db->query("select count(*) as docPositif from dataStemming where label='positif' ")->result_array();
			$data["docNegatif"]= $this->db->query("select count(*) as docNegatif from dataStemming where label='negatif' ")->result_array();
			$data["docNetral"]= $this->db->query("select count(*) as docNetral from 
				dataStemming where label='netral' ")->result_array();
			$data["docNaiveBayes"]= $this->db->query("select count(*) as docNaiveBayes from datanb ")->result_array();
			$data["docFeature"]= $this->db->query("select count(*) as docFeature from dataFeature ")->result_array();
			$data["docDataUji"]= $this->db->query("select count(*) as docDataUji from datatesting ")->result_array();
			
			return $data;
		}

	

}

/* End of file m_home.php */
/* Location: ./application/models/m_home.php */