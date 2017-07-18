<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user extends CI_Controller {

	public function __construct()
	{
			parent::__construct();

			$this->load->database();
			$this->load->helper(array("url","form" ));
			$this->load->model("model_login");
	}
	 function tambahdata(){
		// load view
		$data['title'] = 'User Login - PLN';
		$data['header'] = '';
		$data['content'] = $this->load->view('isi_login', $data, true);
		$data['script'] = '';
		$this->load->view('template/header', $data);
		$this->load->view('template/left');
		$this->load->view('template/content');
		$this->load->view('template/footer');

    }
    public function insert(){
    	$data = $this->input->post();

        $this->model_login->insert($data);
        redirect('login_user/index');
    }

	public function index()
	{
		$rr["datanya"]=$this->model_login->all_login();
			// $this->load->view("pelanggan_baru",$qq);

			 // load view
		$data['title'] = 'User Login - PLN';
		$data['header'] = '';
		$data['content'] = $this->load->view('lihat_login', $rr, true);
		$data['script'] = '';
		$this->load->view('template/header', $data);
		$this->load->view('template/left');
		$this->load->view('template/content');
		$this->load->view('template/footer');

	}

	public function hapus()
	{
			$this->model_login->hapus($this->uri->segment(3));
			redirect("login_user/index","refresh");
	}
	public function isi_pelanggan()
	{
			$this->load->view("isi_login");
			 // load view
		$data['title'] = 'User Login - PLN';
		$data['header'] = '';
		$data['content'] = $this->load->view('isi_login', $rr, true);
		$data['script'] = '';
		$this->load->view('template/header', $data);
		$this->load->view('template/left');
		$this->load->view('template/content');
		$this->load->view('template/footer');

	}
	public function simpan_pelanggan()
	{
			$dt["id"]=$this->input->post("id");
			$dt["username"]=$this->input->post("username");
			$dt["password"]=$this->input->post("password");
			$dt["nama"]=$this->input->post("nama");
			$dt["jabatan"]=$this->input->post("jabatan");
			$this->model_login->menyimpan_login($dt);

			redirect ("login_user/index");
	}

	public function edit($id){
		$data['login']=$this->model_login->getById($id)->result();

		// load view
		$data['title'] = 'User Login - PLN';
		$data['header'] = '';
		$data['content'] = $this->load->view('edit_login', $data, true);
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

		$this->model_login->update($data);

		redirect('login_user/index','refresh');
	}



}
