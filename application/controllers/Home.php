<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cart_model');
		$this->load->model('Product_model');
		$this->load->model('Paper_model');
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
		$data["best_product"] = $this->Product_model->getBest()->result();
		$data["blog"]=$this->Paper_model->getAllBlogThree()->result();
		$data["recent"]=$this->Paper_model->recentPost()->result();
		$this->load->view('index',$data);
	}
}