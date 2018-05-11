<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class naivebayes extends CI_Controller {

	public function index()
	{
 
		
		$db= $this->db->query("select * from datacorpus ")->result();
		

		echo "<br>";
		$V =  $this->db->query("select count(*) as count from datacorpus  ")->result();
		// print_r($V[0]->count);
		$i=1;
		foreach ($db as $value) {
			$nc = $this->db->query("select count(*) as count from datacorpus where label='".$value->label."' ")->result();
			echo $i.' '.$value->feature.' '. $value->label .' | Tct=' .$value->frequency.' | Nc = '.$nc[0]->count.' | V='.$V[0]->count.' Probability = '.(($value->frequency+1)/($nc[0]->count+$V[0]->count)).'</br>';
			$i++;
		}

		
	}


}

/* End of file naivebayes.php */
/* Location: ./application/controllers/naivebayes.php */