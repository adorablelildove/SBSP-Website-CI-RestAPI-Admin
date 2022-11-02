<?php

class Blog_model extends CI_model
{
	public function getAllBlog()
	{
		return $this->db->get('blog')->result_array();
	}

	public function getSomeBlog($limit, $start)
	{
		return $this->db->get('blog', $limit, $start)->result_array();
	}

	public function countAllBlog()
	{
		return $this->db->get('blog')->num_rows();
	}


	public function tambahBlog()
	{
		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
		$config['max_size']             = 0;

		$this->load->library('upload', $config);


		$foto = $this->upload->data();
		$foto = $foto['file_name'];
		$judul_blog = $this->input->post('judul_blog', true);
		$link_video = $this->input->post('link_video', true);
		$tulisan = $this->input->post('tulisan', true);

		$data = array(
			'foto' => $foto,
			'judul_blog' => $judul_blog,
			'link_video' => $link_video,
			'tulisan' => $tulisan,
		);

		$this->db->insert('blog', $data);
	}

	public function hapusBlog($id)
	{
		$this->db->delete('blog', ['id_blog' => $id]);
	}

	public function getBlogById($id)
	{
		return $this->db->get_where('blog', ['id_blog' => $id])->row_array();
	}


	public function editBlog()
	{
		$id_blog = $this->input->post('id_blog');
		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
		$config['max_size']             = 1024;
		$config['max_width']            = 1024;
		$config['max_height']           = 1024;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')) {
			$judul_blog = $this->input->post('judul_blog', true);
			$link_video = $this->input->post('link_video', true);
			$tulisan = $this->input->post('tulisan', true);


			$data = array(
				'judul_blog' => $judul_blog,
				'link_video' => $link_video,
				'tulisan' => $tulisan,
			);

			$this->db->where('id_blog', $id_blog);
			$this->db->update('blog', $data);
		} else {
			$foto = $this->upload->data();
			$foto = $foto['file_name'];
			$judul_blog = $this->input->post('judul_blog', true);
			$link_video = $this->input->post('link_video', true);
			$tulisan = $this->input->post('tulisan', true);

			$data = array(
				'foto' => $foto,
				'judul_blog' => $judul_blog,
				'link_video' => $link_video,
				'tulisan' => $tulisan,
			);

			$this->db->where('id_blog', $id_blog);
			$this->db->update('blog', $data);
		}
	}
}
