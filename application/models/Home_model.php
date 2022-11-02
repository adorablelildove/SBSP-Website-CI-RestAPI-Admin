<?php

class Home_model extends CI_model
{
    public function getCountProduk()
    {
        return $this->db->from('produk')->count_all_results();
    }

    public function getCountContact()
    {
        return $this->db->from('contact_us')->count_all_results();
    }

    public function getCountBlog()
    {
        return $this->db->from('blog')->count_all_results();
    }
}
