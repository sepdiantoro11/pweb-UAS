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

    public function ubah($id) {
        $riwayat = $this->Riwayat_model->getById($id);
        if (!$riwayat) {
            $this->session->set_flashdata('swal', [
                'icon'  => 'warning',
                'title' => 'Tidak Ditemukan!',
                'text'  => 'Data riwayat tidak ditemukan.'
            ]);
            redirect('riwayat');
        }

        $this->form_validation->set_rules('nama_pelanggan_arsip', 'Nama Pelanggan', 'required|trim|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('nama_paket_arsip', 'Nama Paket', 'required|trim|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('total_biaya_final', 'Total Biaya', 'required|numeric');
        $this->form_validation->set_rules('status_cucian', 'Status Cucian', 'required|in_list[Diproses,Selesai Dicuci]');

        if ($this->form_validation->run() == FALSE) {
            $data['riwayat'] = $riwayat;
            $this->load->view('riwayat/form', $data);
        } else {
            $data_riwayat = [
                'nama_pelanggan_arsip' => $this->input->post('nama_pelanggan_arsip', TRUE),
                'nama_paket_arsip'     => $this->input->post('nama_paket_arsip', TRUE),
                'total_biaya_final'    => $this->input->post('total_biaya_final', TRUE),
            ];

            $status_cucian = $this->input->post('status_cucian', TRUE);

            $this->Riwayat_model->update($id, $data_riwayat, $status_cucian);

            $this->session->set_flashdata('swal', [
                'icon'  => 'success',
                'title' => 'Berhasil!',
                'text'  => 'Data riwayat berhasil diperbarui.'
            ]);
            redirect('riwayat');
        }
    }
}
