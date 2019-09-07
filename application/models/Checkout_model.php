<?php
	
	class Checkout_model extends CI_Model{
		public function __construct()
		{
			parent::__construct();
		}

		public function getNomor()
		{
			$this->db->select('nomor_invoice');
			$this->db->from('tb_invoice');
			return $this->db->get();
		}

		public function insert($save){
			return $this->db->insert("tb_invoice",$save);
		}

		public function ubahNomor($id_user,$nomor_invoice)
		{
			$where = "id_user = '$id_user' AND nomor_invoice = 101 ";
			$this->db->set('nomor_invoice', $nomor_invoice);
			$this->db->where($where);
			$this->db->update('tb_cart');
		}

		public function kurangProduct($idid,$quantity)
		{
			$where = "id_product = '$idid'";
			$this->db->set('stock', 'stock-'.$quantity, FALSE);
			$this->db->where($where);
			$this->db->update('tb_products');
		}

		public function getIdProduct($nomor_invoice)
		{
			$this->db->select('*');
			$this->db->from('tb_cart');
			$this->db->where("nomor_invoice = $nomor_invoice");
			return $this->db->get();
		}

		public function orderProduct($id_user,$nomor_invoice,$gambar)
		{
			$res = array(
              'bukti_transaksi' => $gambar,
              'status_pembayaran' => 'Sudah dibayar',
              'status_penerimaan_barang' => 'Belum dikirim'
            );
			$where = "id_user = $id_user AND nomor_invoice = $nomor_invoice ";
			$this->db->where($where);
			$this->db->update('tb_invoice',$res);
		}

		public function getPembayaran($where)
		{
			return $this->db->get_where("tb_invoice",$where);
		}

		public function getBayaran($id_user)
		{
			$where="id_user=$id_user AND (status_pembayaran = 'Belum dibayar' OR status_pembayaran = 'Bukti Transfer Salah')";
			$this->db->select('*');
			$this->db->from('tb_invoice');
			$this->db->where($where);
			return $this->db->get();
		}
	}

?>