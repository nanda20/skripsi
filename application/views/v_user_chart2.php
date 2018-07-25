<!DOCTYPE HTML>
<html>
<head>
<!-- <?php echo $bln=$_POST['bulan']; ?> -->
 
 <style type="text/css" media="screen">
	 select.form-control:not([size]):not([multiple]) {
	    height: calc(3.25rem + 2px);
}
 	
 </style>
<script>


window.onload = function () {
	var bulan =document.getElementById("bulan").value;
	var tahun =document.getElementById("tahun").value;
	if(bulan=="Bulan" && tahun=="Tahun"){

		var xmlhttp = new XMLHttpRequest();
		var url = "http://localhost:8080/sentimenanalis/user/jsonchart/0/0";
		// var url="https://canvasjs.com/data/gallery/php/bitcoin-price.json";
		var data;
		xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
				getData(this.responseText);
		        myFunction(this.responseText);
		    }
		};

		
		xmlhttp.open("GET", url, true);
		xmlhttp.send();

		function myFunction(data) {
		
		dataJson = JSON.parse(data);


		var chart = new CanvasJS.Chart("chartContainer",dataJson);
		chart.render();
	} 
}
}
		

		function filter(element){	
			
		var bulan =document.getElementById("bulan").value;
		var tahun =document.getElementById("tahun").value;
		if(bulan !="Bulan" && tahun !="Tahun"){

        var xmlhttp = new XMLHttpRequest();
		var url = "http://localhost:8080/sentimenanalis/user/jsonchart/"+bulan+"/"+tahun;
		// var url="https://canvasjs.com/data/gallery/php/bitcoin-price.json";
		var data;
		xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		        myFunction(this.responseText);
		        getData(this.responseText);
		    }
		};

		
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
		
		

		function myFunction(data) {
		
		if(data.length==740){
			$('#passwordsNoMatchRegister').show();
			var chart = new CanvasJS.Chart("chartContainer","");
			chart.render();
		}else{
		$('#passwordsNoMatchRegister').hide();
		dataJson = JSON.parse(data);
		var chart = new CanvasJS.Chart("chartContainer",dataJson);
		chart.render();
		}
		
		}
	}

	}

	function getData(data){
	 		var positif=JSON.parse(data).data[0].dataPoints.length
	 		var sumPositif=0;
	 		var negatif=JSON.parse(data).data[1].dataPoints.length
	 		var sumNegatif=0;
	 		var netral=JSON.parse(data).data[2].dataPoints.length
	 		var sumNetral=0;
			for (var i = 0; i < positif; i++) {
				// console.log(i);
				// console.log(JSON.parse(data).data[0].dataPoints[i].y)
				sumPositif += JSON.parse(data).data[0].dataPoints[i].y;
				sumNegatif += JSON.parse(data).data[1].dataPoints[i].y;
				sumNetral += JSON.parse(data).data[2].dataPoints[i].y;

			}
			document.getElementById("positif").innerHTML=sumPositif;
			document.getElementById("negatif").innerHTML=sumNegatif;
			document.getElementById("netral").innerHTML=sumNetral;

			// console.log(sumPositif);
			// console.log(sumNegatif);
			// console.log(sumNetral);
		}

</script>
</head>
<body>
<div class="container">
 <!-- <form action="<?= base_url().'user/chart/07/2018' ?>" method="post" accept-charset="utf-8">  -->
<form action="" method="get" accept-charset="utf-8">

<div class="form-row">
	<div class="form-group col-md-12">
	<label for="inputEmail4">Pilih Bulan dan Tahun Untuk Melakukan Filter</label>
	</div>
    <div class="form-group col-md-2">
      <!-- <label for="inputEmail4">Pilih Bulan dan Tahun Untuk Filter</label> -->
    
<select id='bulan' name="bulan" onChange="filter(this);" class="form-control">
<option >Bulan</option>
<?php
$bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
$bulanIndex=array("01","02","03","04","05","06","07","08","09","10","11","12");
$jlh_bln=count($bulan);
for($c=0; $c<$jlh_bln; $c+=1){
    echo"<option value=$bulanIndex[$c]> $bulan[$c] </option>";
}
?>
</select>
</div>
    <div class="form-group col-md-2">
      
<!-- <select name='tahun' onchange="javascript: if(this.value != '0') this.form.submit(); else alert('hello');" > -->

<!-- <label for="inputPassword4">Tahun</label> -->

      <div class="form-group">
	<select class="form-control" id="tahun" name='tahun' onChange="filter(this);" >
	    <option >Tahun</option>
	    <option value='2016'>2016</option>
	    <option value='2017'>2017</option>
	    <option value='2018'>2018</option>
	</select>
</div>
    </div>
  </div>
 </form>
<!-- <div class="alert alert-error collapse" role="alert" id="passwordsNoMatchRegister">
  <span>
  <p>Looks like the passwords you entered don't match!</p>
  </span>
</div>
 -->
 <div class="container">
 	<div class="row">
 <h4> Total :  &nbsp;</h4> 
 <button type="button" class="btn btn-primary">Positif <span class="badge" id="positif">0</span></button>
 	&nbsp;
  <button type="button" class="btn btn-danger">Negatif <span class="badge" id="negatif">0</span></button>    
  &nbsp;
  <button type="button" class="btn btn-success">Netral <span class="badge"  id="netral">0</span></button>  
</div>
</div>
<div class="alert alert-primary collapse" role="alert" id="passwordsNoMatchRegister">
  Data yang dicari Tidak Ditemukan 
</div>

	<!-- 	<div class="btn-group">
		  <button type="button " class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    Pilih Bulan
		  </button>
		  <div class="dropdown-menu">
		    <a class="dropdown-item" href="#">Januari</a>
		    <a class="dropdown-item" href="#">Februari</a>
		    <a class="dropdown-item" href="#">Maret</a>
		    <a class="dropdown-item" href="#">April</a>
		    <a class="dropdown-item" href="#">Mei</a>
		    <a class="dropdown-item" href="#">Juni</a>
		    <a class="dropdown-item" href="#">Juli</a>
		    <a class="dropdown-item" href="#">Agustus</a>
		    <a class="dropdown-item" href="#">September</a>
		    <a class="dropdown-item" href="#">Oktober</a>
		    <a class="dropdown-item" href="#">November</a>
		    <a class="dropdown-item" href="#">Desember</a>

		  </div>
		</div> -->
		<!-- </form> -->
<!-- <button type="button" class="btn btn-primary">Submit Filter</button> -->
	<hr>
	<div id="chartContainer" style="height: 320px; width: 100%;"></div>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>
</body>
</html>