<!DOCTYPE HTML>
<html>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	   <!-- Bootstrap -->
	    <link href="<?= base_url() ?>assets/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<head>
<script>



window.onload = function () {
	
			
        var xmlhttp = new XMLHttpRequest();
		var url = "http://localhost:8080/sentimenanalis/user/jsonchart";
		var data;
		xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		        var myArr = JSON.parse(this.responseText);
		        myFunction(this.responseText);
		        // document.write(this.responseText);
		        data=this.responseText;
		        
		    }
		};

		

		xmlhttp.open("GET", url, true);
		xmlhttp.send();
		
		function myFunction(data) {
			// document.write(data)
		

		// var data= '{"animationEnabled":true,"title":{"text":"Twitter Sentimen Analisis "},"axisY":[{"title":"Kategori Tweet","lineColor":"#2c3e50","tickColor":"#2c3e50","labelFontColor":"#2c3e50","titleFontColor":"#2c3e50","suffix":"k"}],"toolTip":{"shared":true},"legend":{"cursor":"pointer","itemclick":"toggleDataSeries"},"data":[{"type":"line","name":"Positif","color":"#e67e22","showInLegend":true,"axisYIndex":1,"xValueType":"dateTime","dataPoints":[{"x":1527631200,"y":"0"},{"x":1104517800000,"y":55}]},{"type":"line","name":"Negatif","color":"#2ecc71","showInLegend":true,"axisYIndex":1,"xValueType":"dateTime","dataPoints":[{"x":1088620200000,"y":55},{"x":1104517800000,"y":65}]}]}';

		// var data2='{"animationEnabled":true,"title":{"text":"Twitter Sentimen Analisis "},"axisY":[{"title":"Kategori Tweet","lineColor":"#2c3e50","tickColor":"#2c3e50","labelFontColor":"#2c3e50","titleFontColor":"#2c3e50","suffix":"k"}],"toolTip":{"shared":true},"legend":{"cursor":"pointer","itemclick":"toggleDataSeries"},"data":[{"type":"line","name":"Positif","color":"#e67e22","showInLegend":true,"axisYIndex":1,"xValueType":"dateTime","dataPoints":[{"x":1527631200,"y":0},{"x":1527717600,"y":3},{"x":1527890400,"y":0},{"x":1527976800,"y":0},{"x":1528063200,"y":0}]},{"type":"line","name":"Negatif","color":"#e74c3c","showInLegend":true,"axisYIndex":1,"xValueType":"dateTime","dataPoints":[{"x":1527631200,"y":0},{"x":1527717600,"y":1},{"x":1527890400,"y":0},{"x":1527976800,"y":2},{"x":1528063200,"y":1}]},{"type":"line","name":"Netral","color":"#2980b9","showInLegend":true,"axisYIndex":1,"xValueType":"dateTime","dataPoints":[{"x":1527631200,"y":1},{"x":1527717600,"y":18},{"x":1527890400,"y":3},{"x":1527976800,"y":0},{"x":1528063200,"y":3}]}]}';

		var d= JSON.parse(data);
		// document.write(data);
		// document.write(new Date(d.dataPoints[0].x));
		
		// document.write(d.dataPoints.length);
						// var dp= {dataPoints:{}};

					 // 		for (var i = 0; i < d.dataPoints.length ; i++) {
						// 		// document.write(new Date(d.dataPoints[i].x));
						// 		// dataPoints['x'] = new Date(d.dataPoints[i].x;
						// 		var objName= 'x'+i;
						// 		var objValue= new Date(d.dataPoints[i].x);
						// 		dp.dataPoints[objName]=objValue;

						// 	}
						// 	console.log(JSON.stringify(dp));

		// document.write(dp.dataPoints);


			// var json= parse(
			// '{"x":new Date("2017,01,07"), "y": 85.4 }, {"x":new Date("2017,01,08"), "y": 92.7 }');
			// window.write(json)


	var chart = new CanvasJS.Chart("chartContainer",d);
chart.render();

}

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}

}
</script>
</head>
<body>
<div class="container">
	<div id="chartContainer" style="height: 300px; width: 100%;"></div>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>
</body>
</html>