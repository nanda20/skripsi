<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->load->database();
    $this->load->helper(array("url","form"));
    $this->load->model("Model_transaksi");
    $this->load->library('pagination');


  }

  function tambahdata(){
    // model
    // $this->load->model("model_transaksi");

    // data
     $data["pelanggan"]=$this->Model_transaksi->pelanggan();

    // load view
    $data['title'] = 'Transaksi - PLN';
    $data['header'] = '';
    $data['content'] = $this->load->view('isi_transaksi', $data, true);
    $data['script'] = '';
    $this->load->view('template/header', $data);
    $this->load->view('template/left');
    $this->load->view('template/content');
    $this->load->view('template/footer');
  }

  /*public function insert(){
    $data = $this->input->post();

    $data['pemakaian'] = $this->Model_transaksi->pemakaian( $data['id_pel'], $data['stand_lalu'], $data['stand_kini'] );

    // proses insert data
    $this->Model_transaksi->insert($data);

    redirect('transaksi/index');
}*/

public function insert(){
    #$data = $this->input->post();
    $id_pel = $this->input->post('id_pel');
    $stand_lalu = $this->input->post('stand_lalu');
    $stand_kini = $this->input->post('stand_kini');

    $data['pemakaian'] = $this->Model_transaksi->pemakaian( $id_pel, $stand_lalu, $stand_kini);
    $filename = substr(date("Y"),2,4).date("mdHis");
    // proses insert data
    if(!empty($_FILES['foto']['tmp_name'])){
        move_uploaded_file(
            $_FILES['foto']['tmp_name'],
            './upload/'.'foto_'.$filename.'.'.pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION)
            );
       $data['foto'] = 'foto_'.$filename.'.'.pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    }
    $data['id_pel'] = $id_pel;
    $data['stand_lalu'] = $stand_lalu;
    $data['stand_kini'] = $stand_kini;
    $data['tgl'] = $this->input->post('tgl');;
    $data['keterangan'] = $this->input->post('keterangan');

    $this->Model_transaksi->insert($data);

    redirect('transaksi/index');
}

    public function index()
  	{
  		$rr["datanya"]=$this->Model_transaksi->all_transaksi();
  			// $this->load->view("pelanggan_baru",$qq);

  			 // load view
  		$data['title'] = 'Transaksi - PLN';
  		$data['header'] = '';
  		$data['content'] = $this->load->view('lihat_transaksi', $rr, true, array('error' => ' '));
  		$data['script'] = '';
  		$this->load->view('template/header', $data);
  		$this->load->view('template/left');
  		$this->load->view('template/content');
  		$this->load->view('template/footer');

      $config['base_url'] = 'http://localhost:8081/manajemen_pelanggan/transaksi/index';
      $config['total_rows'] = 200;
      $config['per_page'] = 20;

      $this->pagination->initialize($config);


}



    public function hapus()
  	{
  			$this->Model_transaksi->hapus($this->uri->segment(3));
  			redirect("transaksi/index","refresh");
  	}

    public function isi_transaksi()
  	{
  			$this->load->view("isi_transaksi");
  			 // load view
  		$data['title'] = 'Transaksi - PLN';
  		$data['header'] = '';
  		$data['content'] = $this->load->view('isi_transaksi', $rr, true);
  		$data['script'] = '';
  		$this->load->view('template/header', $data);
  		$this->load->view('template/left');
  		$this->load->view('template/content');
  		$this->load->view('template/footer');

  	}
  	public function simpan_transaksi()
  	{
        $dt["id"]=$this->input->post("id");
  			$dt["id_pel"]=$this->input->post("id_pel");
  			$dt["stand_lalu"]=$this->input->post("stand_lalu");
  			$dt["stand_kini"]=$this->input->post("stand_kini");
  			$dt["pemakaian"]=$this->input->post("pemakaian");
  			$dt["foto"]=$this->input->post("foto");
  			$dt["keterangan"]=$this->input->post("keterangan");
  			$this->model_transaksi->menyimpan_transaksi($dt);

  			redirect ("transaksi/index");
  	}

    public function aksi_upload(){
  		$config['upload_path']          = '.assets/gambar/';
  		$config['allowed_types']        = 'gif|jpg|png';
  		$config['max_size']             = 10000;
  		$config['max_width']            = 5000;
  		$config['max_height']           = 5000;

      $this->load->library('upload', $config);

      if ( ! $this->upload->aksi_upload('foto'))
      {
        echo "Berhasil";
      }
      else
      {
        echo "Gagal";
  	}

    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";

  }

  public function get_stand(){
    $data = $this->input->post();
    $bulan = date('m', strtotime(date('Y-m-d') . '- 1 month '));
    $tgl = date('Y-').$bulan;
    $this->db->like('tgl',$tgl,'both');
    $pelanggan = $this->db->get_where('transaksi',array('id_pel'=>$data['id_pel']));
    $hasil_pelanggan = $pelanggan->row();
    $jumlah = count($hasil_pelanggan);
    if($jumlah > 0){
      echo $hasil_pelanggan->stand_kini;
    }else{
      echo "0";
    }
  }

  public function get_transaksi(){
    $this->load->view('get_transaksi');
  }

  // public function index(){
  //   $aa["datanya"]=$this->Model_transaksi->v_transaksi();

  //    // load view
  //   $data['title'] = 'Transaksi - PDAM';
  //   $data['header'] = '';
  //   $data['content'] = $this->load->view('lihat_transaksi', $aa, true);
  //   $data['script'] = '';
  //   $this->load->view('template/header', $data);
  //   $this->load->view('template/left');
  //   $this->load->view('template/content');
  //   $this->load->view('template/footer');
  // }

  // public function hapus(){
  //   $this->Model_transaksi->hapus($this->uri->segment(3));
  //   redirect("transaksi/index","refresh");
  // }

  // public function isi_pegawai(){
  //   $this->load->view("isi_transaksi");
  // }

  // public function simpan_transaksi(){
  //   $dt["id_transaksi"]=$this->input->post("id_transaksi");
  //   $dt["id_pegawai"]=$this->input->post("id_pegawai");
  //   $dt["id_pelanggan"]=$this->input->post("id_pelanggan");
  //   $dt["tanggal_transaksi"]=$this->input->post("tanggal_transaksi");
  //   $dt["tagihan"]=$this->input->post("tagihan");
  //   $dt["denda"]=$this->input->post("denda");
  //   $dt["meteran"]=$this->input->post("meteran");
  //   $this->Model_transaksi->simpan_transaksi($dt);

  //   redirect ("transaksi/index");
  // }

  // public function edit($id){
  //   if($this->input->post('submit')){
  //     $this->Model_transaksi->update($id);
  //     redirect('transaksi/index');
  //   }else{
  //     $data['transaksi']=$this->Model_transaksi->getById($id)->result();

  //     $this->load->view('edit_transaksi',$data);
  //   }
  // }

  // function update(){
  //   $id=$this->input->post('id_transaksi_hidden');
  //   $id=$this->input->post('id_pegawai_hidden');
  //   $id=$this->input->post('id_pelanggan_hidden');
  //   $data['tanggal_transaksi']=$this->input->post('tanggal_transaksi');
  //   $data['tagihan']=$this->input->post('tagihan');
  //   $data['denda']=$this->input->post('denda');
  //   $data['meteran']=$this->input->post('meteran');
  //   $this->Model_transaksi->update($id, $data);
  //   redirect('transaksi/index');
  // }
  // public function export2xls(){
  //   $this->load->library('Excel_generator');
  //   $query = $this->db->get('transaksi');
  //       $this->excel_generator->set_query($query);
  //       $this->excel_generator->set_header(array('Id Transaksi','Id Pegawai', 'Id Pelanggan', 'Tanggal Transaksi', 'Tagihan', 'Denda', 'Meteran'));
  //       $this->excel_generator->set_column(array('id_transaksi','id_pegawai', 'id_pelanggan', 'tanggal_transaksi', 'tagihan', 'denda', 'meteran'));
  //       $this->excel_generator->set_width(array(25, 25, 30, 25, 25, 20, 20));
  //       $this->excel_generator->exportTo2007('Laporan Transaksi');
  //     }
  //
  // public function laporan(){
  //   $data['pelanggan'] = $this->m_transaksi->getAll();
  //   $this->load->view('laporan_pdam', $data);
  // }
}
