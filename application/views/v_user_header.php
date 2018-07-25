<!DOCTYPE html>
<html lang="en">
<head>

<!-- <title>Bootstrap Example</title> -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
   <!-- Bootstrap -->
    <link href="<?= base_url() ?>assets/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    .navbar-nav>li>a {
    padding-top: 10px;
    padding-bottom: 10px;
    line-height: 20px;
    color: white;
}
.nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
    color: black;
    background-color: #fbf7f7;
    border-color: #337ab7;
}
</style>
</head>
<body>
  

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">ADMIN PT.KAI </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

<?php  $d = explode('/',$_SERVER['REQUEST_URI']); 
      // print_r($d);
    
?>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('User/index');?>">Home 
        <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?php  if( $d[3]=='usertweet'){echo 'active';}?>"  >
        <a class="nav-link" href="<?=base_url('naivebayes/usertweet');?>">Klasifikasi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('User/chart');?>">Grafik</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('User/viewKlasifikasiTweet');?>">Tampilkan Tweet</a>
      </li>


    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Logout<span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="http://localhost:8080/sentimenanalis/login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
          </ul>
        </li>        
    </ul>
        </li>
      </ul>
  </div>
</nav>


<div class="container">