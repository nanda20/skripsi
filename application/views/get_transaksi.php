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

$i=1;
foreach ($hasil_transaksi as $daftar) {
	echo"<tr>
	<td>".$i."</td>
	<td>".$daftar->id."</td>
	<td>".$daftar->id_pel."</td>
	<td>".$daftar->tgl."</td>
	<td>".$daftar->stand_lalu."</td>
	<td>".$daftar->stand_kini."</td>
	<td>".$daftar->pemakaian."</td>
	<td> <img style='height:100px;width:auto;' src=".base_url().'upload/'.$daftar->foto." /></td>
	<td>".$daftar->keterangan."</td>
	</tr>";
	$i++;
}
?>
