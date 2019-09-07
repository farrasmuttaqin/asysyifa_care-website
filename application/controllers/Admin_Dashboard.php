<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Dashboard extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('Dashboard_model');
		error_reporting(E_ERROR|E_PARSE);
		if ($_SESSION["nama_lengkap_admin"]==""){
            $tampung = base_url()."Admin/";
            header("Location: $tampung");
        }
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url()."Admin/");
	}

	public function index()
	{
		$result["invoice"] = $this->Dashboard_model->getAllInvoice()->result();
		$this->load->view('admin/a_invoice',$result);
    }

    public function invoice()
	{
        $result["invoice"] = $this->Dashboard_model->getAllInvoice()->result();
		$this->load->view('admin/a_invoice',$result);
	}

	public function paper()
	{
        $result["paper"] = $this->Dashboard_model->getAllPaper()->result();
		$this->load->view('admin/a_paper',$result);
	}

	public function product()
	{
        $result["product"] = $this->Dashboard_model->getAllProduct()->result();
		$this->load->view('admin/a_product',$result);
	}

	public function reviews()
	{
        $result["reviews"] = $this->Dashboard_model->getAllReviews()->result();
		$this->load->view('admin/a_reviews',$result);
	}

	public function users()
	{
        $result["users"] = $this->Dashboard_model->getAllUsers()->result();
		$this->load->view('admin/a_users',$result);
	}

	public function deleteReviews()
	{
		$id_reviews=$this->uri->segment(3);
		$where = array(
			'id_reviews' => $id_reviews
		);
		$this->Dashboard_model->deleteReviews($where);
		redirect(base_url("Admin_Dashboard/reviews/"));
	}

	


	public function comment()
	{
        $result["comment"] = $this->Dashboard_model->getAllComment()->result();
		$this->load->view('admin/a_comment',$result);
	}

	public function deleteComment()
	{
		$id_comment=$this->uri->segment(3);
		$where = array(
			'id_comment' => $id_comment
		);
		$this->Dashboard_model->deleteComment($where);
		redirect(base_url("Admin_Dashboard/comment/"));
	}

	public function contact()
	{
        $result["contact"] = $this->Dashboard_model->getAllContact()->result();
		$this->load->view('admin/a_contact',$result);
	}

	public function deleteContact()
	{
		$id_contact=$this->uri->segment(3);
		$where = array(
			'id_contact' => $id_contact
		);
		$this->Dashboard_model->deleteContact($where);
		redirect(base_url("Admin_Dashboard/contact/"));
	}


	public function tambahProduct()
	{
        $result["product"] = $this->Dashboard_model->getAllProduct()->result();
		$this->load->view('admin/a_tambahProduct',$result);
	}

	public function deleteProduct()
	{
        $id_product=$this->uri->segment(3);
		$where = array(
			'id_product' => $id_product
		);

		$hasil = $this->Dashboard_model->getAllProduct()->result();

		foreach ($hasil as $all){
				$foto_lama=$all->gambar_product;
			}
		$dirname = "./assets/products/".$foto_lama;
		unlink($dirname);

		$this->Dashboard_model->deleteProducts($where);
		redirect(base_url("Admin_Dashboard/product/"));
	}

	public function editProduct()
	{
		$nomor = $this->uri->segment(3);
		$this->load->view('admin/a_editProduct',$nomor);
	}

	public function editProductAct(){

		$id_product = $this->input->post("id_product");

		$hasil = $this->Dashboard_model->getAllProduct()->result();

		foreach ($hasil as $all){
				$foto_lama=$all->gambar_product;
			}
		$dirname = "./assets/products/".$foto_lama;
		unlink($dirname);


		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$jenis = $this->input->post('jenis');
		$isi = $this->input->post('isi');
		$info = $this->input->post('info');
		$stock = $this->input->post('stock');
		$isi_singkat = $this->input->post('isi_singkat');
		$gambar = $_FILES['gambar']['name'];

		$config = array(
	    'upload_path' => "./assets/products/",
	    'allowed_types' => "jpg|png|jpeg",
	    'overwrite' => FALSE,
	    'max_size' => "2000000", //File Size
	    'max_height' => "10000",
	    'max_width' => "10000"
	    );
		$this->load->library('upload', $config);
		$this->upload->do_upload('gambar');

		$save = array(
			'nama_product' => $nama,
			'harga_product' => $harga,
			'jenis_product' => $jenis,
			'deskripsi_product' => $isi,
			'deskripsi_singkat_product' => $isi_singkat,
			'gambar_product' => $gambar,
			'stock' => $stock,
			'addinfo_product' => $info
		);

		$this->Dashboard_model->editProducts($id_product,$save);

		redirect(base_url("Admin_Dashboard/product/"));
	}

	public function tambahProductAct()
	{
		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$jenis = $this->input->post('jenis');
		$isi = $this->input->post('isi');
		$info = $this->input->post('info');
		$stock = $this->input->post('stock');
		$isi_singkat = $this->input->post('isi_singkat');
		$gambar = $_FILES['gambar']['name'];

		$config = array(
	    'upload_path' => "./assets/products/",
	    'allowed_types' => "jpg|png|jpeg",
	    'overwrite' => FALSE,
	    'max_size' => "2000000", //File Size
	    'max_height' => "10000",
	    'max_width' => "10000"
	    );
		$this->load->library('upload', $config);
		$this->upload->do_upload('gambar');

		$save = array(
			'nama_product' => $nama,
			'harga_product' => $harga,
			'jenis_product' => $jenis,
			'deskripsi_product' => $isi,
			'deskripsi_singkat_product' => $isi_singkat,
			'gambar_product' => $gambar,
			'stock' => $stock,
			'addinfo_product' => $info
		);

		$this->Dashboard_model->tambahProduct($save);

		redirect(base_url("Admin_Dashboard/product/"));
	}

	public function konfirmasiPembayaran()
	{
		$nomor_invoice = $this->input->post("nomor_invoice"); 
		$confirmation = $this->input->post("confirmation"); 
		$pengiriman2 = $this->input->post("pengiriman2"); 
		if ($confirmation == "ya" && $pengiriman2 == "ya"){
			
			$email = $this->input->post("email_user");
			$messages = "
				<!DOCTYPE html>
				<html>
				<head>
				<title>Asy-Syifa CARE</title>
				
				<meta charset='utf-8'>
				<meta name='viewport' content='width=device-width, initial-scale=1'>
				<meta http-equiv='X-UA-Compatible' content='IE=edge' />
				<style type='text/css'>
					/* CLIENT-SPECIFIC STYLES */
					body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
					table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
					img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

					/* RESET STYLES */
					img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
					table{border-collapse: collapse !important;}
					body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

					/* iOS BLUE LINKS */
					a[x-apple-data-detectors] {
						color: inherit !important;
						text-decoration: none !important;
						font-size: inherit !important;
						font-family: inherit !important;
						font-weight: inherit !important;
						line-height: inherit !important;
					}

					/* MOBILE STYLES */
					@media screen and (max-width: 525px) {

						/* ALLOWS FOR FLUID TABLES */
						.wrapper {
						  width: 100% !important;
							max-width: 100% !important;
						}

						/* ADJUSTS LAYOUT OF LOGO IMAGE */
						.logo img {
						  margin: 0 auto !important;
						}

						/* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
						.mobile-hide {
						  display: none !important;
						}

						.img-max {
						  max-width: 100% !important;
						  width: 100% !important;
						  height: auto !important;
						}

						/* FULL-WIDTH TABLES */
						.responsive-table {
						  width: 100% !important;
						}

						/* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
						.padding {
						  padding: 10px 5% 15px 5% !important;
						}

						.padding-meta {
						  padding: 30px 5% 0px 5% !important;
						  text-align: center;
						}

						.padding-copy {
							 padding: 10px 5% 10px 5% !important;
						  text-align: center;
						}

						.no-padding {
						  padding: 0 !important;
						}

						.section-padding {
						  padding: 50px 15px 50px 15px !important;
						}

						/* ADJUST BUTTONS ON MOBILE */
						.mobile-button-container {
							margin: 0 auto;
							width: 100% !important;
						}

						.mobile-button {
							padding: 15px !important;
							border: 0 !important;
							font-size: 16px !important;
							display: block !important;
						}

					}

					/* ANDROID CENTER FIX */
					div[style*='margin: 16px 0;'] { margin: 0 !important; }
				</style>
				</head>
				<body style='margin: 0 !important; padding: 0 !important;'>

				<!-- HIDDEN PREHEADER TEXT -->
				<div style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'>
					Detail Order Pembelian Kamu
				</div>

				<!-- HEADER -->
				<table border='0' cellpadding='0' cellspacing='0' width='100%'>
					<tr>
						<td style='background-image: url(https://asysyifacare.com/assets/img/bg-img/header.jpg);' align='center'>
							<!--[if (gte mso 9)|(IE)]>
							<table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
							<tr>
							<td align='center' valign='top' width='500'>
							<![endif]-->
							<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='wrapper'>
								<tr>
									<td align='center' valign='top' style='padding: 15px 0;' class='logo'>
										<a href='http://asysyifacare.com' target='_blank'>
											<img alt='Logo' src='https://asysyifacare.com/assets/img/core-img/logo1.png' width='150' height='75' style='display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;' border='0'>
										</a>
									</td>
								</tr>
							</table>
							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]-->
						</td>
					</tr>
					<tr>
						<td bgcolor='#ffffff' align='center' style='padding: 15px;'>
							<!--[if (gte mso 9)|(IE)]>
							<table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
							<tr>
							<td align='center' valign='top' width='500'>
							<![endif]-->
							<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='responsive-table'>
								<tr>
									<td>
										<!-- COPY -->
										<table width='100%' border='0' cellspacing='0' cellpadding='0'>
											<tr>
												<td align='center' style='font-size: 32px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;' class='padding-copy'>Pembayaran anda sudah di konfirmasi</td>
											</tr>
											<tr>
												<td align='justify' style='padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;' class='padding-copy'>Pembayaran anda dengan nomor invoice <span style='color:green;'>'INV-00".$nomor_invoice."'</span> sudah dikonfirmasi dan sedang <span style='color:green;'>di kirim</span>  ke alamat anda. Harap bersabar yaa, terima kasih.</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]-->
						</td>
					</tr>
					<tr>
						<td bgcolor='#ffffff' align='center'>
							<table border='0' cellpadding='0' cellspacing='0' width='500' class='responsive-table'>
								<tr>
									<td>
										<table width='100%' border='0' cellspacing='0' cellpadding='0'>
											
											<tr>
												<td align='center'>
													<!-- BULLETPROOF BUTTON -->
													<table width='100%' border='0' cellspacing='0' cellpadding='0'>
														<tr>
															<td align='center' style='padding-top: 25px;' class='padding'>
																<table border='0' cellspacing='0' cellpadding='0' class='mobile-button-container'>
																	<tr>
																		<td align='center' style='border-radius: 3px;' bgcolor='#256F9C'><a href='".base_url()."checkout/detail/".$nomor_invoice."/' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #256F9C; display: inline-block;' class='mobile-button'>Lihat Detail Product</a></td>
																	</tr>
																</table>
															
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]-->
						</td>
					</tr>
					<tr><td><br><br></td></tr>
					<tr>
						<td bgcolor='#ffffff' align='center' style='padding: 15px;'>
							<!--[if (gte mso 9)|(IE)]>
							<table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
							<tr>
							<td align='center' valign='top' width='500'>
							<![endif]-->
							<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='responsive-table'>
								<tr>
									<td>
										<table width='100%' border='0' cellspacing='0' cellpadding='0'>
											<tr>
												<td>
													<!-- COPY -->
													<table width='100%' border='0' cellspacing='0' cellpadding='0'>
														<tr>
															<td align='left' style='padding: 0 0 0 0; font-size: 14px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color: #aaaaaa; font-style: italic;' class='padding-copy'>Terima kasih telah berbelanja di Asy-Syifa CARE, Kami tunggu pesanan anda selanjutnya :) </td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr>
						<td bgcolor='#ffffff' align='center' style='padding: 20px 0px;'>
							<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' style='max-width: 500px;' class='responsive-table'>
								<tr>
									<td align='center' style='font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;'>
										Asy-Syifa CARE, Kalibata, Jakarta Selatan
										<br>

										<a href='#' style='color: #666666; text-decoration: none;'>Kode Pos 12750</a>
										<span style='font-family: Arial, sans-serif; font-size: 12px; color: #444444;'>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
										<a href='#' target='_blank' style='color: #666666; text-decoration: none;'>Indonesia</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				</body>
				</html>";
			$this->load->library('email');
            $config['protocol']    = 'smtp';
            $config['smtp_host']    = 'ssl://smtp.gmail.com';
            $config['smtp_port']    = '465';
            $config['smtp_timeout'] = '7';
            $config['smtp_user']    = 'asysyifacare@gmail.com';
            $config['smtp_pass']    = 'fadzly123';
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not
            $this->email->initialize($config);
            $this->email->from('asysyifacare@gmail.com', 'Asy-Syifa CARE');
            $this->email->to($email); 
            $this->email->subject('Your Payment has been Confirmed and The Product is being Sent');
            $this->email->message($messages);
            $this->email->send();
            
            //php mailer :
            
            //   $this->load->library('phpmailer_lib');
            // $mail = $this->phpmailer_lib->load();
            // $mail->isSMTP();
            // $mail->Host     = 'mail.bhinestorm.com';
            // $mail->SMTPAuth = true;
            // $mail->Username = 'asyifa@bhinestorm.com';
            // $mail->Password = 'asyifa123';
            // $mail->SMTPSecure = 'ssl';
            // $mail->Port     = 465;
            // $mail->setFrom('asyifa@bhinestorm.com', 'Asy-Syifa CARE');
            // $mail->addReplyTo('asyifa@bhinestorm.com', 'Asy-Syifa CARE');
            // $mail->addAddress($email);
            // $mail->Subject = 'Your Payment has been Confirmed and The Product is being Sent';
            // $mail->isHTML(true);
            // $mail->Body = $messages;
            // $mail->send();
			
			
			$this->Dashboard_model->konfirmasi($nomor_invoice,"Sudah dikonfirmasi","Sedang dikirim");
		}
		if ($confirmation == "ya" && $pengiriman2 == "tidak"){
			$email = $this->input->post("email_user");
			$messages = "
				<!DOCTYPE html>
				<html>
				<head>
				<title>Asy-Syifa CARE</title>
				
				<meta charset='utf-8'>
				<meta name='viewport' content='width=device-width, initial-scale=1'>
				<meta http-equiv='X-UA-Compatible' content='IE=edge' />
				<style type='text/css'>
					/* CLIENT-SPECIFIC STYLES */
					body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
					table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
					img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

					/* RESET STYLES */
					img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
					table{border-collapse: collapse !important;}
					body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

					/* iOS BLUE LINKS */
					a[x-apple-data-detectors] {
						color: inherit !important;
						text-decoration: none !important;
						font-size: inherit !important;
						font-family: inherit !important;
						font-weight: inherit !important;
						line-height: inherit !important;
					}

					/* MOBILE STYLES */
					@media screen and (max-width: 525px) {

						/* ALLOWS FOR FLUID TABLES */
						.wrapper {
						  width: 100% !important;
							max-width: 100% !important;
						}

						/* ADJUSTS LAYOUT OF LOGO IMAGE */
						.logo img {
						  margin: 0 auto !important;
						}

						/* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
						.mobile-hide {
						  display: none !important;
						}

						.img-max {
						  max-width: 100% !important;
						  width: 100% !important;
						  height: auto !important;
						}

						/* FULL-WIDTH TABLES */
						.responsive-table {
						  width: 100% !important;
						}

						/* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
						.padding {
						  padding: 10px 5% 15px 5% !important;
						}

						.padding-meta {
						  padding: 30px 5% 0px 5% !important;
						  text-align: center;
						}

						.padding-copy {
							 padding: 10px 5% 10px 5% !important;
						  text-align: center;
						}

						.no-padding {
						  padding: 0 !important;
						}

						.section-padding {
						  padding: 50px 15px 50px 15px !important;
						}

						/* ADJUST BUTTONS ON MOBILE */
						.mobile-button-container {
							margin: 0 auto;
							width: 100% !important;
						}

						.mobile-button {
							padding: 15px !important;
							border: 0 !important;
							font-size: 16px !important;
							display: block !important;
						}

					}

					/* ANDROID CENTER FIX */
					div[style*='margin: 16px 0;'] { margin: 0 !important; }
				</style>
				</head>
				<body style='margin: 0 !important; padding: 0 !important;'>

				<!-- HIDDEN PREHEADER TEXT -->
				<div style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'>
					Detail Order Pembelian Kamu
				</div>

				<!-- HEADER -->
				<table border='0' cellpadding='0' cellspacing='0' width='100%'>
					<tr>
						<td style='background-image: url(https://asysyifacare.com/assets/img/bg-img/header.jpg);' align='center'>
							<!--[if (gte mso 9)|(IE)]>
							<table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
							<tr>
							<td align='center' valign='top' width='500'>
							<![endif]-->
							<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='wrapper'>
								<tr>
									<td align='center' valign='top' style='padding: 15px 0;' class='logo'>
										<a href='http://asysyifacare.com' target='_blank'>
											<img alt='Logo' src='https://asysyifacare.com/assets/img/core-img/logo1.png' width='150' height='75' style='display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;' border='0'>
										</a>
									</td>
								</tr>
							</table>
							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]-->
						</td>
					</tr>
					<tr>
						<td bgcolor='#ffffff' align='center' style='padding: 15px;'>
							<!--[if (gte mso 9)|(IE)]>
							<table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
							<tr>
							<td align='center' valign='top' width='500'>
							<![endif]-->
							<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='responsive-table'>
								<tr>
									<td>
										<!-- COPY -->
										<table width='100%' border='0' cellspacing='0' cellpadding='0'>
											<tr>
												<td align='center' style='font-size: 32px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;' class='padding-copy'>Pembayaran anda sudah di konfirmasi</td>
											</tr>
											<tr>
												<td align='justify' style='padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;' class='padding-copy'>Pembayaran anda dengan nomor invoice <span style='color:green;'>'INV-00".$nomor_invoice."'</span> sudah dikonfirmasi, namun belum  <span style='color:red;'>di kirim</span>  ke alamat anda. Harap bersabar yaa, terima kasih.</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]-->
						</td>
					</tr>
					<tr>
						<td bgcolor='#ffffff' align='center'>
							<table border='0' cellpadding='0' cellspacing='0' width='500' class='responsive-table'>
								<tr>
									<td>
										<table width='100%' border='0' cellspacing='0' cellpadding='0'>
											
											<tr>
												<td align='center'>
													<!-- BULLETPROOF BUTTON -->
													<table width='100%' border='0' cellspacing='0' cellpadding='0'>
														<tr>
															<td align='center' style='padding-top: 25px;' class='padding'>
																<table border='0' cellspacing='0' cellpadding='0' class='mobile-button-container'>
																	<tr>
																		<td align='center' style='border-radius: 3px;' bgcolor='#256F9C'><a href='".base_url()."checkout/detail/".$nomor_invoice."/' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #256F9C; display: inline-block;' class='mobile-button'>Lihat Detail Product</a></td>
																	</tr>
																</table>
															
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]-->
						</td>
					</tr>
					<tr><td><br><br></td></tr>
					<tr>
						<td bgcolor='#ffffff' align='center' style='padding: 15px;'>
							<!--[if (gte mso 9)|(IE)]>
							<table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
							<tr>
							<td align='center' valign='top' width='500'>
							<![endif]-->
							<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='responsive-table'>
								<tr>
									<td>
										<table width='100%' border='0' cellspacing='0' cellpadding='0'>
											<tr>
												<td>
													<!-- COPY -->
													<table width='100%' border='0' cellspacing='0' cellpadding='0'>
														<tr>
															<td align='left' style='padding: 0 0 0 0; font-size: 14px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color: #aaaaaa; font-style: italic;' class='padding-copy'>Terima kasih telah berbelanja di Asy-Syifa CARE, Kami tunggu pesanan anda selanjutnya :) </td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr>
						<td bgcolor='#ffffff' align='center' style='padding: 20px 0px;'>
							<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' style='max-width: 500px;' class='responsive-table'>
								<tr>
									<td align='center' style='font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;'>
										Asy-Syifa CARE, Kalibata, Jakarta Selatan
										<br>

										<a href='#' style='color: #666666; text-decoration: none;'>Kode Pos 12750</a>
										<span style='font-family: Arial, sans-serif; font-size: 12px; color: #444444;'>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
										<a href='#' target='_blank' style='color: #666666; text-decoration: none;'>Indonesia</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				</body>
				</html>";
			$this->load->library('email');
            $config['protocol']    = 'smtp';
            $config['smtp_host']    = 'ssl://smtp.gmail.com';
            $config['smtp_port']    = '465';
            $config['smtp_timeout'] = '7';
            $config['smtp_user']    = 'asysyifacare@gmail.com';
            $config['smtp_pass']    = 'fadzly123';
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not
            $this->email->initialize($config);
            $this->email->from('asysyifacare@gmail.com', 'Asy-Syifa CARE');
            $this->email->to($email); 
            $this->email->subject('Your Payment Confirmation');
            $this->email->message($messages);
            $this->email->send();

