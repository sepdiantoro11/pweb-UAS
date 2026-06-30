<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

    /**
     * Mengambil semua paket laundry untuk dropdown form
     */
    public function get_all_paket() {
        return $this->db->get('paket_laundry')->result_array();
    }

    /**
     * Memeriksa keberadaan pelanggan berdasarkan kombinasi nama dan nomor WA/HP
     */
    public function get_pelanggan_by_creds($nama, $nomor_wa) {
        $this->db->where('nama_pelanggan', $nama);
        $this->db->where('nomor_wa', $nomor_wa);
        $query = $this->db->get('pelanggan');
        return $query->row_array();
    }

    /**
     * Menyimpan data pelanggan baru jika belum terdaftar
     */
    public function insert_pelanggan($data) {
        $this->db->insert('pelanggan', $data);
        return $this->db->insert_id(); // Mengembalikan ID pelanggan yang baru dibuat
    }

    /**
     * Mengambil detail harga paket laundry berdasarkan ID Paket
     */
    public function get_paket_by_id($id_paket) {
        $this->db->where('id_paket', $id_paket);
        return $this->db->get('paket_laundry')->row_array();
    }

    /**
     * Menyimpan data transaksi akhir ke tabel daftar_cucian
     */
    public function insert_cucian($data) {
        return $this->db->insert('daftar_cucian', $data);
    }
}