<div class="">
    <div class="page-title">
        <div class="title_left">
          
        </div>


</div>
<head>
    <!-- Custom CSS -->
    <link href="../assets/css/home.css" rel="stylesheet">


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
        
        <!-- <br>
        Data Stemming = <?php 
        echo $countData['countDataStemming'][0]->countDataStemming.' | '; 
        echo $countData['countDataTraining'][0]->countDataTraining-$countData['countDataStemming'][0]->countDataStemming.' Baru'; ?>
        <br>
        Data Corpus =<?php echo $countData['countDataCorpus'][0]->countDataCorpus; ?>
        <br>
        Data Feature =<?php echo $countData['countDataFeature'][0]->countDataFeature; ?>
    
    <hr> -->
  
    
<div class="row">
                  <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=$countData['countDataStemming'][0]->countDataStemming?></div>
                                    <div><h5>Data Training</h5></div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url().'DataTraining/viewStemming' ;?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $countData['countDataFeature'][0]->countDataFeature; ?></div>
                                    <div><h5>Data Feature</h5></div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url().'DataTraining/viewDataFeature' ;?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $countData['countDataCorpus'][0]->countDataCorpus; ?></div>
                                    <div><h5>Data Corpus</h5></div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url().'ChiSquare/viewCorpus' ;?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                
</div>

<!-- <div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-bookmark"></span> Quick Shortcuts</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                          <a href="#" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/><?php echo $countData['countDataTraining'][0]->countDataTraining; ?> Data Training  </a>
                          <a href="#" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-bookmark"></span> <br/>Bookmarks</a>
                          <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-signal"></span> <br/>Reports</a>
                          <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-comment"></span> <br/>Comments</a>
                        </div>
                        <div class="col-xs-6 col-md-6">
                          <a href="#" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/>Users</a>
                          <a href="#" class="btn btn-info btn-lg" role="button"><span class="glyphicon glyphicon-file"></span> <br/>Notes</a>
                          <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-picture"></span> <br/>Photos</a>
                          <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-tag"></span> <br/>Tags</a>
                        </div>
                    </div>
                    <a href="http://www.jquery2dotnet.com/" class="btn btn-success btn-lg btn-block" role="button"><span class="glyphicon glyphicon-globe"></span> Website</a>
                </div>
            </div>
        </div>
    </div>
</div> -->

     <!--  <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div> -->

      


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
