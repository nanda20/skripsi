<?php
	$data = $this->input->post();
	if(!empty($data['tgl_awal'])){
		$this->db->where('tgl >=',$data['tgl_awal']);
	}
	if(!empty($data['tgl_akhir'])){
		$this->db->where('tgl <=',$data['tgl_akhir']);
	}
	$transakasi = $this->db->get('transaksi');
	$hasil_transaksi = $transakasi->result();
	$no = 1;
	foreach($hasil_transaksi as $daftar){
?>
<tr>
				<td><?php echo $no ?></td>
				<td><?php echo$daftar->id?></td>
				<td><?php echo$daftar->id_pel?></td>
				<td><?php echo$daftar->tgl?></td>
				<td><?php echo$daftar->stand_lalu?></td>
				<td><?php echo$daftar->stand_kini?></td>
				<td><?php echo$daftar->pemakaian?></td>
				<td><?php echo$daftar->foto?></td>
				<td><?php echo$daftar->keterangan ?></td>
			</tr>
<?php $no++; } ?>