//php mailer

//    $this->load->library('phpmailer_lib');
//             $mail = $this->phpmailer_lib->load();
//             $mail->isSMTP();
//             $mail->Host     = 'mail.bhinestorm.com';
//             $mail->SMTPAuth = true;
//             $mail->Username = 'asyifa@bhinestorm.com';
//             $mail->Password = 'asyifa123';
//             $mail->SMTPSecure = 'ssl';
//             $mail->Port     = 465;
//             $mail->setFrom('asyifa@bhinestorm.com', 'Asy-Syifa CARE');
//             $mail->addReplyTo('asyifa@bhinestorm.com', 'Asy-Syifa CARE');
//             $mail->addAddress($email);
//             $mail->Subject = 'Your Payment Confirmation';
//             $mail->isHTML(true);
//             $mail->Body = $messages;
//             $mail->send();
			
			
			$this->Dashboard_model->konfirmasi($nomor_invoice,"Sudah dikonfirmasi","Belum dikirim");
		}
		if ($confirmation == "tidak"){
			
			$email = $this->input->post("email_user");
			$messages = "
				<!DOCTYPE html>
				<html>
				<head>
				<title>Asy-Syifa CARE</title>
				
				<meta charset='utf-8'>
				<meta name='viewport' content='width=device-width, initial-scale=1'>
				<meta http-equiv='X-UA-Compatible' content='IE=edge' />
				<style type='text/css'>
					/* CLIENT-SPECIFIC STYLES */
					body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
					table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
					img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

					/* RESET STYLES */
					img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
					table{border-collapse: collapse !important;}
					body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

					/* iOS BLUE LINKS */
					a[x-apple-data-detectors] {
						color: inherit !important;
						text-decoration: none !important;
						font-size: inherit !important;
						font-family: inherit !important;
						font-weight: inherit !important;
						line-height: inherit !important;
					}

					/* MOBILE STYLES */
					@media screen and (max-width: 525px) {

						/* ALLOWS FOR FLUID TABLES */
						.wrapper {
						  width: 100% !important;
							max-width: 100% !important;
						}

						/* ADJUSTS LAYOUT OF LOGO IMAGE */
						.logo img {
						  margin: 0 auto !important;
						}

						/* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
						.mobile-hide {
						  display: none !important;
						}

						.img-max {
						  max-width: 100% !important;
						  width: 100% !important;
						  height: auto !important;
						}

						/* FULL-WIDTH TABLES */
						.responsive-table {
						  width: 100% !important;
						}

						/* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
						.padding {
						  padding: 10px 5% 15px 5% !important;
						}

						.padding-meta {
						  padding: 30px 5% 0px 5% !important;
						  text-align: center;
						}

						.padding-copy {
							 padding: 10px 5% 10px 5% !important;
						  text-align: center;
						}

						.no-padding {
						  padding: 0 !important;
						}

						.section-padding {
						  padding: 50px 15px 50px 15px !important;
						}

						/* ADJUST BUTTONS ON MOBILE */
						.mobile-button-container {
							margin: 0 auto;
							width: 100% !important;
						}

						.mobile-button {
							padding: 15px !important;
							border: 0 !important;
							font-size: 16px !important;
							display: block !important;
						}

					}

					/* ANDROID CENTER FIX */
					div[style*='margin: 16px 0;'] { margin: 0 !important; }
				</style>
				</head>
				<body style='margin: 0 !important; padding: 0 !important;'>

				<!-- HIDDEN PREHEADER TEXT -->
				<div style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'>
					Pembayaran tidak Diterima
				</div>

				<!-- HEADER -->
				<table border='0' cellpadding='0' cellspacing='0' width='100%'>
					<tr>
						<td style='background-image: url(https://asysyifacare.com/assets/img/bg-img/header.jpg);' align='center'>
							<!--[if (gte mso 9)|(IE)]>
							<table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
							<tr>
							<td align='center' valign='top' width='500'>
							<![endif]-->
							<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='wrapper'>
								<tr>
									<td align='center' valign='top' style='padding: 15px 0;' class='logo'>
										<a href='http://asysyifacare.com' target='_blank'>
											<img alt='Logo' src='https://asysyifacare.com/assets/img/core-img/logo1.png' width='150' height='75' style='display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;' border='0'>
										</a>
									</td>
								</tr>
							</table>
							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]-->
						</td>
					</tr>
					<tr>
						<td bgcolor='#ffffff' align='center' style='padding: 15px;'>
							<!--[if (gte mso 9)|(IE)]>
							<table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
							<tr>
							<td align='center' valign='top' width='500'>
							<![endif]-->
							<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='responsive-table'>
								<tr>
									<td>
										<!-- COPY -->
										<table width='100%' border='0' cellspacing='0' cellpadding='0'>
											<tr>
												<td align='center' style='font-size: 32px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;' class='padding-copy'>Pembayaran kamu tidak kami terima</td>
											</tr>
											<tr>
												<td align='justify' style='padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;' class='padding-copy'>Mohon maaf, Pembayaran anda dengan nomor invoice <span style='color:red;'>'INV-00".$nomor_invoice."'</span> tidak kami terima, Karena bukti pembayaran yang anda kirim <span style='color:red;'>Salah</span>. Silahkan kirim kembali bukti pembayaran anda.</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]-->
						</td>
					</tr>
					<tr>
						<td bgcolor='#ffffff' align='center'>
							<table border='0' cellpadding='0' cellspacing='0' width='500' class='responsive-table'>
								<tr>
									<td>
										<table width='100%' border='0' cellspacing='0' cellpadding='0'>
											
											<tr>
												<td align='center'>
													<!-- BULLETPROOF BUTTON -->
													<table width='100%' border='0' cellspacing='0' cellpadding='0'>
														<tr>
															<td align='center' style='padding-top: 25px;' class='padding'>
																<table border='0' cellspacing='0' cellpadding='0' class='mobile-button-container'>
																	<tr>
																		<td align='center' style='border-radius: 3px;' bgcolor='#256F9C'><a href='".base_url()."checkout/detail/".$nomor_invoice."/' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #256F9C; display: inline-block;' class='mobile-button'>Lihat Detail Product</a></td>
																	</tr>
																</table>
															
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]-->
						</td>
					</tr>
					<tr><td><br><br></td></tr>
					<tr>
						<td bgcolor='#ffffff' align='center' style='padding: 15px;'>
							<!--[if (gte mso 9)|(IE)]>
							<table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
							<tr>
							<td align='center' valign='top' width='500'>
							<![endif]-->
							<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='responsive-table'>
								<tr>
									<td>
										<table width='100%' border='0' cellspacing='0' cellpadding='0'>
											<tr>
												<td>
													<!-- COPY -->
													<table width='100%' border='0' cellspacing='0' cellpadding='0'>
														<tr>
															<td align='left' style='padding: 0 0 0 0; font-size: 14px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color: #aaaaaa; font-style: italic;' class='padding-copy'>Terima kasih telah berbelanja di Asy-Syifa CARE, Kami tunggu pesanan anda selanjutnya :) </td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr>
						<td bgcolor='#ffffff' align='center' style='padding: 20px 0px;'>
							<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' style='max-width: 500px;' class='responsive-table'>
								<tr>
									<td align='center' style='font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;'>
										Asy-Syifa CARE, Kalibata, Jakarta Selatan
										<br>

										<a href='#' style='color: #666666; text-decoration: none;'>Kode Pos 12750</a>
										<span style='font-family: Arial, sans-serif; font-size: 12px; color: #444444;'>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
										<a href='#' target='_blank' style='color: #666666; text-decoration: none;'>Indonesia</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				</body>
				</html>";
			$this->load->library('email');
            $config['protocol']    = 'smtp';
            $config['smtp_host']    = 'ssl://smtp.gmail.com';
            $config['smtp_port']    = '465';
            $config['smtp_timeout'] = '7';
            $config['smtp_user']    = 'asysyifacare@gmail.com';
            $config['smtp_pass']    = 'fadzly123';
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not
            $this->email->initialize($config);
            $this->email->from('asysyifacare@gmail.com', 'Asy-Syifa CARE');
            $this->email->to($email); 
            $this->email->subject('Your Payment is not Accepted!');
            $this->email->message($messages);
            $this->email->send();
            
            // $this->load->library('phpmailer_lib');
            // $mail = $this->phpmailer_lib->load();
            // $mail->isSMTP();
            // $mail->Host     = 'mail.bhinestorm.com';
            // $mail->SMTPAuth = true;
            // $mail->Username = 'asyifa@bhinestorm.com';
            // $mail->Password = 'asyifa123';
            // $mail->SMTPSecure = 'ssl';
            // $mail->Port     = 465;
            // $mail->setFrom('asyifa@bhinestorm.com', 'Asy-Syifa CARE');
            // $mail->addReplyTo('asyifa@bhinestorm.com', 'Asy-Syifa CARE');
            // $mail->addAddress($email);
            // $mail->Subject = 'Your Payment is not Accepted!';
            // $mail->isHTML(true);
            // $mail->Body = $messages;
            // $mail->send();
			
			$this->Dashboard_model->konfirmasi($nomor_invoice,"Bukti Transfer Salah","-");
		}
		
        redirect(base_url("Admin_Dashboard/invoice/"));
	}

	public function konfirmasiPenerimaanBarang()
	{
		$nomor_invoice = $this->input->post("nomor_invoice"); 
		$confirmation = $this->input->post("confirmation"); 
		if ($confirmation == "ya"){
			$email = $this->input->post("email_user");
			$messages = "
				<!DOCTYPE html>
				<html>
				<head>
				<title>Asy-Syifa CARE</title>
				
				<meta charset='utf-8'>
				<meta name='viewport' content='width=device-width, initial-scale=1'>
				<meta http-equiv='X-UA-Compatible' content='IE=edge' />
				<style type='text/css'>
					/* CLIENT-SPECIFIC STYLES */
					body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
					table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
					img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

					/* RESET STYLES */
					img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
					table{border-collapse: collapse !important;}
					body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

					/* iOS BLUE LINKS */
					a[x-apple-data-detectors] {
						color: inherit !important;
						text-decoration: none !important;
						font-size: inherit !important;
						font-family: inherit !important;
						font-weight: inherit !important;
						line-height: inherit !important;
					}

					/* MOBILE STYLES */
					@media screen and (max-width: 525px) {

						/* ALLOWS FOR FLUID TABLES */
						.wrapper {
						  width: 100% !important;
							max-width: 100% !important;
						}

						/* ADJUSTS LAYOUT OF LOGO IMAGE */
						.logo img {
						  margin: 0 auto !important;
						}

						/* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
						.mobile-hide {
						  display: none !important;
						}

						.img-max {
						  max-width: 100% !important;
						  width: 100% !important;
						  height: auto !important;
						}

						/* FULL-WIDTH TABLES */
						.responsive-table {
						  width: 100% !important;
						}

						/* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
						.padding {
						  padding: 10px 5% 15px 5% !important;
						}

						.padding-meta {
						  padding: 30px 5% 0px 5% !important;
						  text-align: center;
						}

						.padding-copy {
							 padding: 10px 5% 10px 5% !important;
						  text-align: center;
						}

						.no-padding {
						  padding: 0 !important;
						}

						.section-padding {
						  padding: 50px 15px 50px 15px !important;
						}

						/* ADJUST BUTTONS ON MOBILE */
						.mobile-button-container {
							margin: 0 auto;
							width: 100% !important;
						}

						.mobile-button {
							padding: 15px !important;
							border: 0 !important;
							font-size: 16px !important;
							display: block !important;
						}

					}

					/* ANDROID CENTER FIX */
					div[style*='margin: 16px 0;'] { margin: 0 !important; }
				</style>
				</head>
				<body style='margin: 0 !important; padding: 0 !important;'>

				<!-- HIDDEN PREHEADER TEXT -->
				<div style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'>
					Detail Order Pembelian Kamu
				</div>

				<!-- HEADER -->
				<table border='0' cellpadding='0' cellspacing='0' width='100%'>
					<tr>
						<td style='background-image: url(https://asysyifacare.com/assets/img/bg-img/header.jpg);' align='center'>
							<!--[if (gte mso 9)|(IE)]>
							<table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
							<tr>
							<td align='center' valign='top' width='500'>
							<![endif]-->
							<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='wrapper'>
								<tr>
									<td align='center' valign='top' style='padding: 15px 0;' class='logo'>
										<a href='http://asysyifacare.com' target='_blank'>
											<img alt='Logo' src='https://asysyifacare.com/assets/img/core-img/logo1.png' width='150' height='75' style='display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;' border='0'>
										</a>
									</td>
								</tr>
							</table>
							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]-->
						</td>
					</tr>
					<tr>
						<td bgcolor='#ffffff' align='center' style='padding: 15px;'>
							<!--[if (gte mso 9)|(IE)]>
							<table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
							<tr>
							<td align='center' valign='top' width='500'>
							<![endif]-->
							<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='responsive-table'>
								<tr>
									<td>
										<!-- COPY -->
										<table width='100%' border='0' cellspacing='0' cellpadding='0'>
											<tr>
												<td align='center' style='font-size: 32px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;' class='padding-copy'>Produk anda sedang dikirim</td>
											</tr>
											<tr>
												<td align='justify' style='padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;' class='padding-copy'>Pembayaran dengan nomor invoice <span style='color:green;'>'INV-00".$nomor_invoice."'</span> sudah dikonfirmasi dan sedang dalam proses pengiriman.</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]-->
						</td>
					</tr>
					<tr>
						<td bgcolor='#ffffff' align='center'>
							<table border='0' cellpadding='0' cellspacing='0' width='500' class='responsive-table'>
								<tr>
									<td>
										<table width='100%' border='0' cellspacing='0' cellpadding='0'>
											
											<tr>
												<td align='center'>
													<!-- BULLETPROOF BUTTON -->
													<table width='100%' border='0' cellspacing='0' cellpadding='0'>
														<tr>
															<td align='center' style='padding-top: 25px;' class='padding'>
																<table border='0' cellspacing='0' cellpadding='0' class='mobile-button-container'>
																	<tr>
																		<td align='center' style='border-radius: 3px;' bgcolor='#256F9C'><a href='".base_url()."checkout/detail/".$nomor_invoice."/' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #256F9C; display: inline-block;' class='mobile-button'>Lihat Detail Product</a></td>
																	</tr>
																</table>
															
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]-->
						</td>
					</tr>
					<tr><td><br><br></td></tr>
					<tr>
						<td bgcolor='#ffffff' align='center' style='padding: 15px;'>
							<!--[if (gte mso 9)|(IE)]>
							<table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
							<tr>
							<td align='center' valign='top' width='500'>
							<![endif]-->
							<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='responsive-table'>
								<tr>
									<td>
										<table width='100%' border='0' cellspacing='0' cellpadding='0'>
											<tr>
												<td>
													<!-- COPY -->
													<table width='100%' border='0' cellspacing='0' cellpadding='0'>
														<tr>
															<td align='left' style='padding: 0 0 0 0; font-size: 14px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color: #aaaaaa; font-style: italic;' class='padding-copy'>Terima kasih telah berbelanja di Asy-Syifa CARE, Kami tunggu pesanan anda selanjutnya :) </td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr>
						<td bgcolor='#ffffff' align='center' style='padding: 20px 0px;'>
							<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' style='max-width: 500px;' class='responsive-table'>
								<tr>
									<td align='center' style='font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;'>
										Asy-Syifa CARE, Kalibata, Jakarta Selatan
										<br>

										<a href='#' style='color: #666666; text-decoration: none;'>Kode Pos 12750</a>
										<span style='font-family: Arial, sans-serif; font-size: 12px; color: #444444;'>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
										<a href='#' target='_blank' style='color: #666666; text-decoration: none;'>Indonesia</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				</body>
				</html>";
			$this->load->library('email');
            $config['protocol']    = 'smtp';
            $config['smtp_host']    = 'ssl://smtp.gmail.com';
            $config['smtp_port']    = '465';
            $config['smtp_timeout'] = '7';
            $config['smtp_user']    = 'asysyifacare@gmail.com';
            $config['smtp_pass']    = 'fadzly123';
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not
            $this->email->initialize($config);
            $this->email->from('asysyifacare@gmail.com', 'Asy-Syifa CARE');
            $this->email->to($email); 
            $this->email->subject('Your Product is being Shipped');
            $this->email->message($messages);
            $this->email->send();

