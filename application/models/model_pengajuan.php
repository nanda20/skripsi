<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pengajuan extends CI_Model{

  public function all_pengajuan(){

    $rr=$this->db->query("select * from pengajuan");
    return $rr;
  }

  public function hapus($id_pel){
    $this->db->query("delete from pengajuan where id='".$id."'");
  }

  public function getById($Id){
    return $this->db->query("select * from pengajuan where id='$Id'");
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
    $this->db->insert('pengajuan', $data);
    return $cek;
  }

  public function update($id, $data){
			// $kode_pegawai=$this->input->post('id_pegawai');
			// $nama=$this->input->post('nama');
			// $alamat=$this->input->post('alamat');
			// $no_telp=$this->input->post('no_telp');
			// $jenis_karyawan=$this->input->post('jenis_pegawai');
			// $email=$this->input->post('email');
			// $password=$this->input->post('password');
			// $jenis_kelamin=$this->input->post('jenis_kelamin');
			// $tanggal_lahir=$this->input->post('tanggal_lahir');
      // $status=$this->input->post('status');
			// $cek=$this->db->query("update pegawai set id_pegawai='$id_pegawai', nama='$nama', alamat='$alamat', no_telp='$no_telp', jenis_karyawan='$jenis_karyawan', email='$email', password='$password', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', status='$status' where id_pegawai='$id'");
      $this->db->where('id_pel', $id);
      $this->db->update('pengajuan', $data);
      return $cek;
    }

    public function simpan_pengajuan($data){
  		$this->db->query("insert into pengajuan (id_pel, alamat, no_tiang, lat, long, kode_baca) values ('$data[id_pel]', '$data[alamat]', $data[no_tiang]', '$data[lat]', '$data[long]', '$data[kode_baca]')");

  			// values ('".$data["id_pegawai"]."','".$data["nama"]."', '".$data["alamat"]."', '".$data["no_telp"]."', '".$data["jenis_karyawan"]."', '".$data["email"]."', '".$data["password"]."', '".$data["jenis_kelamin"]."', '".$data["tanggal_lahir"]"','".$data["status"]"';
  	}
}
