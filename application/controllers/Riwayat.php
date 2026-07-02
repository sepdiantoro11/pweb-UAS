<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silakan login terlebih dahulu.</div>');
            redirect('auth');
        }
        $this->load->model('Riwayat_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['riwayat'] = $this->Riwayat_model->getAll();
        $this->load->view('riwayat/index', $data);
    }
}
