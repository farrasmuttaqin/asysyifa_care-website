<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cart_model');
		$this->load->model('Product_model');
		error_reporting(E_ERROR|E_PARSE);
		if ($_SESSION["email"]==""){
            header("Location: ".base_url());
        }
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
		$data["data_All"] = $this->Product_model->getAll("tb_products")->result();
		$this->load->view('v_cart',$data);
	}

	public function tambah()
	{
		$where = array(
			'id_user' => $_SESSION["id_user"],
			'nomor_invoice' => 101,
			'id_product' => $this->uri->segment(3)
		);

		$this->Cart_model->plus($where);
		redirect(base_url('cart/'));
	}

	public function kurang()
	{
		$where = array(
			'id_user' => $_SESSION["id_user"],
			'nomor_invoice' => 101,
			'id_product' => $this->uri->segment(3)
		);

		$this->Cart_model->minus($where);
		redirect(base_url('cart/'));
	}

	public function delete()
	{
		$where = array(
			'id_user' => $_SESSION["id_user"],
			'nomor_invoice' => 101,
			'id_product' => $this->uri->segment(3)
		);

		$this->Cart_model->delete($where);
		redirect(base_url('cart/'));
	}

	public function inputCart()
	{
		$id_user = $_SESSION["id_user"];
		$id_product = $this->input->post('id_product');
		$nomor_invoice = '101';
		$quantity = $this->input->post('quantity');
		$nama_product = $this->input->post('nama_product');
		$harga_product = $this->input->post('harga_product');
		$gambar_product = $this->input->post('gambar_product');
		$email = $_SESSION["email"];
		$save = array(
			'id_user' => $id_user,
			'id_product' => $id_product,
			'nomor_invoice' => $nomor_invoice,
			'quantity' => $quantity,
			'nama_product' => $nama_product,
			'harga_product' => $harga_product,
			'gambar_product' => $gambar_product,
			'email' => $email
		);

		if ($this->Cart_model->cartCheck($id_product)){
			$this->Cart_model->updateSame($id_product,$quantity);
			redirect(base_url('cart/'));
		}else{
			$this->Cart_model->insert($save);
			redirect(base_url('cart/'));
		}
	}
}
