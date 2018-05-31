<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class naivebayes extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$path= __DIR__;
		$new_path= dirname($path,2);

		require_once $new_path.'/vendor/autoload.php';
	}


	public function a(){
		$a=array("Volvo"=>"XC90","BMW"=>"X5","Toyota"=>"Highlander");
		print_r(array_keys($a));

	}

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

		$Queryprob=$this->db->query("SELECT (SELECT count(*) FROM `datastemming` WHERE label='positif') as sumPositif ,(SELECT count(*) FROM `datastemming` WHERE label='negatif')as sumNegatif ,(SELECT count(*)  FROM `datastemming` WHERE label='netral')as sumNetral")->result_array();
			
			$V=$Queryprob[0]['sumPositif']+$Queryprob[0]['sumNegatif']+$Queryprob[0]['sumNetral'];
			$prob=array	($Queryprob[0]['sumPositif']/$V,$Queryprob[0]['sumNegatif']/$V,$Queryprob[0]['sumNetral']/$V);
						
			 $i=0;

			 $VQuery =  $this->db->query("select count(DISTINCT feature) as count from datacorpus")->result_array();



			$hasil =array();
			$tweetmp="";
			foreach ($tweets->statuses as $tweet)  {
				if(date_format(date_create($tweet->created_at),"Y-m-d") == date("Y-m-d")){ 

						if($tweet->retweet_count>0){
			     			$tweetmp= $tweet->retweeted_status->full_text;
			      		 }else{
			      			$tweetmp = $tweet->full_text;
			      		}

						// echo '['.$i.'] '.$value->tweet.'</br>';
						 $hasilNB = $this->processtesting($tweetmp,$prob,$VQuery);

						 	$hasil[$i] = array("tweet"=>$tweetmp,
									  "nilai"=>$hasilNB['nilai'],
									  "labelMax"=>$hasilNB['label'][array_search(max($hasilNB['nilai']),$hasilNB['nilai'])],
									  "nilaiMax"=>max($hasilNB['nilai'])
									);
						 // print_r($hasil[$i]);
						 // echo "<br>";
						$i++;
				}
				

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

	public function processnaivebayes()
	{
 
		
		$db= $this->db->query("select * from datacorpus ")->result();
		

		echo "<br>";
		$V =  $this->db->query("select count(DISTINCT feature) as count from datacorpus ")->result();
		// print_r($V[0]->count);
		$i=1;
		foreach ($db as $value) {
			$nc = $this->db->query("select sum(frequency) as count from datacorpus where label='".$value->label."' ")->result();
			$nbValue=(($value->frequency+1)/($nc[0]->count+$V[0]->count));

			echo $i.' '.$value->feature.' '. $value->label .' | Tct=' .$value->frequency.' | Nc = '.$nc[0]->count.' | V='.$V[0]->count.' Probability = '.$nbValue.'</br>';
			$i++;

			$data=array('id'=>null,'feature'=>$value->feature,'frequency'=>$value->frequency,'label'=>$value->label,'naivebayesvalue'=>$nbValue);
			$this->db->insert('datanb',$data);
		}

	}

	public function template($data)
		{
			$this->load->view('template/header', $data);
			$this->load->view('template/left');
			$this->load->view('template/content');
			$this->load->view('template/footer');
		}
	public function viewnaivebayes(){
			$this->load->model('m_naivebayes');
			$value["data"]=$this->m_naivebayes->getAll();

			$this->load->view('v_user_header');
			$data['title'] = 'Data Naive Bayes';
			$data['content'] = $this->load->view('v_datanb', $value, true);
			$data['script'] = '';
			$this->template($data);


	}

	public function viewtesting(){
		 
			$Queryprob=$this->db->query("SELECT (SELECT count(*) FROM `datastemming` WHERE label='positif') as sumPositif ,(SELECT count(*) FROM `datastemming` WHERE label='negatif')as sumNegatif ,(SELECT count(*)  FROM `datastemming` WHERE label='netral')as sumNetral")->result_array();
			
			$V=$Queryprob[0]['sumPositif']+$Queryprob[0]['sumNegatif']+$Queryprob[0]['sumNetral'];
			$prob=array	($Queryprob[0]['sumPositif']/$V,$Queryprob[0]['sumNegatif']/$V,$Queryprob[0]['sumNetral']/$V);
						
			 $i=0;

			 $VQuery =  $this->db->query("select count(DISTINCT feature) as count from datacorpus")->result_array();

			$tweetQuery =  $this->db->query("select *  from datatesting")->result();

			$hasil =array();
			foreach ($tweetQuery as $value)  {
				// echo '['.$i.'] '.$value->tweet.'</br>';
				 $hasilNB = $this->processtesting($value->tweet,$prob,$VQuery);
				 
				//  foreach ($hasilNB['nilai'] as $value) {
				//  	echo $value.'<br>';

				//  };
				 // echo "<br>";

				//  echo   $hasilNB['label'][array_search(max($hasilNB['nilai']),$hasilNB['nilai'])].' | nilai '. max($hasilNB['nilai']).'</b>';


				//  // echo "<br>";
				// echo "<br> ------------------------------------------------ ";
				// echo '<br>';	
				
				$hasil[$i] = array("tweet"=>$value->tweet,
							  "nilai"=>$hasilNB['nilai'],
							  "labelMax"=>$hasilNB['label'][array_search(max($hasilNB['nilai']),$hasilNB['nilai'])],
							  "nilaiMax"=>max($hasilNB['nilai'])
							);
				$i++;
				// echo $i;

			}


			// print_r($hasil);


			$valueData['hasil'] = $hasil;
			$data['title'] = 'Testing Tweet';
			$data['header'] = '';
			$data['content'] = $this->load->view('v_testing', $valueData, true);
			$data['script'] = '';
			$this->template($data);
			

	
	}
 

	public function	clean(){
		$tweet ="I'm at Stasiun Maos - @ptkai in Cilacap, Jawa Tengah https://t.co/VA1m9BqUfB";
		 $clcn=$this->cleaningtweet($tweet);
		 

		 foreach ($clcn['terms'] as $value) {
		 	echo $value.' ';
		 }
	}
	public function processtesting($tweet,$probC,$VQuery){

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
			foreach ($Alabel as $label) {
						
				$ncQuery = $this->db->query("select sum(frequency) as countAll from datanb where label='".$label."'")->result_array();

			 
				$nc =$ncQuery[0]['countAll'];
				$V=$VQuery[0]['count'];
			 	// echo $nc.' '.$V;

			
				foreach ($clcn['terms'] as $terms ) {
					// echo empty($terms);
					if (!in_array($stemmer->stem($terms),$stopwordsListNoSpace) && !empty($terms) ) {
								
								// echo $stemmer->stem($terms).' | ';
								 $nct = $this->db->query("select * from datanb where feature='".$stemmer->stem($terms)."' and label='".$label."'")->result();

								 
								 if(count($nct)>0){
								 	$tc = $nct[0]->frequency;
								 	// echo $nct[0]->feature.' | ';
								 	// echo $nct[0]->terms.' | ';	 
								 }else{
								 	$tc=0;
								 	 
								 }


								 
								// echo '('.$label.' '.$i++.')';
								 // echo  $terms.' | ';
								 // echo ' Nct='.$tc.' + 1'.' / Nc='.$nc.' + V='.$V.') | ';

								 $hasil=(($tc+1)/($nc+$V));
								 $nb =$nb * $hasil;
								 // echo $nb.' | ';
								 // echo $hasil.' | ';
							}
							
					 
				}
				
				// echo $probC[$i];
				  // ' ['.$label.'] '.($nb*$probC[$i]) ;
				$AAlabel[$i]=$label;
				$Anilai[$i]=$nb*$probC[$i];

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