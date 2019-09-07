<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Cart_model');
		error_reporting(E_ERROR|E_PARSE);
	}

	public function index()
	{
		$whereCHC = array(
			'jenis_product' => 'cosmetic dan home care'
		);
		$whereHFB = array(
			'jenis_product' => 'healthy food dan beverage'
		);
		$whereHerbs = array(
			'jenis_product' => 'herbs'
		);

		$data["jenis"] = "All Products";

		$data["data_CHC"] = $this->Product_model->getAllParameter("tb_products",$whereCHC)->result();
		$data["data_HFB"] = $this->Product_model->getAllParameter("tb_products",$whereHFB)->result();
		$data["data_Herbs"] = $this->Product_model->getAllParameter("tb_products",$whereHerbs)->result();
		$data["data_All"] = $this->Product_model->getAll("tb_products")->result();
		$data["best_product"] = $this->Product_model->getBest()->result();
		$where = array(
			'id_user' => $_SESSION["id_user"],
			'nomor_invoice' => 101
		);

		$data["cart"]=$this->Cart_model->getCart($where)->result();
		$whereCheck = array(
			'id_user' => $_SESSION["id_user"],
			'status_pembayaran' => 'Belum Dibayar'
		);
		$data["pemesanan"]=$this->Cart_model->getPembayaran($whereCheck)->result();

		$this->load->view('v_productAll',$data);
	}

	public function detailProduct()
	{
		if ($_SESSION["email"]==""){
			redirect(base_url("login/index/1/"));
		}
		$id_product=$this->uri->segment(3);

		$where = array(
			'id_product' => $id_product
		);

		$data["detail"] = $this->Product_model->getAllParameter("tb_products",$where)->result();
		$result = $this->Product_model->getAllParameter("tb_products",$where)->result();

		foreach ($result as $hasil){
				$jenis=$hasil->jenis_product;
			}
			
		$data["similiarProduct"] = $this->Product_model->getLimit($jenis)->result();
		$data["review"] = $this->Product_model->getAllParameter("tb_reviews",$where)->result();

		$where = array(
			'id_user' => $_SESSION["id_user"],
			'nomor_invoice' => 101,
			'id_product' => $this->uri->segment(3)
		);

		$data["cartz"]=$this->Cart_model->getCart($where)->result();

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

		$this->load->view('v_detail',$data);
	}

	public function consumtion()
	{
		$whereCHC = array(
			'jenis_product' => 'cosmetic dan home care'
		);
		$whereHFB = array(
			'jenis_product' => 'healthy food dan beverage'
		);
		$whereHerbs = array(
			'jenis_product' => 'herbs'
		);

		$data["jenis"] = "Healthy Food & Beverage";

		$data["data_CHC"] = $this->Product_model->getAllParameter("tb_products",$whereCHC)->result();
		$data["data_HFB"] = $this->Product_model->getAllParameter("tb_products",$whereHFB)->result();
		$data["data_Herbs"] = $this->Product_model->getAllParameter("tb_products",$whereHerbs)->result();
		$data["data_All"] = $this->Product_model->getAll("tb_products")->result();
		$data["best_product"] = $this->Product_model->getBest()->result();
		$where = array(
			'id_user' => $_SESSION["id_user"],
			'nomor_invoice' => 101
		);

		$data["cart"]=$this->Cart_model->getCart($where)->result();
		$whereCheck = array(
			'id_user' => $_SESSION["id_user"],
			'status_pembayaran' => 'Belum Dibayar'
		);
		$data["pemesanan"]=$this->Cart_model->getPembayaran($whereCheck)->result();

		$this->load->view('v_productHFB',$data);
	}

	public function herbs()
	{
		$whereCHC = array(
			'jenis_product' => 'cosmetic dan home care'
		);
		$whereHFB = array(
			'jenis_product' => 'healthy food dan beverage'
		);
		$whereHerbs = array(
			'jenis_product' => 'herbs'
		);

		$data["jenis"] = "Herbs";

		$data["data_CHC"] = $this->Product_model->getAllParameter("tb_products",$whereCHC)->result();
		$data["data_HFB"] = $this->Product_model->getAllParameter("tb_products",$whereHFB)->result();
		$data["data_Herbs"] = $this->Product_model->getAllParameter("tb_products",$whereHerbs)->result();
		$data["data_All"] = $this->Product_model->getAll("tb_products")->result();
		$data["best_product"] = $this->Product_model->getBest()->result();
		$where = array(
			'id_user' => $_SESSION["id_user"],
			'nomor_invoice' => 101
		);

		$data["cart"]=$this->Cart_model->getCart($where)->result();
		$whereCheck = array(
			'id_user' => $_SESSION["id_user"],
			'status_pembayaran' => 'Belum Dibayar'
		);
		$data["pemesanan"]=$this->Cart_model->getPembayaran($whereCheck)->result();

		$this->load->view('v_productHerbs',$data);
	}

	public function cosmetic()
	{
		$whereCHC = array(
			'jenis_product' => 'cosmetic dan home care'
		);
		$whereHFB = array(
			'jenis_product' => 'healthy food dan beverage'
		);
		$whereHerbs = array(
			'jenis_product' => 'herbs'
		);

		$data["jenis"] = "Cosmetic & Home Care";

		$data["data_CHC"] = $this->Product_model->getAllParameter("tb_products",$whereCHC)->result();
		$data["data_HFB"] = $this->Product_model->getAllParameter("tb_products",$whereHFB)->result();
		$data["data_Herbs"] = $this->Product_model->getAllParameter("tb_products",$whereHerbs)->result();
		$data["data_All"] = $this->Product_model->getAll("tb_products")->result();
		$data["best_product"] = $this->Product_model->getBest()->result();
		$where = array(
			'id_user' => $_SESSION["id_user"],
			'nomor_invoice' => 101
		);

		$data["cart"]=$this->Cart_model->getCart($where)->result();
		$whereCheck = array(
			'id_user' => $_SESSION["id_user"],
			'status_pembayaran' => 'Belum Dibayar'
		);
		$data["pemesanan"]=$this->Cart_model->getPembayaran($whereCheck)->result();

		$this->load->view('v_productCHC',$data);
	}

	public function sortAll()
	{
		$sort = $this->input->get('sort');
		$data["urutkan"]=$sort;
		$data["jenis"] = "All Products";
		$whereCHC = array(
			'jenis_product' => 'cosmetic dan home care'
		);
		$whereHFB = array(
			'jenis_product' => 'healthy food dan beverage'
		);
		$whereHerbs = array(
			'jenis_product' => 'herbs'
		);
		$data["data_CHC"] = $this->Product_model->getAllParameter("tb_products",$whereCHC)->result();
		$data["data_HFB"] = $this->Product_model->getAllParameter("tb_products",$whereHFB)->result();
		$data["data_Herbs"] = $this->Product_model->getAllParameter("tb_products",$whereHerbs)->result();
		$data["best_product"] = $this->Product_model->getBest()->result();
		$where = array(
			'id_user' => $_SESSION["id_user"],
			'nomor_invoice' => 101
		);

		$data["cart"]=$this->Cart_model->getCart($where)->result();
		$whereCheck = array(
			'id_user' => $_SESSION["id_user"],
			'status_pembayaran' => 'Belum Dibayar'
		);
		$data["pemesanan"]=$this->Cart_model->getPembayaran($whereCheck)->result();

		if ($sort == "id"){
			$sortir="id_product";
			$urut = "ASC";
			$data["data_All"] = $this->Product_model->getallParameterSort($sortir,$urut)->result();
			$this->load->view('v_productAll',$data);
		}
		if ($sort == "alphabet"){
			$sortir="nama_product";
			$urut = "ASC";
			$data["data_All"] = $this->Product_model->getallParameterSort($sortir,$urut)->result();
			$this->load->view('v_productAll',$data);
		}
		if ($sort == "high"){
			$sortir="harga_product";
			$urut = "DESC";
			$data["data_All"] = $this->Product_model->getallParameterSort($sortir,$urut)->result();
			$this->load->view('v_productAll',$data);
		}
		if ($sort == "low"){
			$sortir="harga_product";
			$urut = "ASC";
			$data["data_All"] = $this->Product_model->getallParameterSort($sortir,$urut)->result();
			$this->load->view('v_productAll',$data);
		}
	}

	public function sortHerbs()
	{
		$sort = $this->input->get('sort');
		$data["urutkan"]=$sort;
		$data["jenis"] = "Herbs";
		$whereCHC = array(
			'jenis_product' => 'cosmetic dan home care'
		);
		$whereHFB = array(
			'jenis_product' => 'healthy food dan beverage'
		);
		$data["data_CHC"] = $this->Product_model->getAllParameter("tb_products",$whereCHC)->result();
		$data["data_HFB"] = $this->Product_model->getAllParameter("tb_products",$whereHFB)->result();
		$data["data_All"] = $this->Product_model->getAll("tb_products")->result();
		$data["best_product"] = $this->Product_model->getBest()->result();
		$where = array(
			'id_user' => $_SESSION["id_user"],
			'nomor_invoice' => 101
		);

		$data["cart"]=$this->Cart_model->getCart($where)->result();
		$whereCheck = array(
			'id_user' => $_SESSION["id_user"],
			'status_pembayaran' => 'Belum Dibayar'
		);
		$data["pemesanan"]=$this->Cart_model->getPembayaran($whereCheck)->result();

		if ($sort == "id"){
			$sortir="id_product";
			$urut = "ASC";
			$jenisProduct = "herbs";
			$data["data_Herbs"] = $this->Product_model->getallParameterSortProduct($sortir,$urut,$jenisProduct)->result();
			$this->load->view('v_productHerbs',$data);
		}
		if ($sort == "alphabet"){
			$sortir="nama_product";
			$urut = "ASC";
			$jenisProduct = "herbs";
			$data["data_Herbs"] = $this->Product_model->getallParameterSortProduct($sortir,$urut,$jenisProduct)->result();
			$this->load->view('v_productHerbs',$data);
		}
		if ($sort == "high"){
			$sortir="harga_product";
			$urut = "DESC";
			$jenisProduct = "herbs";
			$data["data_Herbs"] = $this->Product_model->getallParameterSortProduct($sortir,$urut,$jenisProduct)->result();
			$this->load->view('v_productHerbs',$data);
		}
		if ($sort == "low"){
			$sortir="harga_product";
			$urut = "ASC";
			$jenisProduct = "herbs";
			$data["data_Herbs"] = $this->Product_model->getallParameterSortProduct($sortir,$urut,$jenisProduct)->result();
			$this->load->view('v_productHerbs',$data);
		}
	}

	public function sortHFB()
	{
		$sort = $this->input->get('sort');
		$data["urutkan"]=$sort;
		$data["jenis"] = "Healthy Food & Beverage";
		$whereCHC = array(
			'jenis_product' => 'cosmetic dan home care'
		);
		$whereHerbs = array(
			'jenis_product' => 'healthy food dan beverage'
		);
		$data["data_CHC"] = $this->Product_model->getAllParameter("tb_products",$whereCHC)->result();
		$data["data_Herbs"] = $this->Product_model->getAllParameter("tb_products",$whereHerbs)->result();
		$data["data_All"] = $this->Product_model->getAll("tb_products")->result();
		$data["best_product"] = $this->Product_model->getBest()->result();
		$where = array(
			'id_user' => $_SESSION["id_user"],
			'nomor_invoice' => 101
		);

		$data["cart"]=$this->Cart_model->getCart($where)->result();
		$whereCheck = array(
			'id_user' => $_SESSION["id_user"],
			'status_pembayaran' => 'Belum Dibayar'
		);
		$data["pemesanan"]=$this->Cart_model->getPembayaran($whereCheck)->result();

		if ($sort == "id"){
			$sortir="id_product";
			$urut = "ASC";
			$jenisProduct = "healthy food dan beverage";
			$data["data_HFB"] = $this->Product_model->getallParameterSortProduct($sortir,$urut,$jenisProduct)->result();
			$this->load->view('v_productHFB',$data);
		}
		if ($sort == "alphabet"){
			$sortir="nama_product";
			$urut = "ASC";
			$jenisProduct = "healthy food dan beverage";
			$data["data_HFB"] = $this->Product_model->getallParameterSortProduct($sortir,$urut,$jenisProduct)->result();
			$this->load->view('v_productHFB',$data);
		}
		if ($sort == "high"){
			$sortir="harga_product";
			$urut = "DESC";
			$jenisProduct = "healthy food dan beverage";
			$data["data_HFB"] = $this->Product_model->getallParameterSortProduct($sortir,$urut,$jenisProduct)->result();
			$this->load->view('v_productHFB',$data);
		}
		if ($sort == "low"){
			$sortir="harga_product";
			$urut = "ASC";
			$jenisProduct = "healthy food dan beverage";
			$data["data_HFB"] = $this->Product_model->getallParameterSortProduct($sortir,$urut,$jenisProduct)->result();
			$this->load->view('v_productHFB',$data);
		}
	}

	public function sortCHC()
	{
		$sort = $this->input->get('sort');
		$data["urutkan"]=$sort;
		$data["jenis"] = "Cosmetic & Home Care";
		$whereHFB = array(
			'jenis_product' => 'healthy food dan beverage'
		);
		$whereHerbs = array(
			'jenis_product' => 'herbs'
		);
		$data["data_HFB"] = $this->Product_model->getAllParameter("tb_products",$whereHFB)->result();
		$data["data_Herbs"] = $this->Product_model->getAllParameter("tb_products",$whereHerbs)->result();
		$data["data_All"] = $this->Product_model->getAll("tb_products")->result();
		$data["best_product"] = $this->Product_model->getBest()->result();
		$where = array(
			'id_user' => $_SESSION["id_user"],
			'nomor_invoice' => 101
		);

		$data["cart"]=$this->Cart_model->getCart($where)->result();
		$whereCheck = array(
			'id_user' => $_SESSION["id_user"],
			'status_pembayaran' => 'Belum Dibayar'
		);
		$data["pemesanan"]=$this->Cart_model->getPembayaran($whereCheck)->result();
		
		if ($sort == "id"){
			$sortir="id_product";
			$urut = "ASC";
			$jenisProduct = "cosmetic dan home care";
			$data["data_CHC"] = $this->Product_model->getallParameterSortProduct($sortir,$urut,$jenisProduct)->result();
			$this->load->view('v_productCHC',$data);
		}
		if ($sort == "alphabet"){
			$sortir="nama_product";
			$urut = "ASC";
			$jenisProduct = "cosmetic dan home care";
			$data["data_CHC"] = $this->Product_model->getallParameterSortProduct($sortir,$urut,$jenisProduct)->result();
			$this->load->view('v_productCHC',$data);
		}
		if ($sort == "high"){
			$sortir="harga_product";
			$urut = "DESC";
			$jenisProduct = "cosmetic dan home care";
			$data["data_CHC"] = $this->Product_model->getallParameterSortProduct($sortir,$urut,$jenisProduct)->result();
			$this->load->view('v_productCHC',$data);
		}
		if ($sort == "low"){
			$sortir="harga_product";
			$urut = "ASC";
			$jenisProduct = "cosmetic dan home care";
			$data["data_CHC"] = $this->Product_model->getallParameterSortProduct($sortir,$urut,$jenisProduct)->result();
			$this->load->view('v_productCHC',$data);
		}
	}
}