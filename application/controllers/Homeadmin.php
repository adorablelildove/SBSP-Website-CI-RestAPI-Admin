<?php

class Homeadmin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda belum login</div>');
			redirect('auth');
		} else {
			$this->load->model('Home_model');
		}
	}
	public function index()
	{
		$data['judul'] = 'Halaman Home';
		$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->helper('form');
		$hasil['produk'] = $this->Home_model->getCountProduk();
		$hasil['contact_us'] = $this->Home_model->getCountContact();
		$hasil['blog'] = $this->Home_model->getCountBlog();
		$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('home/index', $hasil);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/footer');
	}
}
