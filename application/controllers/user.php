<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
			

		$this->load->view('v_user_header');

		$this->load->view('v_user_home' ,true);
		$this->load->view('v_user_footer');
				
	}
	
	public function classification()
	{
			
		$this->load->view('v_user_header');
		$this->load->view('v_user_classification' ,true);
		$this->load->view('v_user_footer');
		
	}

	 

	public function chart(){

		$this->load->model('m_user');
		// $data['val']=$this->m_user->getChart();

		// echo json_encode($data);
		$this->load->view('v_user_header');
		$this->load->view('v_user_chart2',true);
		$this->load->view('v_user_footer');

	}

	public function jsonChart($bln,$th)
		{

		$this->load->model('m_user');
		$qvalue=$this->m_user->getChart($bln,$th);		
		// print_r($qvalue['vpositif']);
		// $data=array();
		$i=0;
		$valueP=array();
		$valueNeg=array();
		$valueNet=array();

		// $iLabel=0;
		// $array
		$label=array('vpositif','vnegatif','vnetral');
		// for ($iLabel=0; $iLabel < count($label) ; $iLabel++) { 		 
		for ($i=0; $i < count($label) ; $i++) { 
			// echo $label[$i];

		
		// echo $label[$iLabel];
			// echo count($label);
			// $label[$iLabel]
			$y=0;
			foreach ($qvalue[$label[$i]] as $value) {

				if($i==0){
					$valueP[$y]= array("x"=>$value['dateTweet'],"y"=>$value['nilaiPositif']);
				}elseif ($i==1) {
					$valueNeg[$y]= array("x"=>$value['dateTweet'],"y"=>$value['nilaiNegatif']);
				}else{
					$valueNet[$y]= array("x"=>$value['dateTweet'],"y"=>$value['nilaiNetral']);
				}
				// echo "<br>";


				
				// echo $value['dateTweet'].' => '.$value['nilaiPositif'];
				
				// echo $value[$i]['dateTweet'].' '.$value[$i]['nilaiPositif'];
				// $i++;
				// print_r($value);
				$y++;
			}
			
		}
			// echo $iLabel;
			// $iLabel++;
		// }
		// print_r($valueNet);
		// $data=array(
		// 	"data"=>array(
		// 			"type"=> "line",
		// 			"name"=> "Positif",
		// 			"color"=> "#e67e22",
		// 			"showInLegend" => true,
		// 			"axisYIndex" => 1,
		// 			"xValueType" =>"dateTime",
		// 			"dataPoints"=>$valueP
		// 			),
		// 			"data"=>array(
		// 			"type"=> "line",
		// 			"name"=> "Negatif",
		// 			"color"=> "#e74c3c",
		// 			"showInLegend" => true,
		// 			"axisYIndex" => 1,
		// 			"xValueType" =>"dateTime",
		// 			"dataPoints"=>$valueNeg
		// 			),
		// 			"data"=>array(
		// 			"type"=> "line",
		// 			"name"=> "Netral",
		// 			"color"=> "#2980b9",
		// 			"showInLegend" => true,
		// 			"axisYIndex" => 1,
		// 			"xValueType" =>"dateTime",
		// 			"dataPoints"=>$valueNet
		// 			)
		// );

		$data=array(
			  'animationEnabled' => true,
			  'title' => 
			 array (
			    // 'text' => 'Grafik klasifikasi Tweet ',
			  ),
			  'axisY' => 
			  array (
			    0 => 
			    array (
			      'title' => 'Kategori Tweet',
			      'lineColor' => '#2c3e50',
			      'tickColor' => '#2c3e50',
			      'labelFontColor' => '#2c3e50',
			      'titleFontColor' => '#2c3e50',
			      'suffix' => 'k',
			    ),
			  ),
			  'toolTip' => 
			  array (
			    'shared' => true,
			  ),
			  'legend' => 
			  array (
			    'cursor' => 'pointer',
			    'itemclick' => 'toggleDataSeries',
			  ),
			"data"=>array(
			0=>array(
					"type"=> "line",
					"name"=> "Positif",
					"color"=> "#e67e22",
					"showInLegend" => true,
					"axisYIndex" => 1,
					"xValueType" =>"dateTime",
					"dataPoints"=>$valueP
				),
			1=>array(
					"type"=> "line",
					"name"=> "Negatif",
					"color"=> "#e74c3c",
					"showInLegend" => true,
					"axisYIndex" => 2,
					"dataPoints"=>$valueNeg
				),
			2=>array(
					"type"=> "line",
					"name"=> "Netral",
					"color"=> "#2980b9",
					"showInLegend" => true,
					"axisYIndex" => 3,
					"dataPoints"=>$valueNet
				)
			)
		);
		// print_r($data);
	
		echo json_encode($data);
		// json_decode($data);

	}
	public function viewKlasifikasiTweet(){

		$this->load->model('m_user');
		$data['data']=$this->m_user->getAll();
		$data['title'] = 'Home';
		$data['header'] = '';
		$data['script'] = '';
		$value['data'] = '';
		// $data['content'] = 
		
		// $this->load->view('template/header', $data);
		// $this->load->view('template/content');

		// $this->template($data);


		// // echo json_encode($data);
		$this->load->view('v_user_header');
		$this->load->view('v_viewKlasifikasiTweet',$data);
		$this->load->view('template/footer');
		// $this->load->view('v_user_chart2',true);
		// $this->load->view('v_user_footer');
	}

	// public function template($data)
	// 	{
	// 		$this->load->view('template/header', $data);
	// 		// $this->load->view('template/left');
	// 		$this->load->view('template/content');
	// 		// $this->load->view('template/footer');
	// 	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */