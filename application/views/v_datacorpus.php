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
 

<!-- <?php if($allChiSquare[0]->allChiSquare>0){ ?>
<div class="alert alert-info alert-dismissible fade in">
  <strong>Info! Ada <?php echo $allChiSquare[0]->allChiSquare; ?> Feature Baru yang belum di proses  </strong> 
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>  
    <form action="<?= base_url('chisquare/viewcorpus');?>" method="post" accept-charset="utf-8">
        <button class="btn btn-primary" name="submit" value="submit" type="submit"  data-toggle="modal" data-target="#myModal">Process</button>    
    </form>
<?php }?> -->
    
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Corpus <small> preprocessing / chis quare / corpus </small></h2>
            
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>

                <div class="clearfix"></div>
            </div>
            <?php
             
                echo "<table id='datatable-responsive' class='table table-striped table-bordered dt-responsive table-hover'>
                <thead>
                <tr>
                    <td>No.</td>
                     
                    <td>feature</td>
                    <td>frequency</td>
                    <td>label</td>
                    <td>chi square</td>
                    ";
                    // <td>Proses</td>
                    echo "
                </tr>
                </thead>
                <tbody>";
                $i=1;
                foreach ($data->result() as $row) {
                    echo"<tr>
                    <td>".$i."</td>
                    
                    <td>".$row->feature."</td>
                    <td>".$row->frequency."</td>
                   
                    <td>"?>

<span class="label label-<?= (($row->label=='positif')? 'success': ($row->label=='negatif' ? 'warning' : 'primary')) ?>" ><?=$row->label?></span>
                        
                    
                
                    </td>

                    <td><?=$row->valueChiSquare ?></td>

                    </tr>
                    <?php

                $i++;
            }
            echo "</tbody></table>";

            ?>

            

        </div>
    </div>
</div>
</div>
</div>

<script type="text/javascript">
function cari() {
    var kode_baca = $("#kode_baca").val();
    var url = "<?php echo base_url() . 'pelanggan/get_sorting' ?>";
    $.ajax({
        type: 'POST',
        url: url,
        data: {kode_baca:kode_baca},
        success: function(msg){
            $('#datatable-responsive').html(msg);
        }
    });
}
</script>
