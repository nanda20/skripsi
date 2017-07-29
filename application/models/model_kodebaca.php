<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kodebaca extends CI_Model{

  public function all_kode_baca(){

    $rr=$this->db->query("select * from kode_baca where baca_hari");
    return $rr;
  }

  public function hapus($id){
    $this->db->query("delete from kode_baca where id='".$id."'");
  }

  public function getById($Id){
    return $this->db->query("select * from kode_baca where id='$Id'");
  }

  public function insert($data){
    $id=$this->input->post('id');
    $kabupaten=$this->input->post('kabupaten');
    $kecamatan=$this->input->post('kecamatan');
    $desa=$this->input->post('desa');
    $baca_hari=$this->input->post('baca_hari');
    $kode_baca=$this->input->post('kode_baca');
    $status=$this->input->post('status');
    // $jenis_kelamin=$this->input->post('jenis_kelamin');
    // $tanggal_lahir=$this->input->post('tanggal_lahir');
    // $status=$this->input->post('status');
   $this->db->insert('kode_baca', array('id'=>$id, 'kabupaten'=>$kabupaten, 'kecamatan'=>$kecamatan, 'desa'=>$desa, 'baca_hari'=>$baca_hari, 'kode_baca'=>$kabupaten.$kecamatan.$desa.$baca_hari, 'status'=>$status));
  return  $data;
  }

  // public function sortingdata($row){
  //   return $this->db->query("select baca_hari from kode_baca");
  //
  //   foreach ($query->result() as $row)
  //           {
  //               echo $row->baca_hari;
  //           }
  // }

  public function update($data){
			// $id=$this->input->post('id');
			// $kabupaten=$this->input->post('kabupaten');
			// $kecamatan=$this->input->post('kecamatan');
			// $desa=$this->input->post('desa');
			// $baca_hari=$this->input->post('baca_hari');
      // $hasil=$this->input->post('hasil');
			// // $cek=$this->db->query("update kode_baca set kabupaten='$kabupaten', kecamatan='$kecamatan', desa='$desa', baca_hari='$baca_hari', long='$long', kode_baca='$kode_baca' where id='$id'");
      // $this->db->where('id', $id);
      // $this->db->update('kode_baca', array('id'=>$id, 'kabupaten'=>$kabupaten, 'kecamatan'=>$kecamatan, 'desa'=>$desa, 'baca_hari'=>$baca_hari, 'hasil'=>$hasil));
      // // return $cek;
      $this->db->update('kode_baca', $data);
      // return $cek;
    }

    public function simpan_kode_baca($data){
  		$this->db->query("insert into kode_baca (id, kabupaten, kecamatan, desa, baca_hari) values ('$data[id]', '$data[kabupaten]', '$data[kecamatan]', $data[desa]', '$data[baca_hari]', '$data array([kabupaten.kecamatan.desa.baca_hari])')");

  			// values ('".$data["id_pegawai"]."','".$data["kabupaten"]."', '".$data["kecamatan"]."', '".$data["no_telp"]."', '".$data["jenis_karyawan"]."', '".$data["email"]."', '".$data["password"]."', '".$data["jenis_kelamin"]."', '".$data["tanggal_lahir"]"','".$data["status"]"';
  	}
}
