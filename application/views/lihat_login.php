<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>User Login</h3>
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
				<h2>Tampil User Login <small>menampilkan data user</small></h2>
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
					<td>NO.</td>
					<td>Id</td>
					<td>Username</td>
					<td>Password</td>
					<td>Nama</td>
					<td>Jabatan</td>
					<td>Proses</td>
				</tr></thead><tbody>";
				$i=1;
				foreach ($datanya->result() as $row) {
					echo"<tr>
					<td>".$i."</td>
					<td>".$row->id."</td>
					<td>".$row->username."</td>
					<td>".$row->password."</td>
					<td>".$row->nama."</td>
					<td>".$row->jabatan."</td>
					<td>

						<a href=".site_url("/login_user/hapus")."/".$row->id." class='btn btn-danger'>"."<span class='fa fa-trash'></span>"."</a>
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
