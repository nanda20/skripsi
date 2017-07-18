<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>Transaksi</h3>
		</div>

		<!-- <div class="title_right">
		<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
		<div class="input-group">
		<input type="text" class="form-control" placeholder="Search for...">
		<span class="input-group-btn">
		<button class="btn btn-default" type="button">Go!</button>
	</span>
</div>
<br>
<br>
</div>
</div> -->
</div>

<div class="clearfix"></div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Tampil Transaksi <small>menampilkan data transaksi</small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<form class="form-inline">

					<label for="tgl_awal">Tanggal Awal</label>
					<input type="date" id="tgl_awal" class="form-control" placeholder=" ">


					<label for="tgl_akhir">Tanggal Akhir</label>
					<input type="date" id="tgl_akhir" class="form-control" placeholder=" ">


					<a onclick="cari()" style="margin-top: 7px" class="btn btn-primary"><i class="fa fa-search"></i> Search</a>
				</form><br><br>

				<?php echo $this->pagination->create_links();?>

				<?php

				echo "<table id='datatable-responsive' class='table table-striped table-bordered dt-responsive table-hover'>
				<thead>
				<tr>
				<td>NO.</td>
				<td>Id</td>
				<td>Id Pelanggan</td>
				<td>Tanggal Transaksi</td>
				<td>Stand Lalu</td>
				<td>Stand Kini</td>
				<td>Pemakaian</td>
				<td>Foto</td>
				<td>Keterangan</td>
				<!--<td>Proses</td>-->
				</tr>
				</thead>";
				$i=1;
				echo "<tbody>";
				foreach ($datanya->result() as $row) {
					echo"<tr>
					<td>".$i."</td>
					<td>".$row->id."</td>
					<td>".$row->id_pel."</td>
					<td>".$row->tgl."</td>
					<td>".$row->stand_lalu."</td>
					<td>".$row->stand_kini."</td>
					<td>".$row->pemakaian."</td>
					<td> <img style='height:100px;width:auto;' src=".base_url().'upload/'.$row->foto." /></td>
					<td>".$row->keterangan."</td>
					<!--<td><a href=".site_url("/transaksi/hapus")."/".$row->id.">".form_button("hapus","Hapus")."</a></td>-->
					</tr>";
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
	var tgl_awal = $("#tgl_awal").val();
	var tgl_akhir = $("#tgl_akhir").val();
	var url = "<?php echo base_url() . 'transaksi/get_transaksi' ?>";
	$.ajax({
		type: 'POST',
		url: url,
		data: {tgl_awal:tgl_awal,tgl_akhir:tgl_akhir},
		success: function(msg){
			$('#datatable-responsive').html(msg);
		}
	});
}
</script>
