<?php
	
	class Product_model extends CI_Model{
		public function __construct()
		{
			parent::__construct();
		}

		public function getBest()
		{
			$this->db->select('tb_reviews.id_product, AVG(tb_reviews.rating), tb_products.nama_product, tb_products.harga_product, tb_products.gambar_product');
			$this->db->from('tb_reviews');
			$this->db->join('tb_products', 'tb_products.id_product = tb_reviews.id_product', 'RIGHT');
			$this->db->group_by('id_product');
			$this->db->order_by('AVG(rating) DESC');
			$this->db->limit(2);
			return $this->db->get();
		}
		public function getSearchParameter($search)
		{
			$where = "jenis_product LIKE '%$search%' OR nama_product LIKE '%$search%'";
			$this->db->select('*');
	        $this->db->from('tb_products');
	        $this->db->where($where);
	        return $this->db->get();
		}

		public function getAllParameterSearch($type,$search)
		{
			$where = "jenis_product LIKE '%$type%' AND (jenis_product LIKE '%$search%' OR nama_product LIKE '%$search%')";
			$this->db->select('*');
	        $this->db->from('tb_products');
	        $this->db->where($where);
	        return $this->db->get();
		}

		public function getallParameterSortSearch($sortir,$urut,$search)
		{
			$where = "jenis_product LIKE '%$search%' OR nama_product LIKE '%$search%'";
			$this->db->select('*');
	        $this->db->from('tb_products');
	        $this->db->where($where);
	        $this->db->order_by($sortir, $urut);
	        return $this->db->get();
		}

		public function getAllParameter($table,$where)
		{
			return $this->db->get_where($table,$where);
		}

		public function getLimit($jenisProduct){   
	        $this->db->select('*');
	        $this->db->from('tb_products');
	        $this->db->where('jenis_product',$jenisProduct);
	        $this->db->order_by('rand()');
	        $this->db->limit(4);
	        return $this->db->get();
	    }

		public function getAll($table)
		{
			return $this->db->get($table);
		}

		public function getallParameterSort($sortir,$urut){   
	        $this->db->select('*');
	        $this->db->from('tb_products');
	        $this->db->order_by($sortir, $urut);
	        return $this->db->get();
	    }

	    public function getallParameterSortProduct($sortir,$urut,$jenisProduct){   
	        $this->db->select('*');
	        $this->db->from('tb_products');
	        $this->db->where('jenis_product',$jenisProduct);
	        $this->db->order_by($sortir, $urut);
	        return $this->db->get();
	    }
	}

?>