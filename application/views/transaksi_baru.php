<?php
	echo site_url()."<br>";
	echo base_url()."<br>";

	echo "<a href ='".base_url()."index.php/transaksi/tambahdata'>Tambah Data</a>";
	echo "<table border=1>
	<tr>
		<td>NO.</td>
		<td>Id Transaksi</td>
		<td>Id Pegawai</td>
		<td>Id Pelanggan</td>
		<td>Tanggal Transaksi</td>
		<td>Tagihan</td>
		<td>Denda</td>
		<td>Meteran</td>
		<td colspan=2>Proses</td>
	</tr>";
	$i=1;
	foreach ($datanya->result() as $row) {
			echo"<tr>
				<td>".$i."</td>
				<td>".$row->id_transaksi."</td>
				<td>".$row->id_pegawai."</td>
				<td>".$row->id_pelanggan."</td>
				<td>".$row->tanggal_transaksi."</td>
				<td>".$row->tagihan."</td>
				<td>".$row->meteran."</td>
				<td><a href=".site_url("/transaksi/hapus")."/".$row->id_transaksi.">".form_button("hapus","Hapus")."</a></td>
				<td><a href=".site_url("/transaksi/edit")."/".$row->id_transaksi.">".form_button("edit","Edit")."</a></td>
			</tr>";
			$i++;
	}
	echo "</table>";

?>
