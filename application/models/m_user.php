<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_user extends CI_Model {
	

	function cekDataTweet($date,$username){
		return $this->db->query("SELECT count(*) as jml FROM klasifikasitweet WHERE created_at='$date' and username='$username'")->result();

	}
	function getAll(){
		return $this->db->query("SELECT * from klasifikasitweet")->result();

	}
	function insert($data){
		$this->db->insert('klasifikasitweet',$data);
	}

	function getChart(){
		$data=array();
		$qDate=$this->db->query("select date(created_at)as dateTweet from klasifikasitweet group by date(created_at) ORDER by created_at ASC")->result();
		// print_r($qDate);
		// echo $qDate->dateTweet."<br>";
		$i=0;
		$lbl=array('positif','negatif','netral');
		// $y=0;
		$valuePositif=array();
		$valueNegatif=array();
		$valueNetral=array();
		foreach ($qDate as $val ) {
			
			$countLabel=$this->db->query("select (SELECT count(label) FROM `klasifikasitweet` WHERE label='positif' and date(created_at)='".$val->dateTweet."')as positif,(SELECT count(label) FROM `klasifikasitweet` WHERE label='negatif' and date(created_at)='".$val->dateTweet."')as negatif, (SELECT count(label) FROM `klasifikasitweet` WHERE label='netral' and date(created_at)='".$val->dateTweet."')as netral")->result_array();

			
			// print_r($countLabel);
			// // echo "<br>";
			
			// $y=0;	
			foreach ($countLabel as $label) {
				// echo $val->dateTweet.'<br>';
				$valuePositif[$i] = array('dateTweet'=> strtotime($val->dateTweet),'nilaiPositif'=>intval($label['positif']));
				$valueNegatif[$i] = array('dateTweet'=> strtotime($val->dateTweet),'nilaiNegatif'=>intval($label['negatif']));
				$valueNetral[$i] = array('dateTweet'=> strtotime($val->dateTweet),'nilaiNetral'=>intval($label['netral']));
				// if()

				

				// echo $y;
				// echo $lbl[$y];
				// echo "<br>";
				
				
				// if($y==3){
				// 	$y=0;
				// }
				// echo $y;
				// $y++;

			}
			// $y=0;

			
			// echo "<br>";
			// $data[$i]=array('x'=>strtotime($val->dateTweet),'y'=>$countLabel[0]);
			$i++;

		}
		// print_r($valueNetral);
		return array('vpositif'=>$valuePositif,'vnegatif'=>$valueNegatif,'vnetral'=>$valueNetral);
		
	}
	

}

/* End of file user.php */
/* Location: ./application/models/user.php */