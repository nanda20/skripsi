<!DOCTYPE html>
<html lang="en">
<head>
<!-- <title>Bootstrap Example</title> -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
   <!-- Bootstrap -->
    <link href="<?= base_url() ?>assets/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

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
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
       -->
    </ul>
  </div>
</nav>


<div class="container">