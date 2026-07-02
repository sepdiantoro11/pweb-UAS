<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

    public function get_all_paket() {
        return $this->db->get('paket_laundry')->result_array();
    }

    public function get_paket_by_id($id) {
        return $this->db->get_where('paket_laundry', array('id_paket' => $id))->row_array();
    }

    public function get_pelanggan_by_creds($nama, $nomor_hp) {
        $this->db->where('nama_pelanggan', $nama);
        $this->db->where('nomor_wa', $nomor_hp);
        $query = $this->db->get('pelanggan');
        return $query->row_array();
    }

    public function insert_pelanggan($data) {
        $this->db->insert('pelanggan', $data);
        return $this->db->insert_id();
    }

    public function insert_cucian($data) {
        return $this->db->insert('daftar_cucian', $data);
    }
}
