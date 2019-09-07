<?php
	
	class Paper_model extends CI_Model{
		public function __construct()
		{
			parent::__construct();
		}

		public function getSelectArticle($where)
		{
			return $this->db->get_where("tb_paper",$where);
		}

		public function getAllArticle()
		{
			$this->db->where('jenis','Article');
			return $this->db->get("tb_paper");
		}

		public function getAllBlog()
		{
			$this->db->where('jenis','Blog');
			return $this->db->get("tb_paper");
		}

		public function getAllBlogThree()
		{
			$this->db->select('*');
			$this->db->from('tb_paper');
			$this->db->where('jenis','Blog');
			$this->db->order_by('tanggal_publish','DESC');
	        $this->db->limit(3);
	        return $this->db->get();
		}

		public function getComment($id)
		{
			$where="id_paper = $id";
			$this->db->select('*');
	        $this->db->from('tb_comment');
	        $this->db->where($where);
	        return $this->db->get();
		}

		public function recentPost()
		{
			$this->db->select('*');
	        $this->db->from('tb_paper');
	        $this->db->where('jenis','Article');
	        $this->db->order_by('tanggal_publish','DESC');
	        $this->db->limit(3);
	        return $this->db->get();
		}

		public function recentPostBlog()
		{
			$this->db->select('*');
	        $this->db->from('tb_paper');
	        $this->db->where('jenis','Blog');
	        $this->db->order_by('tanggal_publish','DESC');
	        $this->db->limit(3);
	        return $this->db->get();
		}

		public function tagsBlog()
		{
			$this->db->select('*');
	        $this->db->from('tb_paper');
	        $this->db->where('jenis','Blog');
	        $this->db->order_by('rand()');
	        $this->db->limit(8);
	        return $this->db->get();
		}

		public function tags()
		{
			$this->db->select('*');
	        $this->db->from('tb_paper');
	        $this->db->where('jenis','Article');
	        $this->db->order_by('rand()');
	        $this->db->limit(8);
	        return $this->db->get();
		}

		public function insertComment($save){
			return $this->db->insert("tb_comment",$save);
		}
	}
?>