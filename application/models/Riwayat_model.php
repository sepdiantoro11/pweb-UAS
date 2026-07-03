<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_model extends CI_Model {

    public function getAll() {
        $this->db->order_by('tgl_diambil', 'DESC');
        return $this->db->get('riwayat')->result_array();
    }

    public function searchRiwayat($search) {
        $this->db->order_by('tgl_diambil', 'DESC');
        $this->db->from('riwayat');

        $this->db->group_start();
        $this->db->like('nama_pelanggan_arsip', $search);
        $this->db->or_like('no_resi', $search);
        $this->db->or_like('nama_paket_arsip', $search);
        $this->db->or_like('status_cucian', $search);
        $this->db->group_end();

        return $this->db->get()->result_array();
    }

    public function getById($id) {
        return $this->db->get_where('riwayat', ['id_riwayat' => $id])->row_array();
    }

    public function deleteRiwayat($id) {
        $this->db->where('id_riwayat', $id);
        return $this->db->delete('riwayat');
    }   

    public function update($id, $data_riwayat, $status_cucian) {
        $data_riwayat['status_cucian'] = $status_cucian;

        $this->db->where('id_riwayat', $id);
        $this->db->update('riwayat', $data_riwayat);

        $riwayat = $this->getById($id);
        if ($riwayat && $riwayat['id_cucian']) {
            $exists = $this->db->get_where('daftar_cucian', ['id_cucian' => $riwayat['id_cucian']])->row();
            if ($exists) {
                $this->db->where('id_cucian', $riwayat['id_cucian']);
                $this->db->update('daftar_cucian', ['status_cucian' => $status_cucian]);
            }
        }
    }
}