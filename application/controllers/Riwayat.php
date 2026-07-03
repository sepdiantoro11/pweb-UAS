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
        $search = $this->input->get('search');

        $data['search'] = $search;

        if ($search) {
            $data['riwayat'] = $this->Riwayat_model->searchRiwayat($search);
        } else {
            $data['riwayat'] = $this->Riwayat_model->getAll();
        }

        $this->load->view('riwayat/index', $data);
    }

    public function hapus($id) {
        $riwayat = $this->Riwayat_model->getById($id);

        if (!$riwayat) {
            $this->session->set_flashdata('swal', array(
                'icon'  => 'warning',
                'title' => 'Tidak Ditemukan!',
                'text'  => 'Data riwayat tidak ditemukan.'
            ));
            redirect('riwayat');
        }

        $this->Riwayat_model->deleteRiwayat($id);

        $this->session->set_flashdata('swal', array(
            'icon'  => 'success',
            'title' => 'Berhasil!',
            'text'  => 'Data riwayat transaksi berhasil dihapus.'
        ));

        redirect('riwayat');
    }
}