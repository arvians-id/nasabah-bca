<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id') && $this->session->userdata('role') == "admin") {
            redirect('admin');
        }
        if ($this->session->userdata('id') && $this->session->userdata('role') == "teller") {
            redirect('teller');
        }
        $this->session->unset_userdata('nik_norek');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login.php');
        } else {
            $this->proses_login();
        }
    }

    private function proses_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['username' => $username])->row_array();

        //jika user ada di database
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'id' => $user['id_admin'],
                    'nama' => $user['nama'],
                    'role' => $user['role'],
                    'username' => $user['username'],
                ];
                $this->session->set_userdata($data);

                if ($user['role'] == "admin") {
                    redirect('admin');
                } else if ($user['role'] == "teller") {
                    redirect('teller');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username belum terdaftar!</div>');
            redirect('login');
        }
    }
}
