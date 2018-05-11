<?php
             
                echo "<table id='datatable-responsive' class='table table-striped table-bordered dt-responsive table-hover'>
                <thead>
                <tr>
                    <td>No.</td>
                     
                    <td>feature</td>
                    <td>frequency</td>
                    <td>label</td>
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
                        

                
                    </td></tr>
                    <?php

                $i++;
            }
            echo "</tbody></table>";

            ?>