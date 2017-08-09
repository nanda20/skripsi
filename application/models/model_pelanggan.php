<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pelanggan extends CI_Model{

  public function all_pelanggan(){
  
    $rr =$this->db->query("select * from pelanggan");
    return $rr;
  }

  public function all_kodebaca(){
    $rr = $this->db->query("SELECT pel.id_pel, pel.nama, pel.alamat, pel.no_tiang, pel.lat, pel.long, kb.kode_baca FROM pelanggan AS pel
    JOIN kode_baca AS kb ON pel.kode_baca = kb.kode_baca");
    return $rr;
}

  public function hapus($id_pel){
    $this->db->query("delete from pelanggan where id_pel='".$id_pel."'");
  }

  public function getById($Id){
    return $this->db->query("select * from pelanggan where id_pel='$Id'");
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
    $this->db->insert('pelanggan', $data);
    return $cek;
  }

  public function insert_log($data){
    $this->db->insert('log_pelanggan', $data);
  }


  public function update($id){
			$id_pel=$this->input->post('id_pel');
			$nama=$this->input->post('nama');
			$alamat=$this->input->post('alamat');
			$no_tiang=$this->input->post('no_tiang');
			$lat=$this->input->post('lat');
			$long=$this->input->post('long');
			$kode_baca=$this->input->post('kode_baca');
			// $cek=$this->db->query("update pelanggan set nama='$nama', alamat='$alamat', no_tiang='$no_tiang', lat='$lat', long='$long', kode_baca='$kode_baca' where id_pel='$id_pel'");
      $this->db->where('id_pel', $id_pel);
      $this->db->update('pelanggan', array('id_pel'=>$id_pel, 'nama'=>$nama, 'alamat'=>$alamat, 'no_tiang'=>$no_tiang, 'lat'=>$lat, 'long'=>$long, 'kode_baca'=>$kode_baca));
      // return $cek;
    }

    public function simpan_pelanggan($data){
  		$this->db->query("insert into pelanggan (id_pel, nama, alamat, no_tiang, lat, long, kode_baca) values ('$data[id_pel]', '$data[nama]', '$data[alamat]', $data[no_tiang]', '$data[lat]', '$data[long]', '$data[kode_baca]')");

  			// values ('".$data["id_pegawai"]."','".$data["nama"]."', '".$data["alamat"]."', '".$data["no_telp"]."', '".$data["jenis_karyawan"]."', '".$data["email"]."', '".$data["password"]."', '".$data["jenis_kelamin"]."', '".$data["tanggal_lahir"]"','".$data["status"]"';
  	}


    //---------------------QUERY FOR API---------------------------------

    public function api_pelanggan(){
  
    $rr =$this->db->query("select * from pelanggan where tanggal_baca=DATE(NOW())");
    return $rr;
  }

}
