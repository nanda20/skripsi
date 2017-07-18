<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_login extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function select_by($username, $password){
    $this->db->where("username", $username);
    $this->db->where("password", $password);
    $query = $this->db->get('login');
    return $query->num_rows();
  }

}
