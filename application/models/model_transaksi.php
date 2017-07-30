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

  // public function pemakaian_kwh($id, $stand_lalu, $stand_kini){
  //   $this->db->query("select SUM(pemakaian) AS saving_pemakaian from transaksi group by month(now)");

  public function pelanggan(){
    $pelanggan = $this->db->get('pelanggan');
    $hasil_pelanggan = $pelanggan->result();
    return $hasil_pelanggan;
  }

  public function api_transaksi($data){
    // return $data;
   $sql_stand_lalu= $this->db->query("SELECT stand_kini FROM transaksi WHERE id_pel=".$data['id_pel']." and MONTH(tgl)=(MONTH(NOW())-1)")->result();
   // return $sql_stand_lalu;
   
   $stand_lalu = $sql_stand_lalu[0]->stand_kini;

  $pemakaian = $data['stand_kini']-$stand_lalu;

   

  $value=array(
    'id'=>null,
    'id_pel'=>$data['id_pel'],
    'tgl'=>date("Y-m-d"),
    'stand_lalu'=>$stand_lalu,
    'stand_kini'=>$data['stand_kini'],
    'pemakaian'=>$pemakaian,
    'foto'=>$data['foto'],
    'keterangan'=>$data['kelainan']

    );
   return  $this->db->insert('transaksi', $value);
   // $sql_insert_transaksi= $this->db->query("INSERT INTO transaksi VALUES(NULL,".$data['id_pel'].",".$dateNow.",$stand_lalu,".$data['stand_kini'].",".$pemakaian.",'".$data['foto']."','".$data['kelainan']."')");



  }

}
