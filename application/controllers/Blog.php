<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

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
		$data["blog"]=$this->Paper_model->getAllBlog()->result();
		$data["recent"]=$this->Paper_model->recentPostBlog()->result();
		$data["tags"]=$this->Paper_model->tagsBlog()->result();
		$data["best_product"] = $this->Product_model->getBest()->result();
		$this->load->view('v_blog',$data);
	}

	public function detailBlog()
	{
		$id_blog=$this->uri->segment(3);

		$whereBlog = array(
			'id_paper' => $id_blog,
			'jenis' => 'Blog'
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
		$data["blog"]=$this->Paper_model->getSelectArticle($whereBlog)->result();
		$data["recent"]=$this->Paper_model->recentPostBlog()->result();
		$data["tags"]=$this->Paper_model->tagsBlog()->result();
		$data["best_product"] = $this->Product_model->getBest()->result();
		$data["comment"] = $this->Paper_model->getComment($id_blog)->result();
		$this->load->view('v_detailBlog',$data);
	}

	public function inputComment()
	{
		$id_blog = $this->input->post('id_blog');

		$nama_lengkap = $_SESSION["nama_lengkap"];
		$tanggal = date("h:i A, Y/m/d");
		$komen = $this->input->post('komen');

		$where = array(
			'id_paper' => $id_blog,
			'nama' => $nama_lengkap,
			'komen' => $komen,
			'tanggal_komen' => $tanggal
		);

		$this->Paper_model->insertComment($where);
		redirect(base_url("blog/detailBlog/".$id_blog."/"));
	}
}
