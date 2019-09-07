<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('loginAdmin_model');
		error_reporting(E_ERROR|E_PARSE);
		if (!$_SESSION["nama_lengkap_admin"]==""){
            $tampung = base_url()."Admin_Dashboard/";
            header("Location: $tampung");
        }
	}
	
	public function index()
	{
		$this->load->view('admin/a_login');
    }
    
    public function loginAction()
	{
		$email = $this->input->post('username');
		$password = $this->input->post('pass');

		$where = array(
			'username' => $email,
			'pass' => md5($password)
        );
        
		$cek = $this->loginAdmin_model->loginCheck("tb_admin",$where)->num_rows();

		if($cek > 0) {
            $data["data_userTrue"] = $this->loginAdmin_model->loginCheck("tb_admin",$where)->result();
            $this->load->view('admin/a_inputSession', $data);
		} else {
			$data["tampungLogin"] = 99;
			$this->load->view('admin/a_login', $data);
		}
    }
    
}
