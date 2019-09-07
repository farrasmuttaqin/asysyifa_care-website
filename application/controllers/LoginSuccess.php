<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginSuccess extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cart_model');
		error_reporting(E_ERROR|E_PARSE);
	}
	
	public function index()
	{
		$where = array(
			'id_user' => $_SESSION["id_user"],
			'nomor_invoice' => 101
		);
		$whereCheck = array(
			'id_user' => $_SESSION["id_user"],
			'status_pembayaran' => 'Belum Dibayar'
		);
		$data["pemesanan"]=$this->Cart_model->getPembayaran($whereCheck)->result();

		$data["cart"]=$this->Cart_model->getCart($where)->result();
		$data["loginSukses"]=1;
		$this->load->view('index',$data);
	}
}
