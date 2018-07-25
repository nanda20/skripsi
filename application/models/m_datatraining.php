<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_datatraining extends CI_Model {

  	public function all(){

      	$q=$this->db->query("select * from datatraining ");
      	return $q;
    }

  	public function insertDataTraining($data){
  		$this->db->insert('datatraining',$data);
  	}
  	public function updateDataTraining($id,$label){
			$data = array('label' => $label);
			$this->db->where('idDataTraining', $id);
			$this->db->update('datatraining', $data); 
  	}
    public function getStemm(){
      return $this->db->query("SELECT count(idDataTraining) stemm FROM `datatraining` WHERE stemming=0")->result();
    }

    public function getCountDocStemm(){

        $q=$this->db->query("select count(*) getAllStemm from datastemming")->result();
        return $q;
    }

    public function updateDataTrainingStemming($id){
      $data = array('stemming' => 1);
      $this->db->where('idDataTraining', $id);
      $this->db->update('datatraining', $data); 
    }

    public function dataTraining(){

        $q=$this->db->query("select * from datatraining where label !='' ")->result();
        return $q;
    }
    

    public function insertDataStemming($data){
        $this->db->insert('datastemming',$data);
    }

    public function allDataStemming(){
        $q=$this->db->query("select ds.idDataStemming,ds.idDataTraining,ds.tweet,dt.label,dt.username from datastemming ds join datatraining dt on ds.idDataTraining =dt.idDataTraining");
        return $q;
    }
    public function allDataStemmingByLabel($label){
        $q=$this->db->query("select ds.idDataStemming,ds.idDataTraining,ds.tweet,dt.label,dt.username from datastemming ds join datatraining dt on ds.idDataTraining =dt.idDataTraining where dt.label='$label'")->result_array();
        return $q;
    }
    public function insertDataFeature($data){
        
      $q=$this->db->query("select feature from datafeature where feature='".$data['feature']."' and label='".$data['label']."' ")->result();
      
          
          if(sizeof($q)==1){
            $this->db->set('frequency',$data['frequency'], FALSE);
            $this->db->where('feature', $data['feature']);
            $this->db->where('label', $data['label']);
            $this->db->update('datafeature');
          }else{
            $this->db->insert('datafeature',$data);
          }

        
        

        
    }

    public function allDataFeature(){
        $q=$this->db->query("select * from datafeature ");
        return $q;
    }

}

/* End of file m_datalearing.php */
/* Location: ./application/models/m_datalearing.php */