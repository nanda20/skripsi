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

	//tambah data training
	public function tambahdataexcel(){
		
		$data['title'] = 'Tambah Data';
		$data['header'] = '';
		$data['script'] = '';
		$data['content'] = $this->load->view('v_datatrainingtambah','', true);
		$this->template($data);
		
	}

	public function viewtraining(){
		
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
				$clearTweet="";
				echo "<br>";
			}
	}

	public function viewstemming(){
				$value["data"]=$this->m_datatraining->allDataStemming();

				$data['title'] = 'Data Stemming';
				$data['header'] = '';
				$data['content'] = $this->load->view('v_datastemming', $value, true);
				$data['script'] = '';
				$this->template($data);
			
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

	public function datafeatures(){


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