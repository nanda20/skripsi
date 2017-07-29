<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
	{
			parent::__construct();

			$this->load->database();
			$this->load->helper(array("url","form" ));
			$this->load->model(array("model_pelanggan", "model_logpelanggan", "model_kodebaca"));
	}
	 function tambahdata(){
		// load view
		$data['title'] = 'Pelanggan - PLN';
		$data['header'] = '';
		$data['content'] = $this->load->view('isi_pelanggan', $data, true);
		$data['script'] = '';
		$this->load->view('template/header', $data);
		$this->load->view('template/left');
		$this->load->view('template/content');
		$this->load->view('template/footer');

    }
    public function insert(){
    	$data = $this->input->post();
// echo "<pre>";
// print_r($data);
        $this->model_pelanggan->insert($data);
        redirect('pelanggan/index');
    }

	public function index()
	{
		$rr["datanya"]=$this->model_pelanggan->all_pelanggan();
			// $this->load->view("pelanggan_baru",$qq);

			 // load view
		$data['title'] = 'Pelanggan - PLN';
		$data['header'] = '';
		$data['content'] = $this->load->view('lihat_pelanggan', $rr, true);
		$data['script'] = '';
		$this->load->view('template/header', $data);
		$this->load->view('template/left');
		$this->load->view('template/content');
		$this->load->view('template/footer');

	}
	public function hapus()
	{
		$data=$this->model_pelanggan->getById($this->uri->segment(3))->result();

		foreach ($data as $d) {
				$pelanggan["id_pel"] = $d->id_pel;
				$pelanggan["nama"] = $d->nama;
				$pelanggan["alamat"] = $d->alamat;
				$pelanggan["no_tiang"] = $d->no_tiang;
				$pelanggan["lat"] = $d->lat;
				$pelanggan["long"] = $d->long;
				$pelanggan["kode_baca"] = $d->kode_baca;
		}

		// echo "<pre>";
		// print_r($pelanggan);

		$this->model_pelanggan->insert_log($pelanggan);

			$this->model_pelanggan->hapus($this->uri->segment(3));
			redirect("pelanggan/index","refresh");

			// $data = $this->input->post();
			//
      //   $this->model_pelanggan->hapus($data);
      //   redirect('pelanggan/index');
	}
	public function isi_pelanggan()
	{
		$dt["kode_baca"]=$this->model_pelanggan->all_kodebaca();
			 // load view
		$data['title'] = 'Pelanggan - PLN';
		$data['header'] = '';
		$data['content'] = $this->load->view('isi_pelanggan', $dt, true);
		$data['script'] = '';
		$this->load->view('template/header', $data);
		$this->load->view('template/left');
		$this->load->view('template/content');
		$this->load->view('template/footer');

	}
	public function simpan_pelanggan()
	{
			$dt["id_pel"]=$this->input->post("id_pel");
			$dt["nama"]=$this->input->post(" nama");
			$dt["alamat"]=$this->input->post("alamat");
			$dt["no_tiang"]=$this->input->post("no_tiang");
			$dt["lat"]=$this->input->post("lat");
			$dt["long"]=$this->input->post("long");
			$dt["kode_baca"]=$this->input->post("kode_baca");
			$this->model_pelanggan->menyimpan_pelanggan($dt);

			redirect ("pelanggan/index");
	}

	public function edit($id){
		$data['pelanggan']=$this->model_pelanggan->getById($id)->result();

		// load view
		$data['title'] = 'Pelanggan - PLN';
		$data['header'] = '';
		$data['content'] = $this->load->view('edit_pelanggan', $data, true);
		$data['script'] = '';
		$this->load->view('template/header', $data);
		$this->load->view('template/left');
		$this->load->view('template/content');
		$this->load->view('template/footer');
		// if($this->input->post('submit')){
  //           $this->modele->update($id);
  //           redirect('pelanggan/index');
  //       }else{
  //       	$data['pelanggan']=$this->modele->getById($id)->result();

  //       	$this->load->view('edit_pelanggan',$data);
  //       }
	}

	public function update(){
		$data = $this->input->post();

		$this->model_pelanggan->update($data);

		redirect('pelanggan/index','refresh');
	}

	public function export2xls(){
		$this->load->library('Excel_generator');
		$query = $this->db->get('pelanggan');
        $this->excel_generator->set_query($query);
        $this->excel_generator->set_header(array('Id Pelanggan','No Pengajuan', 'No KTP', 'Nama', 'Alamat', 'No Telepon', 'Jenis Pelanggan', 'Email', 'password', 'jenis_kelamin', 'tanggal_lahir', 'status'));
        $this->excel_generator->set_column(array('id_pelanggan','no_pengajuan', 'no_ktp', 'nama', 'alamat', 'no_telp', 'jenis_pelanggan', 'email', 'password', 'jenis_kelamin', 'tanggal_lahir', 'status'));
        $this->excel_generator->set_width(array(15, 25, 30, 15, 15, 20, 20, 20, 20,20, 20, 20));
        $this->excel_generator->exportTo2007('Laporan Pelanggan');

	}

	public function laporan(){
		$data['pelanggan'] = $this->m_pelanggan->getAll();
		$this->load->view('laporan_pdam', $data);
	}


}
