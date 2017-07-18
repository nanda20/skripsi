<?php
	echo "<a href ='".base_url()."index.php/pelanggan/tambahdata'>Tambah Data</a>|";
	// echo "<a href ='".base_url()."index.php/pelanggan/export2xls'>Export</a>";
	echo "<table border=1>
	<tr>
		<td>NO.</td>
		<td>Id Pelanggan</td>
		<td>Alamat</td>
		<td>Nomer Tinag</td>
		<td>Lat</td>
		<td>Long</td>
		<td colspan=2>Proses</td>
	</tr>";
	$i=1;
	foreach ($datanya->result() as $row) {
			echo"<tr>
				<td>".$i."</td>
				<td>".$row->id_pelanggan."</td>
				<td>".$row->alamat."</td>
				<td>".$row->no_tiang."</td>
				<td>".$row->lat."</td>
				<td>".$row->long."</td>
				<td><a href=".site_url("/pelanggan/hapus")."/".$row->id_pel.">".form_button("hapus","Hapus")."</a></td>
				<td><a href=".site_url("/pelanggan/edit")."/".$row->id_pel.">".form_button("edit","Edit")."</a></td>
			</tr>";
			$i++;
	}
	echo "</table>";

?>
