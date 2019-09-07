<?php
	
	class Cart_model extends CI_Model{
		public function __construct()
		{
			parent::__construct();
		}

		public function insert($save){
			return $this->db->insert("tb_cart",$save);
		}

		public function getPembayaran($where)
		{
			return $this->db->get_where("tb_invoice",$where);
		}

		
		public function cartCheck($id_product)
		{
			$where = "id_product = $id_product AND nomor_invoice = 101";
			$this->db->where($where);
			$this->db->from("tb_cart");
			$query = $this->db->get();
			if ($query->num_rows() > 0){
				return $query->result();
			}else{
				return $query->result();
			}
		}
		public function updateSame($id_product,$quantityNew)
		{
			$where = "id_product = $id_product AND nomor_invoice = 101";
			$this->db->set('quantity', 'quantity+'.$quantityNew,FALSE);
			$this->db->where($where);
			$this->db->update('tb_cart');
		}

		public function plus($where)
		{
			$this->db->set('quantity', 'quantity+1',FALSE);
			$this->db->where($where);
			$this->db->update('tb_cart');
		}

		public function minus($where)
		{
			$this->db->set('quantity', 'quantity-1',FALSE);
			$this->db->where($where);
			$this->db->update('tb_cart');
		}

		public function delete($where)
		{
			$this->db->where($where);
			$this->db->delete('tb_cart');
		}

		public function getCart($where){
			return $this->db->get_where('tb_cart',$where);		
		}
	}

?>