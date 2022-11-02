<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Halaman Login';
            $this->load->view('templates/login_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/login_footer');
        } else {
            //validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['username' => $username])->row_array();

        //ada admin 
        if ($admin) {
            //jika admin aktif
            if ($admin['is_active'] == 1) {
                //cek password
                if (password_verify($password, $admin['password'])) {
                    $data = [
                        'username' => $admin['username']
                    ];
                    $this->session->set_userdata($data);
                    redirect('homeadmin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah.</div>');
                    redirect('auth');
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login Gagal..</div>');
            redirect('auth');
        }
    }

    public function register()
    {
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda belum login</div>');
            redirect('auth');
        } else {
            $this->load->library('form_validation');
        }
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[admin.username]', [
            'is_unique' => 'username sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[konf_pass]', [
            'matches' => 'Password tidak sama!!',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('konf_pass', 'Konfirmasi password', 'trim|required|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Halaman Registrasi';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/login_footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'is_active' => 1,

            ];

            $this->db->insert('admin', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi berhasil, Lakukan Login.</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout berhasil.</div>');
        redirect('auth');
    }
}
