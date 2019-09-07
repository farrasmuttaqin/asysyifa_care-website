<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

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
		$data["article"]=$this->Paper_model->getAllArticle()->result();
		$this->load->view('v_article',$data);
	}

	public function detailArticle()
	{
		$id_article=$this->uri->segment(3);

		$whereArticle = array(
			'id_paper' => $id_article,
			'jenis' => 'Article'
		);
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
		$data["article"]=$this->Paper_model->getSelectArticle($whereArticle)->result();
		$data["recent"]=$this->Paper_model->recentPost()->result();
		$data["tags"]=$this->Paper_model->tags()->result();
		$data["best_product"] = $this->Product_model->getBest()->result();
		$data["comment"] = $this->Paper_model->getComment($id_article)->result();
		$this->load->view('v_detailPaper',$data);
	}

	public function inputComment()
	{
		$id_article = $this->input->post('id_article');

		$nama_lengkap = $_SESSION["nama_lengkap"];
		$tanggal = date("h:i A, Y/m/d");
		$komen = $this->input->post('komen');

		$where = array(
			'id_paper' => $id_article,
			'nama' => $nama_lengkap,
			'komen' => $komen,
			'tanggal_komen' => $tanggal
		);

		$this->Paper_model->insertComment($where);
		redirect(base_url("article/detailArticle/".$id_article."/"));
	}
}
