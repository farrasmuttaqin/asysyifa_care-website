<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Review_model');
		error_reporting(E_ERROR|E_PARSE);
		if ($_SESSION["email"]==""){
            header("Location: ".base_url());
        }
	}

	public function index()
	{
		$date = date('d F Y');
		$star = $this->input->post('star');
		$save = array(
			'id_user' => $_SESSION["id_user"],
			'id_product' => $this->uri->segment(3),
			'rating' => $star,
			'reason' => $this->input->post('reason'),
			'komen' => $this->input->post('komen'),
			'tgl_review' => $date,
			'nama_depan_reviewers' => $_SESSION["nama_depan"]
		);

		if ($star == "")
		{
			redirect(base_url());
		}else{
			$this->Review_model->reviewInsert($save);
			redirect(base_url('product/detailProduct/'.$this->uri->segment(3).'/'));
		}
	}
}