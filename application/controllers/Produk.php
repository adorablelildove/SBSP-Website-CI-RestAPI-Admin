<?php

class Produk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda belum login</div>');
			redirect('auth');
		} else {
			$this->load->model('Produk_model');
			$this->load->library('form_validation');
			$this->load->library('pagination');
		}
	}

	public function index()
	{
		$data['judul'] = 'Daftar Produk';
		$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		// config pagination
		$config['base_url'] = 'https://admin.develop.unja.ac.id/produk/index';
		$config['total_rows'] = $this->Produk_model->countAllProduct();
		$config['per_page'] = 2;

		// styling
		$config['full_tag_open'] = '<nav><ul class="pagination">';
		$config['full_tag_close'] = ' </ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

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
		$data['produk'] = $this->Produk_model->getSomeProduk($config['per_page'], $data['start']);
		if ($this->input->post('keyword')) {
			$data['produk'] = $this->Produk_model->cariDataProduk();
		}
		$this->load->view('templates/header_daftar_produk', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('produk/daftar_produk');
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Produk';
		$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$this->form_validation->set_rules('nama_produk', 'nama produk', 'required');
		$this->form_validation->set_rules('kd_produk', 'kode barang', 'required|is_unique[produk.kd_produk]');
		// $this->form_validation->set_rules('foto', 'foto', 'required');
		$this->form_validation->set_rules('harga', 'harga', 'required|numeric');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('produk/tambah_data');
			$this->load->view('templates/footer');
		} else {
			$this->Produk_model->tambahDataProduk();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('produk');
		}
	}

	public function hapus($id)
	{
		$this->Produk_model->hapusDataProduk($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('produk');
	}

	public function detail($id)
	{
		$data['judul'] = 'Detail data produk';
		$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$data['produk'] = $this->Produk_model->getProdukById($id);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('produk/detail_produk', $data);
		$this->load->view('templates/footer');
	}

	public function edit_produk($id)
	{
		$data['judul'] = 'Form Edit Produk';
		$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$data['produk'] = $this->Produk_model->getProdukById($id);
		$this->form_validation->set_rules('nama_produk', 'nama produk', 'required');
		$this->form_validation->set_rules('kd_produk', 'kode barang');
		// $this->form_validation->set_rules('foto', 'foto', 'required');
		$this->form_validation->set_rules('harga', 'harga', 'required|numeric');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('produk/edit_data', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Produk_model->editDataProduk();
			$this->session->set_flashdata('flash', 'Diedit');
			redirect('produk', $data);
		}
	}
}
