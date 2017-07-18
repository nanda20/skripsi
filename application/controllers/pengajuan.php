<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	public function __construct()
	{
			parent::__construct();

			$this->load->database();
			$this->load->helper(array("url","form" ));
			$this->load->model("model_pengajuan");
	}
	 function tambahdata(){
		// load view
		$data['title'] = 'pengajuan - PLN';
		$data['header'] = '';
		$data['content'] = $this->load->view('isi_pengajuan', $data, true);
		$data['script'] = '';
		$this->load->view('template/header', $data);
		$this->load->view('template/left');
		$this->load->view('template/content');
		$this->load->view('template/footer');

    }
    public function insert(){
    	$data = $this->input->post();

        $this->model_pengajuan->insert($data);
        redirect('pengajuan/index');
    }

	public function index()
	{
		$rr["datanya"]=$this->model_pengajuan->all_pengajuan();
			// $this->load->view("pengajuan_baru",$qq);

			 // load view
		$data['title'] = 'pengajuan - PLN';
		$data['header'] = '';
		$data['content'] = $this->load->view('lihat_pengajuan', $rr, true);
		$data['script'] = '';
		$this->load->view('template/header', $data);
		$this->load->view('template/left');
		$this->load->view('template/content');
		$this->load->view('template/footer');

	}
	public function hapus()
	{
			$this->model_pengajuan->hapus($this->uri->segment(3));
			redirect("pengajuan/index","refresh");
	}
	public function isi_pengajuan()
	{
			$this->load->view("isi_pengajuan");
			 // load view
		$data['title'] = 'pengajuan - PLN';
		$data['header'] = '';
		$data['content'] = $this->load->view('isi_pengajuan', $rr, true);
		$data['script'] = '';
		$this->load->view('template/header', $data);
		$this->load->view('template/left');
		$this->load->view('template/content');
		$this->load->view('template/footer');

	}
	public function simpan_pengajuan()
	{
			$dt["id_pel"]=$this->input->post("id_pel");
			$dt["alamat"]=$this->input->post("alamat");
			$dt["no_tiang"]=$this->input->post("no_tiang");
			$dt["lat"]=$this->input->post("lat");
			$dt["long"]=$this->input->post("long");
			$dt["kode_baca"]=$this->input->post("kode_baca");
			$this->model_pengajuan->menyimpan_pengajuan($dt);

			redirect ("pengajuan/index");
	}

	public function edit($id){
		$data['pengajuan']=$this->model_pengajuan->getById($id)->result();

		// load view
		$data['title'] = 'pengajuan - PLN';
		$data['header'] = '';
		$data['content'] = $this->load->view('edit_pengajuan', $data, true);
		$data['script'] = '';
		$this->load->view('template/header', $data);
		$this->load->view('template/left');
		$this->load->view('template/content');
		$this->load->view('template/footer');
		// if($this->input->post('submit')){
  //           $this->modele->update($id);
  //           redirect('pengajuan/index');
  //       }else{
  //       	$data['pengajuan']=$this->modele->getById($id)->result();

  //       	$this->load->view('edit_pengajuan',$data);
  //       }
	}

	public function update(){
		$data = $this->input->post();

		$this->model_pengajuan->update($data);

		redirect('pengajuan/index','refresh');
	}

	public function export2xls(){
		$this->load->library('Excel_generator');
		$query = $this->db->get('pengajuan');
        $this->excel_generator->set_query($query);
        $this->excel_generator->set_header(array('Id pengajuan','No Pengajuan', 'No KTP', 'Nama', 'Alamat', 'No Telepon', 'Jenis pengajuan', 'Email', 'password', 'jenis_kelamin', 'tanggal_lahir', 'status'));
        $this->excel_generator->set_column(array('id_pengajuan','no_pengajuan', 'no_ktp', 'nama', 'alamat', 'no_telp', 'jenis_pengajuan', 'email', 'password', 'jenis_kelamin', 'tanggal_lahir', 'status'));
        $this->excel_generator->set_width(array(15, 25, 30, 15, 15, 20, 20, 20, 20,20, 20, 20));
        $this->excel_generator->exportTo2007('Laporan pengajuan');

	}

	public function laporan(){
		$data['pengajuan'] = $this->m_pengajuan->getAll();
		$this->load->view('laporan_pdam', $data);
	}


}
