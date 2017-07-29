<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>Kode Baca</h3>
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
				<h2>Tampil Kode Baca <small>menampilkan data kode baca</small></h2>
				<li><a class="col-md-10 col-sm-10 col-xs-10" href="<?= base_url('transaksi/export2xls') ?>"><span class="glyphicon glyphicon-print"><font color="blue">Export</font></span></a></li>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>

					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<?php
				// echo form_open(site_url("/pelanggan/hapus"));
				// echo "<a href='".base_url('pelanggan/tambahdata/'.$row->id_pelanggan)."' class='btn btn-sucesfull'>Tambah Data</a>";
				// echo form_close();

				echo "<table id='datatable-responsive' class='table table-striped table-bordered dt-responsive table-hover'>
				<thead>
				<tr>
					<td>No.</td>
					<td>Kabupaten</td>
					<td>Kecamatan</td>
					<td>Desa</td>
					<td>Baca Hari</td>
					<td>Kode Baca</td>
					<td>Status</td>
					<td>Proses</td>
				</tr>
				</thead>
				<tbody>";
				$i=1;
				foreach ($datanya->result() as $row) {
					echo"<tr>
					<td>".$i."</td>
					<td>".$row->kabupaten."</td>
					<td>".$row->kecamatan."</td>
					<td>".$row->desa."</td>
					<td>".$row->baca_hari."</td>
					<td>".$row->kode_baca=$row->kode_baca."</td>
					<td>".$row->status=$row->status."</td>

					<td>
						<a href=".site_url("/kode_baca/edit")."/".$row->id." class='btn btn-primary'>"."<span class='fa fa-pencil-square-o'></span>"."</a>
						<a href=".site_url("/kode_baca/hapus")."/".$row->id." class='btn btn-danger'>"."<span class='fa fa-trash'></span>"."</a>
					</td>
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
