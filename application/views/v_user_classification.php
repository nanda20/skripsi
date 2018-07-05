<title>Klasifikasi Tweet</title>


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
                <!-- <h2>Testing Tweet Twitter <small> testing / data tweet  </small></h2> -->
            
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
                    <td>User Name</td> 
                    <td>Tweet</td>
                    <td width='10%'>created at</td>
                    <td>Nilai Positif</td>
                    <td>Nilai Negatif</td>
                    <td>Nilai Netral</td>
                    <td>label</td>
                    
                    ";
                    // <td>Proses</td>
                    echo "
                </tr>
                </thead>
                <tbody>";
                $i=1;
                // print_r($hasil);
                foreach ($hasil as $row) {

                    echo"<tr>
                    <td>".$i."</td>
                    <td>".$row['username']."</td>
                    <td>".$row['tweet']."</td>
                    <td>"; echo date_format(date_create($row['created_at']),"Y-m-d H:i:s"); echo "</td>
                    <td>".$row['nilaiPositif']."</td>
                    <td>".$row['nilaiNegatif']."</td>
                    <td>".$row['nilaiNetral']."</td>";
                    ?>
                    <td>
                    <span class="label label-<?= (($row['label']=='positif')? 'success': ($row['label'] =='negatif' ? 'warning' : 'primary')) ?>" ><?=$row['label'] ?></span>
                    </td>
                    <?php
                    // echo "<td>".$row['nilaiMax']."</td>";
                   

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
