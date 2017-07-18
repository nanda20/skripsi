<html>
	<head>
		<title>Laporan</title>
	</head>
	<body>
		
		<center>
			<h1>Laporan PDAM</h1>
			<table border="1">
				<thead>
					<tr>
						<th>Id Transaksi </th>
						<th>Id Pegawai</th>
						<th>Id Pelanggan</th>
						<th>Tanggal Transaksi</th>
						<th>Tagihan</th>
						<th>Denda</th>
						<th>Meteran</th>
					</tr>
				</thead>
				<tbody>
					<?php
						
						$i = 1; //nantinya akan digunakan untuk pengisian Nomor
						foreach ($transaksi->result() as $row) {
					?>
					<tr>
						<td><?= $i ?></td>
						<td><?= $row->id_transaksi ?></td> 
						<td><?= $row->id_pegawai ?></td>
						<td><?= $row->id_pelanggan ?></td>
						<td><?= $row->tanggal_transaksi ?></td>
						<td><?= $row->tagihan ?></td>
						<td><?= $row->denda ?></td>
						<td><?= $row->meteran ?></td>
						<td><?= $row-> ?></td>
					</tr>
					<?php
					$i++;	}
					?>
				</tbody>
			</table>
		</center>
	</body>
</html>