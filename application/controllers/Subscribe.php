<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_model');
	}
	
	public function index()
	{
		$email = $this->input->post('email');
		if ($email == ""){
			redirect(base_url());
		}

		$save = array(
			'email' => $email
		);
		$this->Profile_model->input("tb_subscribe",$save);
		redirect(base_url());
	}

	public function contact()
	{
		$nama = $this->input->post('name');
		$email = $this->input->post('email');
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');

		if ($email == ""){
			redirect(base_url());
		}

		$save = array(
			'nama' => $nama,
			'email' => $email,
			'subject' => $subject,
			'message' => $message
		);

		$this->Profile_model->input("tb_contact",$save);
		redirect(base_url());
	}
}