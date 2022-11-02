<?php
class Contact extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda belum login</div>');
			redirect('auth');
		} else {
			$this->load->model('Contact_model');
			$this->load->library('form_validation');
		}
	}

	public function index()
	{
		$data['judul'] = 'Daftar Contact';
		$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$data['contact_us'] = $this->Contact_model->getAllContact();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('contact/daftar_contact');
		$this->load->view('templates/footer');
	}

	public function edit_data_contact($id)
	{
		$data['judul'] = 'Form Edit Contact';
		$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$data['contact_us'] = $this->Contact_model->getProdukById($id);
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('telp1', 'telp1', 'required|numeric');
		$this->form_validation->set_rules('telp2', 'telp2', 'required|numeric');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('medsos_instagram', 'medsos_instagram', 'required');
		$this->form_validation->set_rules('medsos_facebook', 'medsos_facebook', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('contact/edit_contact', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Contact_model->editContact();
			$this->session->set_flashdata('flash', 'Diedit');
			redirect('contact');
		}
	}
}
