<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NaiveBayes extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$path= __DIR__;
		$new_path= dirname($path,2);

		require_once $new_path.'/vendor/autoload.php';
	}
	public function index(){
		echo date('Y-m-d',strtotime ( '-1 day' , strtotime ( '2018-06-07')));
	}


	// public function a(){
	// 	$a=array("Volvo"=>"XC90","BMW"=>"X5","Toyota"=>"Highlander");
	// 	print_r(array_keys($a));

	// }

	public function usertweet(){
		$path= __DIR__;
		$new_path= dirname($path,2);
		$new_path=$new_path.'/assets/apitweet/twitteroauth/twitteroauth.php';
		include $new_path;

		$consumer_key = "IFXUNen9qtV85aRg5EsS5Q7Bq";
		$consumer_secret = "g9xSydGPC8Ab0FjdU7Orp2vpeDWNnQZVfEojhHWWCO8TKdy76N";
		$access_token = "325528356-d5rkNNGv1nhJg09SaUZfZYmrEdOtoEyYjJCVaI8l";
		$access_token_secret = "5b28o3rPpvOPmZOcgi87AdAcCUvLGca8gK1vQ0SPoeY6Y";

		$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

		$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=ptkai&result_type=recent&count=100&tweet_mode=extended&result_type=recent&retweeted_status=full_text');

		// ------------------------------------------------------------------------------------------
		// naive bayes klasifikasi

		// $Queryprob=$this->db->query("SELECT (SELECT count(*) FROM `datastemming` WHERE label='positif') as sumPositif ,(SELECT count(*) FROM `datastemming` WHERE label='negatif')as sumNegatif ,(SELECT count(*)  FROM `datastemming` WHERE label='netral')as sumNetral")->result_array();
			

		$Queryprob=$this->db->query("SELECT (SELECT count(*) FROM `datastemming` ds join 	datatraining dt on ds.idDataTraining =dt.idDataTraining  WHERE dt.label='positif') as sumPositif ,(SELECT count(*) FROM `datastemming` ds join datatraining dt on ds.idDataTraining =dt.idDataTraining WHERE dt.label='negatif')as sumNegatif ,(SELECT count(*)  FROM `datastemming` ds join datatraining dt on ds.idDataTraining =dt.idDataTraining WHERE dt.label='netral')as sumNetral")->result_array();

			$V=$Queryprob[0]['sumPositif']+$Queryprob[0]['sumNegatif']+$Queryprob[0]['sumNetral'];
			$prob=array	($Queryprob[0]['sumPositif']/$V,$Queryprob[0]['sumNegatif']/$V,$Queryprob[0]['sumNetral']/$V);
						
			 $i=0;

			 $VQuery =  $this->db->query("select count(DISTINCT feature) as count from datacorpus")->result_array();


	
			$this->load->model('m_user');
			
			$hasil =array();
			$tweetmp="";
			if($tweets !=null){
			foreach ($tweets->statuses as $tweet)  {
				$timeTweet=date_format(date_create($tweet->created_at),"Y-m-d H:i:s");
				if(date_format(date_create($tweet->created_at),"Y-m-d") == date("Y-m-d")){ 

						if($tweet->retweet_count>0 && isset($tweet->retweeted_status)){
			     			$tweetmp= $tweet->retweeted_status->full_text;
			      		 }else{
			      			$tweetmp = $tweet->full_text;
			      		}

			      		if(!(strstr($tweetmp,"I'm") || strstr($tweetmp,"At"))){
			      			
			           $d=$this->m_user->cekDataTweet($timeTweet,$tweet->user->screen_name);
			           // print_r($d[0]->jml);
			      			// if(count($this->m_user->cekDataTweet($timeTweet,$tweet->user->screen_name))==0){
			      		      		
								// echo '['.$i.'] '.$value->tweet.'</br>';
								 $hasilNB = $this->processtesting($tweetmp,$prob,$VQuery,"datanb");

								 	$hasil[$i] = array("tweet"=>$tweetmp,
								 			"username"=>$tweet->user->screen_name,
								 			 "created_at"=>$timeTweet,
											  "nilaiPositif"=>$hasilNB['nilai'][0],
											  "nilaiNegatif"=>$hasilNB['nilai'][1],
											  "nilaiNetral"=>$hasilNB['nilai'][2],
											  "label"=>$hasilNB['label'][array_search(max($hasilNB['nilai']),$hasilNB['nilai'])],
											  "nilaiNB"=>max($hasilNB['nilai'])
											);
								 	if($d[0]->jml==0)
								 		{
									 		$this->m_user->insert($hasil[$i]);
								 		}
								 
								 // print_r($hasil[$i]);
								 // echo "<br>";
								$i++;
							// }
						}
				}
				

			}

			}else{
				echo "Pastikan Terkoneksi Dengan Internet";
			}

			$valueData['hasil'] = $hasil;
			// print_r($valueData['hasil']);
			// $data['title'] = 'Testing Tweet';
			// $data['header'] = '';
			// $this->load->view('template/header',$data);
			$this->load->view('v_user_header');
			$this->load->view('v_user_classification', $valueData, false);
			$this->load->view('v_user_footer');
		
			// $data['script'] = '';
			// $this->template($data);
		// ------------------------------------------------------------------------------------------

		//  $data=array();

		// $i=0;
		// 	// echo $tweets->statuses[0]->text;
		// 	foreach ($tweets->statuses as $tweet) { 
			    
			   
	 
		// 	    if(date_format(date_create($tweet->created_at),"Y-m-d") == date("Y-m-d")){ 

		// 	     // echo($i+1); 
		// 	     echo $tweet->user->screen_name.' | '; 
		// 	      echo date_format(date_create($tweet->created_at),"Y-m-d H:i:s").' | '; 
		// 	      		if($tweet->retweet_count>0){
		// 	     			echo $tweet->retweeted_status->full_text.' | ';
		// 	      		 }else{
		// 	      			echo $tweet->full_text.'| ';
		// 	      		}
			    
		// 	    $i++;
		// 	    echo "<br>";
		// 		}
	
	}

	

	public function template($data)
		{
			$this->load->view('template/header', $data);
			$this->load->view('template/left');
			$this->load->view('template/content');
			$this->load->view('template/footer');
		}
	public function viewNaiveBayes(){
			$this->load->model('m_naivebayes');
			$data['title'] = 'Data Naive Bayes';
			$data['header'] = '';
			$data['script'] = '';
			$value["data"]=$this->m_naivebayes->getAll();
			
			// $this->load->view('v_user_header');
			$data['content'] = $this->load->view('v_datanb', $value, true);

			$this->template($data);


	}

	public function viewAddExcel(){

	$data['title'] = 'Tambah Data';
		$data['header'] = '';
		$data['script'] = '';
		$data['content'] = $this->load->view('v_datatestingimport','', true);
		$this->template($data);
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
			$data=array('id'=>null,
						'username'=>$worksheet->getCell('A'.$row)->getValue(),
						'tweet'=>$worksheet->getCell('B'.$row)->getValue(),
						'labelManual'=>$worksheet->getCell('C'.$row)->getValue(),);
			$this->db->insert('datatesting',$data);

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
		redirect('NaiveBayes/viewTesting','refresh');
	}
	public function viewTesting(){
		 	// error_reporting(E_ALL ^ E_NOTICE);

			// $Queryprob=$this->db->query("SELECT (SELECT count(*) FROM `datastemming` WHERE label='positif') as sumPositif ,(SELECT count(*) FROM `datastemming` WHERE label='negatif')as sumNegatif ,(SELECT count(*)  FROM `datastemming` WHERE label='netral')as sumNetral")->result_array();

		$Queryprob=$this->db->query("SELECT (SELECT count(*) FROM `datastemming` ds join 	datatraining dt on ds.idDataTraining =dt.idDataTraining  WHERE dt.label='positif') as sumPositif ,(SELECT count(*) FROM `datastemming` ds join datatraining dt on ds.idDataTraining =dt.idDataTraining WHERE dt.label='negatif')as sumNegatif ,(SELECT count(*)  FROM `datastemming` ds join datatraining dt on ds.idDataTraining =dt.idDataTraining WHERE dt.label='netral')as sumNetral")->result_array();
			
			

			$V=$Queryprob[0]['sumPositif']+$Queryprob[0]['sumNegatif']+$Queryprob[0]['sumNetral'];
			if($Queryprob[0]['sumPositif']>0 && $Queryprob[0]['sumNegatif']>0 && $Queryprob[0]['sumNetral']>0){
			$prob=array	($Queryprob[0]['sumPositif']/$V,$Queryprob[0]['sumNegatif']/$V,$Queryprob[0]['sumNetral']/$V);
						
			 $i=0;

			 $VQuery =  $this->db->query("select count(DISTINCT feature) as count from datacorpus")->result_array();

			$tweetQuery =  $this->db->query("select *  from datatesting")->result();
			$this->load->model('m_naivebayes');
			$hasil =array();
			$jmlLabelCocok=0;
			foreach ($tweetQuery as $value)  {

				$hasilNB = $this->processtesting($value->tweet,$prob,$VQuery,"datanb");
				
				$hasil[$i] = array(
							"id"=>$value->id,
							"tweet"=>$value->tweet,
							  "nilai"=>$hasilNB['nilai'],
							  "labelMax"=>$hasilNB['label'][array_search(max($hasilNB['nilai']),$hasilNB['nilai'])],
							  "nilaiMax"=>max($hasilNB['nilai']),
							  "labelManual"=>$value->labelManual
							);
				// print_r($hasil[$i]);

				if($hasil[$i]['labelMax']==$hasil[$i]['labelManual']){
					$jmlLabelCocok +=1;
				}

				$this->m_naivebayes->updateDataTraining($hasil[$i]);
				
				$i++;
			}
				$akurasi=0;		
			if(count($tweetQuery) <= 0){
				$akurasi="-";
			}else{
				$akurasi=($jmlLabelCocok/$i)*100;
			}

			}else{
				$akurasi="";
				$hasil = array();

			}
			$valueData['akurasi'] =$akurasi;
			
			$this->load->model('m_home');
			$qDataLog= $this->m_home->getLog();
			// print_r($qDataLog['docPositif'][0]['docPositif']);
			// echo $qDataLog['docPositif'];

			$dataLog= array(
				'id'=>null,
				'docPositif'=>$qDataLog['docPositif'][0]['docPositif'],
				'docNegatif'=>$qDataLog['docNegatif'][0]['docNegatif'],
				'docNetral'=>$qDataLog['docNetral'][0]['docNetral'],
				'docNaiveBayes'=>$qDataLog['docNaiveBayes'][0]['docNaiveBayes'],
				'docFeature'=>$qDataLog['docFeature'][0]['docFeature'],
				'docDataUji'=>$qDataLog['docDataUji'][0]['docDataUji'],
				'akurasi'=>$akurasi,
				'dateTime'=>date("Y-m-d H:i:s")
				);
			$this->db->insert('log',$dataLog);
			$valueData['hasil'] = $hasil;
			$data['title'] = 'Testing Tweet';
			$data['header'] = '';
			$data['content'] = $this->load->view('v_testing', $valueData, true);
			$data['script'] = '';
			
			$this->template($data);
			

	
	}

 	public function viewCompare(){
 		
			$Queryprob=$this->db->query("SELECT (SELECT count(*) FROM `datastemming` ds join 	datatraining dt on ds.idDataTraining =dt.idDataTraining  WHERE dt.label='positif') as sumPositif ,(SELECT count(*) FROM `datastemming` ds join datatraining dt on ds.idDataTraining =dt.idDataTraining WHERE dt.label='negatif')as sumNegatif ,(SELECT count(*)  FROM `datastemming` ds join datatraining dt on ds.idDataTraining =dt.idDataTraining WHERE dt.label='netral')as sumNetral")->result_array();
			
			

			$V=$Queryprob[0]['sumPositif']+$Queryprob[0]['sumNegatif']+$Queryprob[0]['sumNetral'];
			if($Queryprob[0]['sumPositif']>0 && $Queryprob[0]['sumNegatif']>0 && $Queryprob[0]['sumNetral']>0){
			$prob=array	($Queryprob[0]['sumPositif']/$V,$Queryprob[0]['sumNegatif']/$V,$Queryprob[0]['sumNetral']/$V);
						
			

			 $VQuery =  $this->db->query("select count(DISTINCT feature) as count from datacorpus")->result_array();

			$tweetQuery =  $this->db->query("select *  from datatesting")->result();
			$this->load->model('m_naivebayes');
			// $hasilDenganNB =array();
			// $hasilTanpaSeleksiCS =array();
			$hasil=array();
			$akurasiTanpaCS=0;
			$akurasiDenganCS=0;
						//------------------- Perhitungan Tanpa Seleksi Feature
 			
 			$i=0;
			foreach ($tweetQuery as $value)  {

				$Q1 = $this->processtesting($value->tweet,$prob,$VQuery,"dataFeature");
				$Q2 = $this->processtesting($value->tweet,$prob,$VQuery,"datanb");

				$hasil[$i]=array(
						"id"=>$value->id,
						"tweet"=>$value->tweet,
						"labelTanpaCS"=>$Q1['label'][array_search(max($Q1['nilai']),$Q1['nilai'])],
						"labelDenganCS"=>$Q2['label'][array_search(max($Q2['nilai']),$Q2['nilai'])],
						"labelManual"=>$value->labelManual
					);
				if($hasil[$i]['labelTanpaCS']==$hasil[$i]['labelManual']){
					$akurasiTanpaCS+=1;
				}
				if($hasil[$i]['labelDenganCS']==$hasil[$i]['labelManual']){
					$akurasiDenganCS+=1;
				}
				$i++;

		}
				// $hasilTanpaSeleksiCS[$i] = array(
				// 			"id"=>$value->id,
				// 			"tweet"=>$value->tweet,
				// 			  "nilai"=>$Q1['nilai'],
				// 			  "labelMax"=>$Q1['label'][array_search(max($Q1['nilai']),$Q1['nilai'])],
				// 			  "nilaiMax"=>max($Q1['nilai']),
				// 			  "labelManual"=>$value->labelManual
				// 			);
					

				
				
				// $hasilDenganNB[$i] = array(
				// 			"id"=>$value->id,
				// 			"tweet"=>$value->tweet,
				// 			  "nilai"=>$Q2['nilai'],
				// 			  "labelMax"=>$Q2['label'][array_search(max($Q2['nilai']),$Q2['nilai'])],
				// 			  "nilaiMax"=>max($Q2['nilai']),
				// 			  "labelManual"=>$value->labelManual
				// 			);

				// if($hasilDenganNB[$i]['labelMax']==$hasilDenganNB[$i]['labelManual']){
				// 	$jmlLabelCocok +=1;
				// }
				// $this->m_naivebayes->updateDataTraining($hasilDenganNB[$i]);
				
				
			



					// 	$akurasi=0;		
					// if(count($tweetQuery) <= 0){
					// 	$akurasi="-";
					// }else{
					// 	$akurasi=($jmlLabelCocok/$i)*100;
					// }

					// }else{
					// 	$akurasi="";
					// 	$hasil = array();

					// }
			$valueData['akurasiTanpaCS'] = ($akurasiTanpaCS/$i) *100;
			$valueData['total'] =$i;
			$valueData['akurasiDenganCS'] = ($akurasiDenganCS /$i) *100;
					
			// $this->load->model('m_home');
			// $qDataLog= $this->m_home->getLog();
					// print_r($qDataLog['docPositif'][0]['docPositif']);
					// echo $qDataLog['docPositif'];

			// $dataLog= array(
			// 	'id'=>null,
			// 	'docPositif'=>$qDataLog['docPositif'][0]['docPositif'],
			// 	'docNegatif'=>$qDataLog['docNegatif'][0]['docNegatif'],
			// 	'docNetral'=>$qDataLog['docNetral'][0]['docNetral'],
			// 	'docNaiveBayes'=>$qDataLog['docNaiveBayes'][0]['docNaiveBayes'],
			// 	'docFeature'=>$qDataLog['docFeature'][0]['docFeature'],
			// 	'docDataUji'=>$qDataLog['docDataUji'][0]['docDataUji'],
			// 	'akurasi'=>$akurasi,
			// 	'dateTime'=>date("Y-m-d H:i:s")
			// 	);
			// $this->db->insert('log',$dataLog);
			$valueData['hasil'] = $hasil;
			$data['title'] = 'Testing Tweet';
			$data['header'] = '';
			$data['content'] = $this->load->view('v_compare', $valueData, true);
			$data['script'] = '';
			$this->template($data);
			

 	}
 }

	public function	clean(){
		$tweet ="I'm at Stasiun Maos - @ptkai in Cilacap, Jawa Tengah https://t.co/VA1m9BqUfB";
		 $clcn=$this->cleaningtweet($tweet);
		 

		 foreach ($clcn['terms'] as $value) {
		 	echo $value.' ';
		 }
	}

	public function cobaStemm(){
		$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
		$stemmer  = $stemmerFactory->createStemmer();
		$stopwords = $this->load->file("./stopwords.txt", TRUE);
		$stopwordsList = explode("\n", $stopwords);
		$stopwordsListNoSpace =preg_replace("/\s+/",'',$stopwordsList);
		$sentence="Pertama kalinya naik kereta ekonomi antarkota. Nyaman.  Makananya enak. #ptkai @PTKAI";

		echo $stemmer->stem('makananya').'<br>';
		$clcn=$this->cleaningtweet($sentence);

		foreach ($clcn['terms'] as $terms ) {
					// echo empty($terms);
					if (!in_array($stemmer->stem($terms),$stopwordsListNoSpace) && !empty($terms) ) {

						 echo $stemmer->stem($terms).'|';
						}

		}
	}
	public function processtesting($tweet,$probC,$VQuery,$set){

	        $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
			$stemmer  = $stemmerFactory->createStemmer();

	 

			$stopwords = $this->load->file("./stopwords.txt", TRUE);
			$stopwordsList = explode("\n", $stopwords);
			$stopwordsListNoSpace =preg_replace("/\s+/",'',$stopwordsList);

			$clcn=$this->cleaningtweet($tweet);
			
			

			// print_r($probC);

			// print_r($Queryprob[0]['sumPositif']);


			// $probC=array(0.356481481,0.277777778,0.365740741);
			$Alabel=array('positif','negatif','netral');
			$hasilNB=array();
			
			$AAlabel=array();
			$Anilai=array();
			$tc=0;
			$i=0;
			$nb=1;
			// $set="datanb";
			foreach ($Alabel as $label) {
				$ncQuery='';
				if($set=='datanb'){
					$ncQuery = $this->db->query("select sum(df.frequency) as countAll from datacorpus dc join datafeature df on dc.idDataFeature=df.idDataFeature where df.label='".$label."'")->result_array();
				}else{
					$ncQuery = $this->db->query("select sum(frequency) as countAll from datafeature where label='".$label."'")->result_array();
				}
				

			 
				$nc =$ncQuery[0]['countAll'];
				$V=$VQuery[0]['count'];
			 	// echo $nc.' '.$V;

			
				foreach ($clcn['terms'] as $terms ) {
					// echo empty($terms);
					if (!in_array($stemmer->stem($terms),$stopwordsListNoSpace) && !empty($terms) ) {
								
								// echo $stemmer->stem($terms).' | ';
								 
								 // $nct = $this->db->query("select * from $set where feature='".$stemmer->stem($terms)."' and label='".$label."'")->result();

							$nct='';

							if($set=='datanb'){
								$nct = $this->db->query("select df.frequency from datacorpus dc join datafeature df on dc.idDataFeature=df.idDataFeature where df.feature='".$stemmer->stem($terms)."' and df.label='".$label."'")->result();
							}else{
								$nct = $this->db->query("select * from dataFeature where feature='".$stemmer->stem($terms)."' and label='".$label."'")->result();
							}
							

								 
								 if(count($nct)>0){
								 	$tc = $nct[0]->frequency;
								 	// echo $nct[0]->feature.' | ';
								 	// echo $nct[0]->terms.' | ';	 
								 }else{
								 	$tc=0;
								 	 
								 }


								 
								
								 

								 $hasil=(($tc+1)/($nc+$V));
								 $nb *=$hasil;
								 // echo $nb.' | ';
								 
								 // echo  $terms.' | '.$label.' | ';
								 // echo ' Nct='.$tc.' + 1'.' / Nc='.$nc.' + V='.$V.') | '.$hasil.' | ';
								 // echo "<br>";
							}
							
					 
				}
				
				$AAlabel[$i]=$label;
				$Anilai[$i]=$nb*$probC[$i];

				// echo $Anilai[$i];
				$i++;
				// $i=0;
				
				$nb=1;

				// echo "<br>";
				
			}
			// print_r($Alabel);
			// print_r($Anilai);


			return $hasilNB= array('label' =>$Alabel ,'nilai'=>$Anilai);
			// print_r($hasilNB);
			// echo '<b>'.$hasilNB['label'][array_search(max($hasilNB['nilai']),$hasilNB['nilai'])].' | nilai '. max($hasilNB['nilai']).'</b>';
			// return  $hasilNB['label'][array_search(max($hasilNB['nilai']),$hasilNB['nilai'])].' | nilai '. max($hasilNB['nilai']).'</b>';
			
			 
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


}

/* End of file naivebayes.php */
/* Location: ./application/controllers/naivebayes.php */