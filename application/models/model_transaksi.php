<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_transaksi extends CI_Model{

  public function v_transaksi(){
$rr = $this->db->query("SELECT t.id, pel.id_pel, t.stand_lalu, t.stand_kini, t.pemakaian, t.foto, t.keterangan FROM transaksi AS t
JOIN pelanggan AS pel ON t.id_pel = pel.id_pel");
    // $aa=$this->db->query("select a.id_transaksi, a.id_pegawai, a.id_pelanggan,a.tanggal_transaksi, (a.meteran-b.meteran)*10000 as tagihan, a.meteran from transaksi a,
    //  (SELECT id_pelanggan, meteran FROM `transaksi` WHERE month(tanggal_transaksi)=month(now())-1) as b where a.id_pelanggan=b.id_pelanggan");
    // return $aa;
  }

  public function sumPemakaian(){
    //return sum pemakaian bulan ini
    
  return $this->db->query("SELECT SUM(pemakaian) as total from transaksi where MONTH(tgl)=MONTH(NOW())");
    // return $row;
  }

  public function all_transaksi(){
    $tgl = date("Y-m");
    $this->db->like('tgl',$tgl,'right');
    $this->db->order_by('pemakaian','desc');
    $rr = $this->db->get('transaksi');
   # $rr=$this->db->query("select * from transaksi order by pemakaian desc where tgl = '$tgl'");
    return $rr;
  }

  public function stand(){

    $stand_kini (($stand_kini-$tgl)-$stand_kini);
  }

  public function hapus($id){
    $this->db->query("delete from transaksi where id='".$id."'");
  }

  public function getById($Id){
    return $this->db->query("select * from transaksi where id='$Id'");
  }

  public function insert($data){
    // $id_pegawai=$this->input->post('id_pegawai');
    // $nama=$this->input->post('nama');
    // $alamat=$this->input->post('alamat');
    // $no_telp=$this->input->post('no_telp');
    // $jenis_pegawai=$this->input->post('jenis_pegawai');
    // $email=$this->input->post('email');
    // $password=$this->input->post('password');
    // $jenis_kelamin=$this->input->post('jenis_kelamin');
    // $tanggal_lahir=$this->input->post('tanggal_lahir');
    // $status=$this->input->post('status');
    // $cek=$this->db->query("insert into pegawai values('$id_pegawai', '$nama', '$alamat', '$no_telp', '$jenis_pegawai', '$email', '$password', '$jenis_kelamin', '$tanggal_lahir', '$status'");
    $this->db->insert('transaksi', $data);

  }

  public function pemakaian($id, $stand_lalu, $stand_kini){
    $this->db->where('id_pel', $id);
    $this->db->select('stand_lalu, stand_kini');
    $this->db->from('transaksi');
    $row = $this->db->get()->num_rows();

    $pemakaian = ($stand_kini - $stand_lalu);
    return $pemakaian;
  }

  public function pelanggan(){
    $pelanggan = $this->db->get('pelanggan');
    $hasil_pelanggan = $pelanggan->result();
    return $hasil_pelanggan;
  }

  

  // public function update($id, $data){
		// 	// $kode_pegawai=$this->input->post('id_pegawai');
		// 	// $nama=$this->input->post('nama');
		// 	// $alamat=$this->input->post('alamat');
		// 	// $no_telp=$this->input->post('no_telp');
		// 	// $jenis_karyawan=$this->input->post('jenis_pegawai');
		// 	// $email=$this->input->post('email');
		// 	// $password=$this->input->post('password');
		// 	// $jenis_kelamin=$this->input->post('jenis_kelamin');
		// 	// $tanggal_lahir=$this->input->post('tanggal_lahir');
  //     // $status=$this->input->post('status');
		// 	// $cek=$this->db->query("update pegawai set id_pegawai='$id_pegawai', nama='$nama', alamat='$alamat', no_telp='$no_telp', jenis_karyawan='$jenis_karyawan', email='$email', password='$password', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', status='$status' where id_pegawai='$id'");
  //     $this->db->where('id_transaksi', $id);
  //     $this->db->update('transaksi', $data);
  //     return $cek;
  //   }

  //   public function simpan_transaksi($data){
  // 		$this->db->query("insert into transaksi (id_transaksi, id_pegawai, id_pelanggan, tanggal_transaksi, tagihan, denda, tgl_batasbayar, meteran) values ('$data[id_transaksi]', '$data[id_pegawai]', '$data[id_pelanggan]', '$data[tanggal_transaksi]', '$data[tagihan]', '$data[denda]', '$data[tgl_batasbayar]', '$data[meteran]')");

  // 			// values ('".$data["id_pegawai"]."','".$data["nama"]."', '".$data["alamat"]."', '".$data["no_telp"]."', '".$data["jenis_karyawan"]."', '".$data["email"]."', '".$data["password"]."', '".$data["jenis_kelamin"]."', '".$data["tanggal_lahir"]"','".$data["status"]"';
  // 	}

  // public function hitung_denda($id, $date2){   // tanggal terakhir pembayaran seorang pelanggan
  //
  //   // cek apakah sudah ada transaksi sebelumnya
  //   $this->db->where('id_pelanggan', $id);
  //   $this->db->select('tanggal_transaksi');
  //   $this->db->from('transaksi');
  //   $row = $this->db->get()->num_rows();
  //
  //   if ( $row >= 1 ) {
  //     $tgl_maks = $this->db->query("SELECT MAX(tanggal_transaksi) AS tgl_maks FROM transaksi WHERE id_pelanggan = '$id'")->row()->tgl_maks;
  //   }
  //   else{
  //     $tgl_maks = $this->db->query("SELECT tgl_registrasi AS tgl_maks FROM pelanggan WHERE id_pelanggan = '$id'")->row()->tgl_maks;
  //   }
  //   // ubah tanggal terakhir bayar. hari = 20
  //   $tgl_ = explode("-", $tgl_maks);
  //   $tgl_[2] = 20;
  //   $tgl_maks = implode("-", $tgl_);
  //
  //
  //   // ambil bulan depan
  //   $tgl_depan = $this->db->query("SELECT DATE_ADD('$tgl_maks', INTERVAL 1 MONTH) AS tgl1")->row()->tgl1;
  //   // echo $tgl_depan;
  //
  //   // tgl selisih seharusnya yang tidak telat
  //   $tgl_telat = $this->db->query("SELECT DATEDIFF('$tgl_depan', '$tgl_maks') AS tgl")->row()->tgl;
  //   // echo $tgl_telat;
  //
  //   // kurangkan tanggal maks dan sekarang
  //   $tgl2 = $this->db->query("SELECT DATEDIFF('$date2', '$tgl_maks') AS tgl2")->row()->tgl2;
  //   // echo " - ".$tgl2;
  //
  //   // selisih untuk denda
  //   $denda = ($tgl2 - $tgl_telat)*10000;
  //   if ($denda > 0) {
  //     return $denda;
  //   }
  //   else{
  //     return 0;
  //   }
  // }

}
