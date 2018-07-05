<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChiSquare extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_chisquare');
	}
	public function index()
	{
		
	}


	public function template($data)
	{
		$this->load->view('template/header', $data);
		$this->load->view('template/left');
		$this->load->view('template/content');
		$this->load->view('template/footer');
	}
	public function viewCorpus(){


		
		$data['title'] = 'Chi Square';
		$data['header'] = '';
		$data['script'] = '';
		$value['data'] = $this->m_chisquare->allDataCorpus();
		// $value['allChiSquare']=$this->m_chisquare->allChiSquare();
		$data['content'] = $this->load->view('v_datacorpus',$value, true);
		$this->template($data);

		if($this->input->post('submit')){
			$this->processchisquare();
		}
	}

	public function processchisquare(){
	 	$this->m_chisquare->truncateCorpus();
		$Qterm= $this->db->query("select * from datafeature")->result();
		$value['data']= array();
		$i=1;
		$y=1;
		$hasil = array();	
		foreach ($Qterm as $value) {
			
					$result = $this->counting_chi($i,$value->feature,$value->label);
			 
			 // echo $i.' - '.$result.'<br>';
				if($result >=2.70554 ){

					$data=array('id' =>null ,'feature'=>$value->feature,'frequency'=>$value->frequency,'label'=>$value->label,'valueChiSquare'=>$result);
					// echo $y++.' - '.$data['feature'].' - '. $data['label'] .' '.$data['valueChiSquare'].'<br>';
				// 	// array_push($hasil,$data); 
				// 	// echo $data;


					$this->m_chisquare->insertCorpus($data);
				}
				
			$i++;
		}

		redirect('NaiveBayes/processnaivebayes');	
		
	}


	public function counting_chi($no,$term,$label){
		//pengaruh
		$A= $this->db->query("select count(*) as A from datastemming where label='".$label."' and tweet like '% ".$term."%' or  tweet like '%".$term." %' ")->result();
		// $A= $this->db->query("select frequency as A from datafeature where label='".$label."' and feature='".$term."' ")->result();
		// echo $label.' '.$term;
		$C= $this->db->query("select count(*) as C from datastemming where label ='".$label."' and tweet not in(select tweet from datastemming where tweet like '% ".$term."%' or tweet like '%".$term." %') ")->result();
		$D= $this->db->query("select count(*) as D from datastemming where label !='".$label."' and tweet not in(select tweet from datastemming where tweet like '% ".$term."%' or tweet like '%".$term." %') ")->result();

			// $D= $this->db->query("select count(*) as D from datastemming where label !='".$label."'  and tweet not in(select tweet from datastemming where tweet like ' ".$term."' or tweet like '".$term." ') ")->result();
			
		//pengaruh
		$B= $this->db->query("select count(*) as B from datastemming where label !='".$label."' and tweet in(select tweet from datastemming where tweet like '% ".$term."%' or tweet like '%".$term." %') ")->result();
		// $B= $this->db->query("SELECT count(*) as B FROM datastemming WHERE label !='".$label."' and tweet REGEXP '[[:<:]]".$term."[[:>:]]'")->result();
			


		$N= $this->db->query("select count(*) as N from datastemming ")->result();
		
		// echo $no." Term=>".$term.", Label=>".$label;
		// echo "| A = ".$A[0]->A;
		// echo "| D = ".$D[0]->D;
		// echo "| C = ".$C[0]->C;
		// echo "| B = ".$B[0]->B;
		// echo "| N = ".$N[0]->N;
		
		
		// echo "| X^2 = ". $result=($N[0]->N * pow(($A[0]->A*$D[0]->D -$C[0]->C*$B[0]->B),2))/(($A[0]->A+$C[0]->C)*($B[0]->B+$D[0]->D)*($A[0]->A+$B[0]->B)*($C[0]->C+$D[0]->D));
		// echo "</br>";
		$result=($N[0]->N * pow(($A[0]->A*$D[0]->D -$C[0]->C*$B[0]->B),2))/(($A[0]->A+$C[0]->C)*($B[0]->B+$D[0]->D)*($A[0]->A+$B[0]->B)*($C[0]->C+$D[0]->D));
		return $result;
	}

}

/* End of file chisquare.php */
/* Location: ./application/controllers/chisquare.php */