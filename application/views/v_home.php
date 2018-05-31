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

    </div>
</div>
</div>
</div>
