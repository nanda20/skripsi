

      <!--   <form action="<?= base_url('login_user/insert/') ?>" method="post" id="form-login" data-parsley-validate class="form-horizontal form-label-left">
           

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Username <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php #echo form_input('alamat'); ?>
                    <input type="text" name="username" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Password <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php #echo form_input('no_telp'); ?>
                    <input type="text" name="password" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?php #echo form_input('email'); ?>
                <input type="text" name="nama" required="required" class="form-control col-md-7 col-xs-12">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Jabatan <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?php #echo form_input('password',$pegawai[0]->password); ?>
                <input type="text" name="jabatan" required="required" class="form-control col-md-7 col-xs-12">
            </div>
        </div>


<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <button type="submit" id="submit_" class="btn btn-success">Proses</button>
      <button type="reset" class="btn btn-primary">Reset</button>
      <button onclick="window.history.back()" class="btn btn-danger pull-right">Kembali</button>
  </div>
</div>



</div>
</form> -->

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

$consumer_key = "xeWWwxBQ1fuEekzg1snILkZ44";
$consumer_secret = "MHVsHdWwOeBBzr4mGiWqCKJknBd0CU9nmDognGamnMIPFc2S3T";
$access_token = "325528356-9sQcMFRUujeMmrysjugich8fvuriYGrCCzh9sf31";
$access_token_secret = "FN0rQ5E3FhIYSqqEMNhsz4XwinETPH2sCcXNGLCZUQ4iO";

$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

// $tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=ptkai&result_type=recent&count=100');
$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=ptkai&result_type=recent&count=100');

?>
 <div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">user name</th>
      <th scope="col">tweet</th>
      <th scope="col">Filter</th>
    </tr>
  </thead>
  <tbody>

<?php 
$i=0;
// echo $tweets->statuses[0]->text;
foreach ($tweets->statuses as $key => $tweet) { 
    
    ?>
    <tr>
      <th scope="row"><?= ($i+1) ?></th>
      <td><?= $tweet->user->screen_name; ?></td>
      <td>
        <?= $tweet->text; ?>
        <input type="hidden" name='tweet<?=$i?>' class="form-control" value="<?= $tweet->text; ?>"/> 
         <input type="hidden" name='user<?=$i?>' class="form-control" value="<?= $tweet->user->screen_name; ?>"/> 
      </div>  
      </td>
      <td>
       <div class="custom-control custom-checkbox">
          <input type="checkbox" name='check<?=$i?>' class="custom-control-input" > 

        </div>
      </td>
    </div>
    </tr>

    <!-- <img src="<?=$tweet->user->profile_image_url; ?>" /> -->
    
    <?php 
    $i++;}
     ?>
     <input type="hidden" name='tweetQty' class="custom-control-input" value="<?=($i-1)?>"> 
    </tbody>
</table>
</div>
    <button type="submit" id="submit_" class="btn btn-success">Insert</button>

</div>
</form>


</div>
</div>
</div>