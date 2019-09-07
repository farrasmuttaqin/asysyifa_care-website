<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cart_model');
		$this->load->model('Profile_model');
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

		$data["cart"]=$this->Cart_model->getCart($where)->result();
		$whereCheck = array(
			'id_user' => $_SESSION["id_user"],
			'status_pembayaran' => 'Belum Dibayar'
		);
		$data["pemesanan"]=$this->Cart_model->getPembayaran($whereCheck)->result();
		$this->load->view('v_profile',$data);
	}

	public function doChangePass()
	{
		$new= $this->input->post('password2');
		$old= $this->input->post('oldPass');
		$old = md5($old);
		$new = md5($new);

		$where = array(
			'pass' => $old
		);

		$cek = $this->Profile_model->cariPass($where)->num_rows();

		if ($cek > 0)
		{
			$this->Profile_model->change($_SESSION["email"],$new);
			redirect(base_url()."profile/index/1/");
		}else{
			redirect(base_url()."profile/index/2/");
		}
	}

	public function doChangeHP()
	{
		$new= $this->input->post('notel');

		$where = array(
			'nomor_hp' => $new
		);

		$cek = $this->Profile_model->cariHP($where)->num_rows();

		if ($cek > 0)
		{
			redirect(base_url()."profile/index/4/");
		}else{
			$this->Profile_model->changeHP($new,$_SESSION["email"]);
			$_SESSION["nomor_hp"] = $new;
			redirect(base_url()."profile/index/3/");
		}
	}
}