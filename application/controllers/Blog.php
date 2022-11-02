<?php

class Blog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda belum login</div>');
			redirect('auth');
		} else {
			$this->load->model('Blog_model');
			$this->load->library('form_validation');
			$this->load->library('pagination');
		}
	}

	public function index()
	{
		$data['judul'] = 'Daftar Blog';
		$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		// config pagination
		$config['base_url'] = 'https://admin.develop.unja.ac.id/blog/index';
		$config['total_rows'] = $this->Blog_model->countAllBlog();
		$config['per_page'] = 2;

		// styling
		$config['full_tag_open'] = '<nav><ul class="pagination">';
		$config['full_tag_close'] = ' </ul></nav>';

		// $config['first_link'] = 'First';
		// $config['first_tag_open'] = '<li class="page-item">';
		// $config['first_tag_close'] = '</li>';

		// $config['last_link'] = 'Last';
		// $config['last_tag_open'] = '<li class="page-item">';
		// $config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		// initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['blog'] = $this->Blog_model->getSomeBlog($config['per_page'], $data['start']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('blog/daftar_blog');
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Blog';
		$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$this->form_validation->set_rules('judul_blog', 'Judul blog', 'required');
		$this->form_validation->set_rules('tulisan', 'tulisan', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('blog/tambah_blog');
			$this->load->view('templates/footer');
		} else {
			$this->Blog_model->tambahBlog();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('blog');
		}
	}

	public function hapus($id)
	{
		$this->Blog_model->hapusBlog($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('blog');
	}

	public function edit_blog($id)
	{
		$data['judul'] = 'Form Edit Blog';
		$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$data['blog'] = $this->Blog_model->getBlogById($id);
		$this->form_validation->set_rules('judul_blog', 'Judul blog', 'required');
		$this->form_validation->set_rules('tulisan', 'tulisan', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('blog/edit_data_blog', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Blog_model->editBlog();
			$this->session->set_flashdata('flash', 'Diedit');
			redirect('blog');
		}
	}
}
