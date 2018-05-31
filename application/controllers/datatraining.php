<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class datatraining extends CI_Controller {

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
	public function viewaddexcel(){
		
		$data['title'] = 'Tambah Data';
		$data['header'] = '';
		$data['script'] = '';
		$data['content'] = $this->load->view('v_datatrainingtambah','', true);
		$this->template($data);



		
	}

	public function progress(){

		$this->load->helper('url');
		$this->load->library('session');
		$this->config->item('base_url');
		$this->load->library('chisquare');
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

	public function processexcel(){



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
			$data=array('id'=>null,
						'createdAt'=> date_format(date_create($worksheet->getCell('A'.$row)->getValue()),"Y-m-d H:i:s"),
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
		redirect('datatraining/viewtraining','refresh');
	}

	public function viewtraining(){
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
				
				$dataStemm=array('id'=>null,'username'=>$dataTraining->username,'tweet'=>$clearTweet,'label'=>$dataTraining->label);
				$this->m_datatraining->insertDataStemming($dataStemm);
				$this->m_datatraining->updateDataTrainingStemming($dataTraining->id);
				$clearTweet="";
				echo "<br>";
			}

			$this->processfeatures();
			redirect('datatraining/viewstemming');							

	}

	public function viewstemming(){
				$value["data"]=$this->m_datatraining->allDataStemming();
				$value["getStemm"]=$this->m_datatraining->getStemm();
				$value["getAllStemm"]=$this->m_datatraining->getCountDocStemm();
				
				$this->session->set_userdata('getStemm', $value["getStemm"][0]->stemm);
				$data['title'] = 'Data Stemming';
				$data['header'] = '';
				$data['content'] = $this->load->view('v_datastemming', $value, true);
				$data['script'] = '';
				$this->template($data);

				
				if($this->input->post('submit')){
					 
					//  echo '
					// 	  <!-- Modal -->
					// 	  <div class="modal fade" id="myModal" role="dialog">
					// 	    <div class="modal-dialog">
						    
					// 	      <!-- Modal content-->
					// 	      <div class="modal-content">
					// 	        <div class="modal-header">
					// 	          <button type="button" class="close" data-dismiss="modal">&times;</button>
					// 	          <h4 class="modal-title">Modal Header</h4>
					// 	        </div>
					// 	        <div class="modal-body">
					// 	          <p>Some text in the modal.</p>
					// 	        </div>
					// 	        <div class="modal-footer">
					// 	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					// 	        </div>
					// 	      </div>
						      
					// 	    </div>
					// 	  </div>
					// ';
					$this->processstimming();
					
				}

			
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

					$y=0;
						foreach ($dataStemming as $value) {
							
							$tweet = explode(" ", $value['tweet']);
							for ($i=0; $i < count($tweet); $i++) { 
								$stemmArray[$y]=$tweet[$i];
								$y++;			
							}

						}
						// echo str_word_count($dataStemming[0]['tweet']);
						 
						 $d = array_count_values($stemmArray);
						 foreach ($d as $key => $frequency) {
						 	if($key !=''){
						 		// echo '('.$key.'='.$frequency.')';
						 		// echo $label[$iLabel];

						 		$datafeatures=array('id'=>null,'feature'=>$key,'frequency'=>$frequency,'label'=>$label[$iLabel]);
						 		$this->m_datatraining->insertDataFeature($datafeatures);
						 	}

						 }

						
						}
						// $datafeatures=array('id'=>null,'feature'=>'minangkabau','frequency'=>2,'label'=>'positif');
						// $this->m_datatraining->insertDataFeature($datafeatures);

					}

		public function viewdatafeature(){
			
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