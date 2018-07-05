<div class="">
    <div class="page-title">
        <div class="title_left">
          
        </div>


</div>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#hide").click(function(){
            $("datanya").hide();
        });
        $("#show").click(function(){
            $("p").show();
        });
    });
    </script>
</head>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
             <!--    <h2>Data Training <small>-</small></h2> -->

        </div>
        Data Training = <?php echo $countData['countDataTraining'][0]->countDataTraining; ?>
        <br>
        Data Stemming = <?php 
        echo $countData['countDataStemming'][0]->countDataStemming.' | '; 
        echo $countData['countDataTraining'][0]->countDataTraining-$countData['countDataStemming'][0]->countDataStemming.' Baru'; ?>
        <br>
        Data Corpus =<?php echo $countData['countDataCorpus'][0]->countDataCorpus; ?>
        <br>
        Data Feature =<?php echo $countData['countDataFeature'][0]->countDataFeature; ?>
        

        <table class="table">
          <thead>
            <tr>
              <th scope="col">no</th>
              <th scope="col">Training Positif</th>
              <th scope="col">Training Negatif</th>
              <th scope="col">Training Netral</th>
              <th scope="col">Doc Feature</th>
              <th scope="col">Doc NB</th>
              <th scope="col">Jumlah Data Uji</th>
              <th scope="col">Akurasi</th>
            </tr>
          </thead>
          <tbody>
                       
        <?php 
        $i=1;
        foreach ($log as $value) {
            echo "<tr>";
            echo "<td>".$i++."</td>";
            echo "<td>".$value->docPositif."</td>";
            echo "<td>".$value->docNegatif."</td>";
            echo "<td>".$value->docNetral."</td>";
            echo "<td>".$value->docFeature."</td>";
            echo "<td>".$value->docNaiveBayes."</td>";
            echo "<td>".$value->docDataUji."</td>";
            echo "<td>".$value->akurasi."% </td>";
            echo "</tr>";
        } ?>

          </tbody>
        </table>
    </div>
</div>
</div>
</div>
