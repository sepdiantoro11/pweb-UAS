<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Proteksi Halaman: Wajib login terlebih dahulu sebelum mengakses data pelanggan
        if (!$this->session->userdata('login')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silakan login terlebih dahulu.</div>');
            redirect('auth');
        }
        $this->load->model('Pelanggan_model');
    }

    public function index() {
        // Set aturan validasi formulir input
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|trim|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('paket', 'Paket Laundry', 'required');
        $this->form_validation->set_rules('berat', 'Berat Cucian', 'required');
        $this->form_validation->set_rules(
            'berat', 
            'Berat Cucian', 
            'required|regex_match[/^[0-9]+([.,][0-9]+)?$/]',
            array('regex_match' => '%s harus berupa angka bulat atau desimal (contoh: 3 atau 3.5).')
        );

        if ($this->form_validation->run() == FALSE) {
            // Ambil data paket untuk dropdown form view
            $data['paket_list'] = $this->Pelanggan_model->get_all_paket();
            $this->load->view('pelanggan/index', $data);
        } else {
            // Jalankan proses penyimpanan berurutan saat tombol Simpan ditekan
            $nama      = $this->input->post('nama', TRUE);
            $nomor_hp  = $this->input->post('nomor_hp', TRUE);
            $alamat    = $this->input->post('alamat', TRUE);
            $id_paket  = $this->input->post('paket', TRUE);
            $berat     = $this->input->post('berat', TRUE);

            // 1. Cek atau daftarkan entitas pelanggan baru
            $pelanggan = $this->Pelanggan_model->get_pelanggan_by_creds($nama, $nomor_hp);
            
            if ($pelanggan) {
                $id_pelanggan = $pelanggan['id_pelanggan'];
            } else {
                $data_pelanggan = array(
                    'nama_pelanggan' => $nama,
                    'nomor_wa'       => $nomor_hp,
                    'alamat'         => $alamat
                );
                $id_pelanggan = $this->Pelanggan_model->insert_pelanggan($data_pelanggan);
            }

            // 2. Ambil detail harga paket laundry
            $paket = $this->Pelanggan_model->get_paket_by_id($id_paket);
            $harga_per_kg = isset($paket['harga_per_kg']) ? $paket['harga_per_kg'] : 0;

            // 3. Hitung otomatis total biaya (Berat Cucian x Harga Paket)
            $total_biaya = $berat * $harga_per_kg;

            // 4. Ambil ID Kasir dari Session aktif
            $id_kasir = $this->session->userdata('id_kasir');

            // 5. Input Tanggal Masuk dengan timezone Asia/Jakarta
            date_default_timezone_set('Asia/Jakarta');
            $tgl_masuk = date('Y-m-d H:i:s');

            // 6. Set status awal default
            $status_cucian = 'Diproses';

            // 7. Simpan data lengkap ke tabel daftar_cucian
            $data_cucian = array(
                'id_pelanggan'  => $id_pelanggan,
                'id_kasir'      => $id_kasir,
                'id_paket'      => $id_paket,
                'berat_laundry' => $berat,
                'total_biaya'   => $total_biaya,
                'tgl_masuk'     => $tgl_masuk,
                'status_cucian' => $status_cucian
            );

            $this->Pelanggan_model->insert_cucian($data_cucian);

            // Tampilkan Bootstrap Alert Sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data pelanggan berhasil disimpan.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            
            // Redirect kembali ke halaman yang sama untuk membersihkan input form data lama
            redirect('pelanggan');
        }
    }
}