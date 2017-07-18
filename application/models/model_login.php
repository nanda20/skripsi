<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model{

  public function all_login(){

    $rr=$this->db->query("select * from login");
    return $rr;
  }

  public function hapus($id){
    $this->db->query("delete from login where id='".$id."'");
  }

  public function getById($Id){
    return $this->db->query("select * from login where id='$Id'");
  }

  public function insert($data){
    $id=$this->input->post('id');
    $username=$this->input->post('username');
    $password=md5($this->input->post('password'));
    $nama=$this->input->post('nama');
    $jabatan=$this->input->post('jabatan');
    //$cek=$this->db->query("insert into login values('$id','$username', '$password', '$nama', '$jabatan');
     $this->db->insert('login', array('id'=>$id, 'username'=>$username, 'password'=>$password, 'nama'=>$nama, 'jabatan'=>$jabatan));
    return $cek;
  }


    public function simpan_login($data){
  		$this->db->query("insert into login (id, username, password, nama, jabatan) values ('$data[id]', '$data[username]', $data[password]', '$data[nama]', '$data[jabatan]')");

  			// values ('".$data["id_pegawai"]."','".$data["nama"]."', '".$data["alamat"]."', '".$data["no_telp"]."', '".$data["jenis_karyawan"]."', '".$data["email"]."', '".$data["password"]."', '".$data["jenis_kelamin"]."', '".$data["tanggal_lahir"]"','".$data["status"]"';
  	}
}
