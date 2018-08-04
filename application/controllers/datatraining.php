<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DataTraining extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_datatraining');
		$path= __DIR__;
		$new_path= dirname($path,2);

		require_once $new_path.'/vendor/autoload.php';
	}

	
	 
	public function template($data)
	{
		$this->load->view('template/header', $data);
		$this->load->view('template/left');
		$this->load->view('template/content');
		$this->load->view('template/footer');
	}

	public function testExcel(){
		$this->load->library('PHPexcel');
		if ($this->input->post('file_source')) {

			echo "file terimport";
		}

		// $this->load->library('excel_reader');

		// Read the spreadsheet via a relative path to the document
		// for example $this->excel_reader->read('./uploads/file.xls');
		// $this->excel_reader->read('./uploads/Book1.xlsx');

		// // Get the contents of the first worksheet
		// $worksheet = $this->excel_reader->sheets[0];

		// $numRows = $worksheet['numRows']; // ex: 14
		// $numCols = $worksheet['numCols']; // ex: 4
		// $cells = $worksheet['cells']; // 
	}
	//tambah data training
	public function viewAddExcel(){
		
		$data['title'] = 'Tambah Data';
		$data['header'] = '';
		$data['script'] = '';
		$data['content'] = $this->load->view('v_datatrainingimport','', true);
		$this->template($data);	
	}

	public function progress(){
		$this->load->helper('url');
		$this->load->library('session');
		$this->config->item('base_url');
		// $this->load->library('chisquare');
			$path= __DIR__;
			$new_path= dirname($path,2);
			// require_once(APPPATH.'controllers/chisquare.php'); //include controller
   //          $chisquare = new chisquare();  
   //          $chisquare->processnaivebayes();


        		// echo date_format(date_create("Thu May 24 16:03:30 +0000 2018"),"Y-m-d H:i:s");

			// include('application\helpers\chisquare.php');
			
			// $this->load->library('session');
			// $this->load->library('../controllers/chisquare.php');



            //create object 

            // $this->_ci_load_library($class.'/'.$class, $params, $object_name);
            // $aObj->custom_a();

				// $new_path.'/application/controllers/chisquare.php';

				// if (file_exists($new_path) && is_file($new_path)) {

			 //            @include_once($new_path);
			 //            echo "found";
			 //        } else{
				// 		echo "n Found";
			 //        }

				// $chisquare = new chisquare();

		 
			// echo "

			// <style>
			// #myProgress {
			//   width: 100%;
			//   background-color: #ddd;
			// }

			// #myBar {
			//   width: 10%;
			//   height: 30px;
			//   background-color: #4CAF50;
			//   text-align: center;
			//   line-height: 30px;
			//   color: white;
			// }
			// </style>
			// <body>

		 


			//   <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
			//   <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
			//   <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>



			// 	<div id='myProgress'  >
			// 		  <div id='myBar' role='progressbar'>10%</div>
			// 	</div>

			// <br>
			// <button onclick='move()'>Click Me</button> 

			// <script>
			

			// function move() {
			//   var elem = document.getElementById('myBar');   
			//   var width = 10;
			//   var id = setInterval(frame, 10);
			//   function frame() {
			//     if (width >= 100) {
			//       clearInterval(id);
			//     } else {
			//       width++; 
			//       elem.style.width = width + '%'; 
			//       elem.innerHTML = width * 1  + '%';
			//     }
			//   }
			// }
			// </script>
			
			// ";
	}

	public function processExcel(){



		$this->load->library('PHPexcel');
		$this->load->library('upload'); 


		$fileName = time() . $_FILES['fileImport']['name'];                     // Sesuai dengan nama Tag Input/Upload
        $config['upload_path'] = (FCPATH.'upload/');                                // Buat folder dengan nama "fileExcel" di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('fileImport'))
        {
            echo $this->upload->display_errors();
        }else{

        $media = $this->upload->data('fileImport');
        $inputFileName = './fileExcel/' . $media['file_name'];



		$file=(FCPATH.'upload/'.str_replace(" ","_",$fileName));
		
		$excelReader = PHPExcel_IOFactory::createReaderForFile($file);
		$excelReader->setReadDataOnly(true);
		$objXLS = $excelReader->load($file);


		$worksheet = $objXLS->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
		
		// echo "<table>";
		// $this->progress();
		for ($row = 2; $row <= $lastRow; $row++) {
			$data=array('idDataTraining'=>null,
						// 'createdAt'=> date_format(date_create($worksheet->getCell('A'.$row)->getValue()),"Y-m-d H:i:s"),
						'createdAt' =>$worksheet->getCell('A'.$row)->getValue(),
						'username'=>$worksheet->getCell('B'.$row)->getValue(),
						'tweet'=>$worksheet->getCell('C'.$row)->getValue(),
						'label'=>$worksheet->getCell('D'.$row)->getValue(),);
			$this->db->insert('datatraining',$data);

			 // echo "<tr><td>";
			 // echo $worksheet->getCell('A'.$row)->getValue();
			 // echo "</td><td>";
			 // echo $worksheet->getCell('B'.$row)->getValue();
			 // echo "</td><td>";
			 // echo $worksheet->getCell('C'.$row)->getValue();
			 // echo "</td><td>";
			 // echo $worksheet->getCell('D'.$row)->getValue();
			 // echo "</td><tr>";
		}
		// echo "</table>";	

		}
		redirect('DataTraining/viewTraining','refresh');
	}

	public function viewTraining(){
		$value["getStemm"]=$this->m_datatraining->getStemm();
				// $value["getStemm"][0]->stemm;
		$this->session->set_userdata('getStemm', $value["getStemm"][0]->stemm);


		$value["data"]=$this->m_datatraining->all();

		$data['title'] = 'Data Training';
		$data['header'] = '';
		$data['content'] = $this->load->view('v_datatraining', $value, true);
		$data['script'] = '';
		$this->template($data);

	}

	public function insertlabel($id,$label){
		$this->m_datatraining->updateDataTraining($id,$label);
		redirect('datatraining/viewtraining');
	}

	public function testStemming(){

			$stopwords = $this->load->file("./stopwords.txt", TRUE);
			$stopwordsList = explode("\n", $stopwords);
			$stopwordsListNoSpace =preg_replace("/\s+/",'',$stopwordsList);
			echo in_array("nya",$stopwordsListNoSpace);
			// $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
			// $stemmer  = $stemmerFactory->createStemmer();
			// echo $stemmer->stem("Apresiasi Tinggi untuk #PTKAI #INKA gerbong harina nya baru sabi nyaman bot kaya di pesawat");
	}
	
	public function processstimming(){
			$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
			$stemmer  = $stemmerFactory->createStemmer();
				
			$data=$this->m_datatraining->datatraining();

			$stopwords = $this->load->file("./stopwords.txt", TRUE);
			$stopwordsList = explode("\n", $stopwords);
			$stopwordsListNoSpace =preg_replace("/\s+/",'',$stopwordsList);


			
			$clearTweet="";
			foreach ($data as $dataTraining ) {				
			
			$txt=$this->cleaningtweet($dataTraining->tweet);

				foreach ($txt['terms'] as $val) {
					if(!$stemmer->stem($val)==""){
						if (!in_array($stemmer->stem($val),$stopwordsListNoSpace)) {
							 
							 $clearTweet= $clearTweet.$stemmer->stem($val).' ';
						}else{
							// $indexArray--;
							// echo "(".$stemmer->stem($val)." = stopwords ) | ";
							// echo $indexArray;
						}	
					}
				}
				
				$dataStemm=array('idDataStemming'=>null,'idDataTraining'=>$dataTraining->idDataTraining,'tweet'=>$clearTweet);
				$this->m_datatraining->insertDataStemming($dataStemm);
				$this->m_datatraining->updateDataTrainingStemming($dataTraining->idDataTraining);
				$clearTweet="";
				echo "<br>";
			}

			$this->processfeatures();
			$this->processchisquare();
			$this->processnaivebayes();
			redirect('DataTraining/viewStemming');							

	}

	public function viewStemming(){
				$value["data"]=$this->m_datatraining->allDataStemming();
				$value["getStemm"]=$this->m_datatraining->getStemm();
				$value["getAllStemm"]=$this->m_datatraining->getCountDocStemm();
				
				$this->session->set_userdata('getStemm', $value["getStemm"][0]->stemm);
				$data['title'] = 'Data Stemming';
				$data['header'] = '';
				$data['content'] = $this->load->view('v_datastemming', $value, true);
				$data['script'] = '';
				$this->template($data);

				
				

			
	}
	// public function process
	// if($this->input->post('submit')){
					 
	// 					$this->processstimming();
									
					
	// }

	public function processchisquare(){
		$this->load->model('m_chisquare');
	 	$this->m_chisquare->truncateCorpus();
		$Qterm= $this->db->query("select * from datafeature")->result();
		$value['data']= array();
		$i=1;
		$y=1;
		$hasil = array();	
		foreach ($Qterm as $value) {
					$result = $this->counting_chi($i,$value->feature,$value->label);
			 // echo $i.' - '.$result.'<br>';
				if($result >= 2.71 ){
					$data=array('idDataCorpus' =>null ,'idDataFeature'=>$value->idDataFeature,'feature'=>$value->feature,'valueChiSquare'=>$result);
					// echo $y++.' - '.$data['feature'].' - '. $data['label'] .' '.$data['valueChiSquare'].'<br>';
				// 	// array_push($hasil,$data); 
				// 	// echo $data;

					$this->m_chisquare->insertCorpus($data);
				}
			$i++;
		}
		
		// redirect('NaiveBayes/processnaivebayes');	
	}

	public function processnaivebayes()
	{
 		$this->db->truncate('datanb'); 

		$db= $this->db->query("select dc.idDataCorpus as id,dc.feature,df.frequency,df.label from datacorpus dc join dataFeature df on dc.idDataFeature=df.idDataFeature ")->result();
		

		// echo "<br>";
		$V =  $this->db->query("select count(DISTINCT feature) as count from datacorpus")->result();
		// print_r($V[0]->count);
		$i=1;
		foreach ($db as $value) {

			// $nc = $this->db->query("select count(df.frequency) as count from datacorpus dc join dataFeature df on dc.idDataFeature=df.idDataFeature where df.label='".$value->label."' ")->result();

			$nc = $this->db->query("select sum(df.frequency) as count from datacorpus dc join dataFeature df on dc.idDataFeature=df.idDataFeature where df.label='".$value->label."' ")->result();
			$nbValue=(($value->frequency+1)/($nc[0]->count+$V[0]->count));

			echo $i.' '.$value->feature.' '. $value->label .' | Tct=' .$value->frequency.' | λ = 1'.' | Nc = '.$nc[0]->count.' | V='.$V[0]->count.' Probability = '.$nbValue.'</br>';
			$i++;

			$data=array('id'=>null,
				// 'feature'=>$value->feature,
				// 'frequency'=>$value->frequency,'label'=>$value->label,
				
				'naivebayesvalue'=>$nbValue,'idDataCorpus'=>$value->id);
			$this->db->insert('datanb',$data);
		}

		// $this->viewStemming();

		redirect('DataTraining/viewTraining');		
	}

	public function countA($label,$terms){
		$A=$this->db->query("select dt.label,ds.tweet from datastemming ds join datatraining dt on ds.idDataTraining =dt.idDataTraining where dt.label='$label'")->result();
		$ATweet="";
		$countTotalA=0;
		foreach ($A as $values) {
			// echo $values->tweet.'<br>';
			$count=0;
			$AWords = explode(" ", $values->tweet);

			if(in_array($terms,$AWords)){
				$countTotalA +=1;
			}
		}
		return $countTotalA;

	}

	public function countB($label,$terms){
		$B=$this->db->query("select dt.label,ds.tweet from datastemming ds join datatraining dt on ds.idDataTraining =dt.idDataTraining where dt.label !='$label'")->result();
		$BTweet="";
		$countTotalB=0;
		foreach ($B as $values) {
			// echo $values->tweet.'<br>';
			$count=0;
			$BWords = explode(" ", $values->tweet);
			for ($i=0; $i < count($BWords) ; $i++) { 
				if($BWords[$i]==$terms){
					$count	++;
				}
			}
			if($count>0){
				// $count=1;
				$countTotalB +=1;
			}

		}
		return $countTotalB;

	}

	public function countC($label,$terms){
			$C=$this->db->query("select dt.label,ds.tweet from datastemming ds join datatraining dt on ds.idDataTraining =dt.idDataTraining where dt.label='$label'")->result();
			$CTweet="";
			$countTotalC=0;
			foreach ($C as $values) {
				// echo $values->tweet.'<br>';
				$count=0;
				$CWords = explode(" ", $values->tweet);

				if(!in_array($terms,$CWords)){
					$countTotalC +=1;
				}
			}
			return $countTotalC;

		}
	public function countD($label,$terms){
		$D=$this->db->query("select dt.label,ds.tweet from datastemming ds join datatraining dt on ds.idDataTraining =dt.idDataTraining where dt.label !='$label'")->result();
		$DTweet="";
		$countTotalD=0;
		foreach ($D as $values) {
			// echo $values->tweet.'<br>';
			$count=0;
			$DWords = explode(" ", $values->tweet);

			if(!in_array($terms,$DWords)){
				$countTotalD +=1;
			}
		}
		return $countTotalD;

	}
	public function counting_chi($no,$term,$label){
		//pengaruh

		// $A = $this->countA($label,$term);

		
		
		// $A= $this->db->query("select frequency as A from datafeature where label='".$label."' and feature='".$term."' ")->result();
		// echo $label.' '.$term;
		
		// $A = $this->countA($label,$term);		

		// $C = $this->countC($label,$term);

		// $D = $this->countD($label,$term);

		// $B = $this->countB($label,$term);

		$A= $this->db->query("select count(*) as A from datastemming ds join datatraining dt on ds.idDataTraining =dt.idDataTraining where dt.label='".$label."' and ds.tweet like '% ".$term."%' or  ds.tweet like '%".$term." %' ")->result();

		$C= $this->db->query("select count(*) as C from datastemming ds join datatraining dt on ds.idDataTraining =dt.idDataTraining where dt.label ='".$label."' and ds.tweet not in(select tweet from datastemming where tweet like '% ".$term."%' or ds.tweet like '%".$term." %') ")->result();

		$D= $this->db->query("select count(*) as D from datastemming ds join datatraining dt on ds.idDataTraining =dt.idDataTraining where  dt.label !='".$label."' and ds.tweet not in(select tweet from datastemming where tweet like '% ".$term."%' or tweet like '%".$term." %') ")->result();

		$B= $this->db->query("select count(*) as B from datastemming ds join datatraining dt on ds.idDataTraining =dt.idDataTraining where dt.label !='".$label."' and ds.tweet in(select tweet from datastemming where tweet like '% ".$term."%' or tweet like '%".$term." %') ")->result();


		// $B = $this->countB($label,$term);
		// print_r($B);
		// $D= $this->db->query("select count(*) as D from datastemming where label !='".$label."'  and tweet not in(select tweet from datastemming where tweet like ' ".$term."' or tweet like '".$term." ') ")->result();
			
		//pengaruh
		

		// $B= $this->db->query("SELECT count(*) as B FROM datastemming WHERE label !='".$label."' and tweet REGEXP '[[:<:]]".$term."[[:>:]]'")->result();
			
		$N= $this->db->query("select count(*) as N from datastemming")->result();
		
		// echo $no." Term=>".$term.", Label=>".$label;
		// echo "| A = ".$A;
		// echo "| D = ".$D;
		// echo "| C = ".$C;
		// // echo "| B = ".$B[0]->B;
		// echo "| B = ".$B;
		// echo "| N = ".$N[0]->N;
		
		
		// echo "| X^2 = ". $result=($N[0]->N * pow(($A[0]->A*$D[0]->D -$C[0]->C*$B[0]->B),2))/(($A[0]->A+$C[0]->C)*($B[0]->B+$D[0]->D)*($A[0]->A+$B[0]->B)*($C[0]->C+$D[0]->D));
		// echo "</br>";

		$result=($N[0]->N * pow(($A[0]->A*$D[0]->D -$C[0]->C*$B[0]->B),2))/(($A[0]->A+$C[0]->C)*($B[0]->B+$D[0]->D)*($A[0]->A+$B[0]->B)*($C[0]->C+$D[0]->D));


		// echo "| X^2 = ". $result=($N[0]->N * pow(($A*$D -$C*$B),2))/(($A+$C)*($B+$D)*($A+$B)*($C+$D));
		// echo "</br>";
		
		// $result=($N[0]->N * pow(($A*$D -$C*$B),2))/(($A+$C)*($B+$D)*($A+$B)*($C+$D));

		return $result;
	}
	public function lower(){
		echo trim(strtolower('Pertama kalinya naik kereta ekonomi antarkota. Nyaman.  Makananya enak sekali. #ptkai @PTKAI'));
	}

	public function cleaningtweet($tweet){

			$tweet_no_RT=preg_replace('/RT/', " ", $tweet);
			$tweet_lower= trim(strtolower($tweet_no_RT));
			$tweet_no_enter = str_replace("\n", " ",$tweet_lower);
			$tweet_no_tab = str_replace('/\s+/', " ", $tweet_no_enter);
			$tweet_no_enter_no_scolon = str_replace(",", " ",$tweet_no_tab);
			$tweet_no_username=preg_replace('/@\w+/', " ", $tweet_no_enter_no_scolon);
			$tweet_no_hastag = preg_replace('/(?:#\s*[\w\d]+|@\s*[\w\d]+)/', " ", $tweet_no_username); 
			$tweet_no_https= preg_replace('/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/', " ", $tweet_no_hastag);
			
			$tweet_no_number =preg_replace('/ ?\b[^ ]*[0-9][^ ]*\b/i', " ", $tweet_no_https);
			$tweet_clear = preg_replace('/[^a-zA-Z0-9 ]/', " ", $tweet_no_number);
			// return $tweet_clear;

			$jumlah = str_word_count($tweet_clear);        
			$terms = explode(" ", $tweet_clear);
			

			return array('terms'=>$terms,'jml'=>$jumlah);
	}

		public function processfeatures(){


					$label = array("positif", "negatif", "netral");

					for ($iLabel=0; $iLabel < count($label) ; $iLabel++) { 
							
						
					$dataStemming= $this->m_datatraining->allDataStemmingByLabel($label[$iLabel]);
					$stemmArray=array();
					$idStemming=array();

					$y=0;
					$id=0;
						foreach ($dataStemming as $value) {
							// echo $value['idDataStemming'].'|';

							$tweet = explode(" ", $value['tweet']);
							for ($i=0; $i < count($tweet); $i++) { 
								$stemmArray[$y]=$tweet[$i];
								$y++;			
							}
						$id++;
						}
						// echo str_word_count($dataStemming[0]['tweet']);
						 
						 $d = array_count_values($stemmArray);
						 foreach ($d as $key => $frequency) {
						 	if($key !=''){
						 		// echo '('.$key.'='.$frequency.')';
						 		// echo $label[$iLabel];
						 		// echo '<br>';

						 		$datafeatures=array('idDataFeature'=>null,'feature'=>$key,'frequency'=>$frequency,'label'=>$label[$iLabel]

						 			);
						 		$this->m_datatraining->insertDataFeature($datafeatures);
						 	}

						 }
						}
						// $datafeatures=array('id'=>null,'feature'=>'minangkabau','frequency'=>2,'label'=>'positif');
						// $this->m_datatraining->insertDataFeature($datafeatures);

						
					}

		public function viewDataFeature(){
			
			$value["data"]=$this->m_datatraining->allDataFeature();

			$data['title'] = 'Data feature';
			$data['header'] = '';
			$data['content'] = $this->load->view('v_datafeature', $value, true);
			$data['script'] = '';
			$this->template($data);

		}



}

/* End of file datalearing */
/* Location: ./application/controllers/datalearing */