// $this->load->library('phpmailer_lib');
//             $mail = $this->phpmailer_lib->load();
//             $mail->isSMTP();
//             $mail->Host     = 'mail.bhinestorm.com';
//             $mail->SMTPAuth = true;
//             $mail->Username = 'asyifa@bhinestorm.com';
//             $mail->Password = 'asyifa123';
//             $mail->SMTPSecure = 'ssl';
//             $mail->Port     = 465;
//             $mail->setFrom('asyifa@bhinestorm.com', 'Asy-Syifa CARE');
//             $mail->addReplyTo('asyifa@bhinestorm.com', 'Asy-Syifa CARE');
//             $mail->addAddress($email);
//             $mail->Subject = 'Your Product is being Shipped';
//             $mail->isHTML(true);
//             $mail->Body = $messages;
//             $mail->send();
			
			$this->Dashboard_model->konfirmasi($nomor_invoice,"Sudah dikonfirmasi","Sedang dikirim");
		}else{
			$this->Dashboard_model->konfirmasi($nomor_invoice,"Sudah dikonfirmasi","Belum dikirim");
		}
        redirect(base_url("Admin_Dashboard/invoice/"));
	}
	
	public function konfirmasiPenerimaanBarang2()
	{
		$nomor_invoice = $this->input->post("nomor_invoice"); 
		$confirmation = $this->input->post("confirmation"); 
		if ($confirmation == "ya"){
			$email = $this->input->post("email_user");
			$messages = "
				<!DOCTYPE html>
				<html>
				<head>
				<title>Asy-Syifa CARE</title>
				
				<meta charset='utf-8'>
				<meta name='viewport' content='width=device-width, initial-scale=1'>
				<meta http-equiv='X-UA-Compatible' content='IE=edge' />
				<style type='text/css'>
					/* CLIENT-SPECIFIC STYLES */
					body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
					table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
					img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

					/* RESET STYLES */
					img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
					table{border-collapse: collapse !important;}
					body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

					/* iOS BLUE LINKS */
					a[x-apple-data-detectors] {
						color: inherit !important;
						text-decoration: none !important;
						font-size: inherit !important;
						font-family: inherit !important;
						font-weight: inherit !important;
						line-height: inherit !important;
					}

					/* MOBILE STYLES */
					@media screen and (max-width: 525px) {

						/* ALLOWS FOR FLUID TABLES */
						.wrapper {
						  width: 100% !important;
							max-width: 100% !important;
						}

						/* ADJUSTS LAYOUT OF LOGO IMAGE */
						.logo img {
						  margin: 0 auto !important;
						}

						/* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
						.mobile-hide {
						  display: none !important;
						}

						.img-max {
						  max-width: 100% !important;
						  width: 100% !important;
						  height: auto !important;
						}

						/* FULL-WIDTH TABLES */
						.responsive-table {
						  width: 100% !important;
						}

						/* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
						.padding {
						  padding: 10px 5% 15px 5% !important;
						}

						.padding-meta {
						  padding: 30px 5% 0px 5% !important;
						  text-align: center;
						}

						.padding-copy {
							 padding: 10px 5% 10px 5% !important;
						  text-align: center;
						}

						.no-padding {
						  padding: 0 !important;
						}

						.section-padding {
						  padding: 50px 15px 50px 15px !important;
						}

						/* ADJUST BUTTONS ON MOBILE */
						.mobile-button-container {
							margin: 0 auto;
							width: 100% !important;
						}

						.mobile-button {
							padding: 15px !important;
							border: 0 !important;
							font-size: 16px !important;
							display: block !important;
						}

					}

					/* ANDROID CENTER FIX */
					div[style*='margin: 16px 0;'] { margin: 0 !important; }
				</style>
				</head>
				<body style='margin: 0 !important; padding: 0 !important;'>

				<!-- HIDDEN PREHEADER TEXT -->
				<div style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'>
					Detail Order Pembelian Kamu
				</div>

				<!-- HEADER -->
				<table border='0' cellpadding='0' cellspacing='0' width='100%'>
					<tr>
						<td style='background-image: url(https://asysyifacare.com/assets/img/bg-img/header.jpg);' align='center'>
							<!--[if (gte mso 9)|(IE)]>
							<table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
							<tr>
							<td align='center' valign='top' width='500'>
							<![endif]-->
							<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='wrapper'>
								<tr>
									<td align='center' valign='top' style='padding: 15px 0;' class='logo'>
										<a href='http://asysyifacare.com' target='_blank'>
											<img alt='Logo' src='https://asysyifacare.com/assets/img/core-img/logo1.png' width='150' height='75' style='display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;' border='0'>
										</a>
									</td>
								</tr>
							</table>
							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]-->
						</td>
					</tr>
					<tr>
						<td bgcolor='#ffffff' align='center' style='padding: 15px;'>
							<!--[if (gte mso 9)|(IE)]>
							<table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
							<tr>
							<td align='center' valign='top' width='500'>
							<![endif]-->
							<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='responsive-table'>
								<tr>
									<td>
										<!-- COPY -->
										<table width='100%' border='0' cellspacing='0' cellpadding='0'>
											<tr>
												<td align='center' style='font-size: 32px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;' class='padding-copy'>Anda sudah menerima produk yang dibeli</td>
											</tr>
											<tr>
												<td align='justify' style='padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;' class='padding-copy'>Produk yang telah anda bayar dengan nomor invoice <span style='color:green;'>'INV-00".$nomor_invoice."'</span> sudah diterima.</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]-->
						</td>
					</tr>
					<tr>
						<td bgcolor='#ffffff' align='center'>
							<table border='0' cellpadding='0' cellspacing='0' width='500' class='responsive-table'>
								<tr>
									<td>
										<table width='100%' border='0' cellspacing='0' cellpadding='0'>
											
											<tr>
												<td align='center'>
													<!-- BULLETPROOF BUTTON -->
													<table width='100%' border='0' cellspacing='0' cellpadding='0'>
														<tr>
															<td align='center' style='padding-top: 25px;' class='padding'>
																<table border='0' cellspacing='0' cellpadding='0' class='mobile-button-container'>
																	<tr>
																		<td align='center' style='border-radius: 3px;' bgcolor='#256F9C'><a href='".base_url()."checkout/detail/".$nomor_invoice."/' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #256F9C; display: inline-block;' class='mobile-button'>Lihat Detail Product</a></td>
																	</tr>
																</table>
															
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]-->
						</td>
					</tr>
					<tr><td><br><br></td></tr>
					<tr>
						<td bgcolor='#ffffff' align='center' style='padding: 15px;'>
							<!--[if (gte mso 9)|(IE)]>
							<table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
							<tr>
							<td align='center' valign='top' width='500'>
							<![endif]-->
							<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='responsive-table'>
								<tr>
									<td>
										<table width='100%' border='0' cellspacing='0' cellpadding='0'>
											<tr>
												<td>
													<!-- COPY -->
													<table width='100%' border='0' cellspacing='0' cellpadding='0'>
														<tr>
															<td align='left' style='padding: 0 0 0 0; font-size: 14px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color: #aaaaaa; font-style: italic;' class='padding-copy'>Terima kasih telah berbelanja di Asy-Syifa CARE, Kami tunggu pesanan anda selanjutnya :) </td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr>
						<td bgcolor='#ffffff' align='center' style='padding: 20px 0px;'>
							<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' style='max-width: 500px;' class='responsive-table'>
								<tr>
									<td align='center' style='font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;'>
										Asy-Syifa CARE, Kalibata, Jakarta Selatan
										<br>

										<a href='#' style='color: #666666; text-decoration: none;'>Kode Pos 12750</a>
										<span style='font-family: Arial, sans-serif; font-size: 12px; color: #444444;'>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
										<a href='#' target='_blank' style='color: #666666; text-decoration: none;'>Indonesia</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				</body>
				</html>";
			$this->load->library('email');
            $config['protocol']    = 'smtp';
            $config['smtp_host']    = 'ssl://smtp.gmail.com';
            $config['smtp_port']    = '465';
            $config['smtp_timeout'] = '7';
            $config['smtp_user']    = 'asysyifacare@gmail.com';
            $config['smtp_pass']    = 'fadzly123';
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not
            $this->email->initialize($config);
            $this->email->from('asysyifacare@gmail.com', 'Asy-Syifa CARE');
            $this->email->to($email); 
            $this->email->subject('Receipt of Purchase');
            $this->email->message($messages);
            $this->email->send();
            
            // $this->load->library('phpmailer_lib');
            // $mail = $this->phpmailer_lib->load();
            // $mail->isSMTP();
            // $mail->Host     = 'mail.bhinestorm.com';
            // $mail->SMTPAuth = true;
            // $mail->Username = 'asyifa@bhinestorm.com';
            // $mail->Password = 'asyifa123';
            // $mail->SMTPSecure = 'ssl';
            // $mail->Port     = 465;
            // $mail->setFrom('asyifa@bhinestorm.com', 'Asy-Syifa CARE');
            // $mail->addReplyTo('asyifa@bhinestorm.com', 'Asy-Syifa CARE');
            // $mail->addAddress($email);
            // $mail->Subject = 'Receipt of Purchase';
            // $mail->isHTML(true);
            // $mail->Body = $messages;
            // $mail->send();
			
			$this->Dashboard_model->konfirmasi($nomor_invoice,"Sudah dikonfirmasi","Sudah diterima");
		}
        redirect(base_url("Admin_Dashboard/invoice/"));
	}

	public function tambahPaper()
	{
		$this->load->view('admin/a_tambahPaper');
	}

	public function editPaper()
	{
		$nomor = $this->uri->segment(3);
		$this->load->view('admin/a_editPaper',$nomor);
	}

	public function editPaperAct(){
		$nomor = $this->input->post("nomor");
		$judul = $this->input->post('judul');
		$jenis = $this->input->post('jenis');
		$tag = $this->input->post('tag');
		$isi = $this->input->post('isi');
		$isi_singkat = $this->input->post('isi_singkat');
		$gambar = $_FILES['thumbnail']['name'];
		$nama_pembuat = $_SESSION["nama_lengkap_admin"];
		$date = date("Y/m/d");


		if ($jenis == "Article"){
			$path = "./assets/img/article/";
		}else{
			$path = "./assets/img/blog/";
		}

		$config = array(
	    'upload_path' => $path,
	    'allowed_types' => "jpg|png|jpeg",
	    'overwrite' => FALSE,
	    'max_size' => "2000000", //File Size
	    'max_height' => "10000",
	    'max_width' => "10000"
	    );
		$this->load->library('upload', $config);
		$this->upload->do_upload('thumbnail');

		$save = array(
			'judul' => $judul,
			'jenis' => $jenis,
			'tags' => $tag,
			'isi' => $isi,
			'kalimat_pendek' => $isi_singkat,
			'thumbnail' => $gambar,
			'nama_pembuat' => $nama_pembuat,
			'tanggal_publish' => $date
		);

		$this->Dashboard_model->editPaper($nomor,$save);

		redirect(base_url("Admin_Dashboard/paper/"));
	}
	public function deletePaper()
	{
		$id_paper=$this->uri->segment(3);
		$where = array(
			'id_paper' => $id_paper
		);

		$this->Dashboard_model->deletePaper($where);
		redirect(base_url("Admin_Dashboard/paper/"));
	}

	public function tambahPaperAct()
	{
		$judul = $this->input->post('judul');
		$jenis = $this->input->post('jenis');
		$tag = $this->input->post('tag');
		$isi = $this->input->post('isi');
		$isi_singkat = $this->input->post('isi_singkat');
		$gambar = $_FILES['thumbnail']['name'];
		$nama_pembuat = $_SESSION["nama_lengkap_admin"];
		$date = date("Y/m/d");


		if ($jenis == "Article"){
			$path = "./assets/img/article/";
		}else{
			$path = "./assets/img/blog/";
		}

		$config = array(
	    'upload_path' => $path,
	    'allowed_types' => "jpg|png|jpeg",
	    'overwrite' => FALSE,
	    'max_size' => "2000000", //File Size
	    'max_height' => "10000",
	    'max_width' => "10000"
	    );
		$this->load->library('upload', $config);
		$this->upload->do_upload('thumbnail');

		$save = array(
			'judul' => $judul,
			'jenis' => $jenis,
			'tags' => $tag,
			'isi' => $isi,
			'kalimat_pendek' => $isi_singkat,
			'thumbnail' => $gambar,
			'nama_pembuat' => $nama_pembuat,
			'tanggal_publish' => $date
		);

		$this->Dashboard_model->tambahPaper($save);

		redirect(base_url("Admin_Dashboard/paper/"));
	}
	
	public function edit()
	{
		$nomor = $this->uri->segment(3);
		$where = array(
			'nomor_invoice' => $nomor
		);
		$result["invoice"] = $this->Dashboard_model->getInvoice($where)->result();
		$result["cart"] = $this->Dashboard_model->getCart($where)->result();
		$hasil = $this->Dashboard_model->getInvoice($where)->result();

		foreach ($hasil as $all){
				$id_user=$all->id_user;
			}
		
		$whereUser = array(
			'id_user' => $id_user
		);
		$result["user"] = $this->Dashboard_model->getUser($whereUser)->result();
		$this->load->view('admin/a_detailInvoice',$result);
	}
	
	public function delete()
	{
		$nomor_invoice=$this->uri->segment(3);
		$where = array(
			'nomor_invoice' => $nomor_invoice
		);

		$this->Dashboard_model->deleteCart($where);
		$this->Dashboard_model->deleteInvoice($where);
		redirect(base_url("Admin_Dashboard/invoice/"));
    }
}
