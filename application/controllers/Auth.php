<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kasir_model');
    }

    public function index() {
        // if ($this->session->userdata('login')) {
        //     redirect('dashboard');
        // }
        $action = $this->input->post('action');

        if ($action === 'daftar') {
            $this->_proses_daftar();
        } elseif ($action === 'masuk') {
            $this->_proses_masuk();
        } else {
            $this->load->view('auth/login');
        }
    }

    private function _proses_daftar() {
        // Set aturan validasi form
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $email = $this->input->post('email', TRUE);

            // Periksa kecocokan email unik
            if ($this->Kasir_model->check_email_exists($email)) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tersebut sudah terdaftar!</div>');
                $this->load->view('auth/login');
            } else {
                $data = array(
                    'nama_kasir' => $this->input->post('nama', TRUE),
                    'email'      => $email,
                    'password'   => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                );
                $this->Kasir_model->register($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Akun berhasil didaftarkan. Silakan login menggunakan akun yang telah dibuat.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                redirect('auth');
            }
        }
    }

    private function _proses_masuk() {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $nama     = $this->input->post('nama', TRUE);
            $email    = $this->input->post('email', TRUE);
            $password = $this->input->post('password');

            // Cari kasir berdasarkan nama_kasir dan email menggunakan query builder di model
            $user = $this->Kasir_model->login_check($nama, $email);

            if ($user) {
                if (password_verify($password, $user->password)) {
                    $session_data = array(
                        'id_kasir'   => $user->id_kasir,
                        'nama_kasir' => $user->nama_kasir,
                        'email'      => $user->email,
                        'login'      => TRUE
                    );
                    $this->session->set_userdata($session_data);
                    redirect('pelanggan');
                } else {
                    $this->_set_login_failed_alert();
                }
            } else {
                $this->_set_login_failed_alert();
            }
        }
    }

    private function _set_login_failed_alert() {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Nama, Email, atau Password yang Anda masukkan salah.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('auth');
    }

    public function logout() {
        $this->session->unset_userdata('id_kasir');
        $this->session->unset_userdata('nama_kasir');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('login');
        redirect('auth');
    }
}