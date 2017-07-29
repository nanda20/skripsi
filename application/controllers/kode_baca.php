<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kode_baca extends CI_Controller {

	public function __construct()
	{
			parent::__construct();

			$this->load->database();
			$this->load->helper(array("url","form" ));
			$this->load->model("model_kodebaca");
	}
	 function tambahdata(){
		// load view
		$data['title'] = 'Kode Baca - PLN';
		$data['header'] = '';
		$data['content'] = $this->load->view('isi_kode_baca', $data, true);
		$data['script'] = '';
		$this->load->view('template/header', $data);
		$this->load->view('template/left');
		$this->load->view('template/content');
		$this->load->view('template/footer');
    }
    public function insert(){
    	$data = $this->input->post();

        $this->model_kodebaca->insert($data);
        redirect('kode_baca/index');
    }

	public function index()
	{
		$rr["datanya"]=$this->model_kodebaca->all_kode_baca();
			// $this->load->view("pelanggan_baru",$qq);

			 // load view
		$data['title'] = 'Kode Baca - PLN';
		$data['header'] = '';
		$data['content'] = $this->load->view('lihat_kode_baca', $rr, true);
		$data['script'] = '';
		$this->load->view('template/header', $data);
		$this->load->view('template/left');
		$this->load->view('template/content');
		$this->load->view('template/footer');

		// $data['kode_baca'] = $this->model_kodebaca->sortingdata();

	}
	public function hapus()
	{
			$this->model_kodebaca->hapus($this->uri->segment(3));
			redirect("kode_baca/index","refresh");
	}
	public function isi_kode_baca()
	{
			$this->load->view("isi_kode_baca");
			 // load view
		$data['title'] = 'Kode Baca - PLN';
		$data['header'] = '';
		$data['content'] = $this->load->view('isi_kode_baca', $rr, true);
		$data['script'] = '';
		$this->load->view('template/header', $data);
		$this->load->view('template/left');
		$this->load->view('template/content');
		$this->load->view('template/footer');

	}
	public function simpan_kode_baca()
	{
			$dt["id"]=$this->input->post("id");
			$dt["kabupaten"]=$this->input->post(" kabupaten");
			$dt["kecamatan"]=$this->input->post("kecamatan");
			$dt["desa"]=$this->input->post("desa");
			$dt["baca_hari"]=$this->input->post("baca_hari");
			// $dt["long"]=$this->input->post("long");
			$dt["kode_baca"]=$this->input->post(array("kabupaten","kecamatan","desa"));
			$dt["status"]=$this->input->post("status");
			$this->model_pelanggan->menyimpan_kode_baca($dt);

			redirect ("kode_baca/index");
	}

	public function edit($id){
		$data['kode_baca']=$this->model_kodebaca->getById($id)->result();

		// load view
		$data['title'] = 'Kode Baca - PLN';
		$data['header'] = '';
		$data['content'] = $this->load->view('edit_kode_baca', $data, true);
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

		$this->model_kodebaca->update($data);

		redirect('kode_baca/index','refresh');
	}

	public function export2xls(){
		$this->load->library('Excel_generator');
		$query = $this->db->get('kode_baca');
        $this->excel_generator->set_query($query);
        $this->excel_generator->set_header(array('Id Pelanggan','No Pengajuan', 'No KTP', 'kabupaten', 'kecamatan', 'No Telepon', 'Jenis Pelanggan', 'Email', 'password', 'jenis_kelamin', 'tanggal_lahir', 'status'));
        $this->excel_generator->set_column(array('id_pelanggan','no_pengajuan', 'no_ktp', 'kabupaten', 'kecamatan', 'no_telp', 'jenis_pelanggan', 'email', 'password', 'jenis_kelamin', 'tanggal_lahir', 'status'));
        $this->excel_generator->set_width(array(15, 25, 30, 15, 15, 20, 20, 20, 20,20, 20, 20));
        $this->excel_generator->exportTo2007('Laporan Pelanggan');

	}

	public function laporan(){
		$data['kode_baca'] = $this->m_pelanggan->getAll();
		$this->load->view('laporan_pdam', $data);
	}


}
