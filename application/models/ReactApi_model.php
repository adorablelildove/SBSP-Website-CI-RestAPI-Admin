<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReactApi_model extends CI_model {

	public function get_products()
	{
		$query = $this->db->get('produk',3,0);
		return $query->result();
	}

	public function get_blogs()
	{
		$query = $this->db->get('blog');
		return $query->result();
	}

	public function get_blog_details($id_blog)
	{
		
		$query = $this->db->get_where('blog', array('id_blog' => $id_blog));
        return $query->result();  
	}

	public function blogSidebar()
	{
		$query = $this->db->get('blog', 3, 0);
		return $query->result();
	}

	public function get_all_products()
	{
		$query = $this->db->get('produk');
		return $query->result();
	}

	public function countAllProducts()
	{
		$query = $this->db->get('produk')->num_rows();
		return $query->result();
	}

}

 ?>