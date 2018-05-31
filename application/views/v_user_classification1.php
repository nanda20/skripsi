<br>

 <form action="<?= base_url('onlinecrawling/tambahdatacrawling/') ?>" method="post" id="form-login" data-parsley-validate class="form-horizontal form-label-left">
<div class="form-group">





<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
<?php 
/**
 * Twitter API SEARCH
 * Selim Hallaç
 * selimhallac@gmail.com
 */
$path= __DIR__;
$new_path= dirname($path,2);
$new_path=$new_path.'/assets/apitweet/twitteroauth/twitteroauth.php';
include $new_path;

$consumer_key = "IFXUNen9qtV85aRg5EsS5Q7Bq";
$consumer_secret = "g9xSydGPC8Ab0FjdU7Orp2vpeDWNnQZVfEojhHWWCO8TKdy76N";
$access_token = "325528356-d5rkNNGv1nhJg09SaUZfZYmrEdOtoEyYjJCVaI8l";
$access_token_secret = "5b28o3rPpvOPmZOcgi87AdAcCUvLGca8gK1vQ0SPoeY6Y";

$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

// $tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=ptkai&result_type=recent&count=100');
$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=ptkai&result_type=recent&count=100&tweet_mode=extended&result_type=recent&retweeted_status=full_text');

?>
 <div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">User name</th>
      <th width="15%" scope="col">Created at</th>
      <th scope="col">Tweet</th>
      <th scope="col">Label</th>
    </tr>
  </thead>
  <tbody>

<?php 
// print_r($tweets->statuses[2]->retweet_count);
	// print_r($tweets->statuses[2]->retweeted_status->full_text);
$i=0;
// echo $tweets->statuses[0]->text;
foreach ($tweets->statuses as $tweet) { 
    
    ?>
    <tr>
    <?php  if(date_format(date_create($tweet->created_at),"Y-m-d") == date("Y-m-d") ){ ?>
      <th scope="row"><?= ($i+1) ?></th>
      <td><?= $tweet->user->screen_name; ?></td>
      <td><?= date_format(date_create($tweet->created_at),"Y-m-d H:i:s"); ?></td>
      <td> <?php 
      		if($tweet->retweet_count>0){
     		echo $tweet->retweeted_status->full_text;
      	}else{
      		echo $tweet->full_text;
      	}
      	; ?></div>  
      </td>
      <td></td>
    </div>
    </tr>

    <!-- <img src="<?=$tweet->user->profile_image_url; ?>" /> -->
    
    <?php 
	}
    $i++;}
     ?>
     <input type="hidden" name='tweetQty' class="custom-control-input" value="<?=($i-1)?>"> 
    </tbody>
</table>
</div>
    <!-- <button type="submit" id="submit_" class="btn btn-success">Insert</button> -->

</div>
</form>


</div>
</div>
</div>

</div>
</boody>
 