<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking_model extends CI_Model {

    public function cariLaundry($keyword)
    {
        $this->db->select('
            daftar_cucian.*,
            pelanggan.nama_pelanggan,
            pelanggan.nomor_wa,
            paket_laundry.nama_paket
        ');

        $this->db->from('daftar_cucian');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = daftar_cucian.id_pelanggan');
        $this->db->join('paket_laundry', 'paket_laundry.id_paket = daftar_cucian.id_paket');

        $this->db->group_start();
        $this->db->where('daftar_cucian.no_resi', $keyword);
        $this->db->or_where('pelanggan.nomor_wa', $keyword);
        $this->db->group_end();

        $data = $this->db->get()->row_array();

        if (!empty($data)) {
            return $data;
        }

        $this->db->group_start();
        $this->db->where('no_resi', $keyword);
        $this->db->or_where('nomor_wa_arsip', $keyword);
        $this->db->group_end();

        $riwayat = $this->db->get('riwayat')->row_array();

        if (!empty($riwayat)) {
            return array(
                'nama_pelanggan' => $riwayat['nama_pelanggan_arsip'],
                'no_resi'        => $riwayat['no_resi'],
                'nomor_wa'       => $riwayat['nomor_wa_arsip'],
                'nama_paket'     => $riwayat['nama_paket_arsip'],
                'berat_laundry'  => $riwayat['berat_laundry'],
                'total_biaya'    => $riwayat['total_biaya_final'],
                'status_cucian'  => 'Selesai'
            );
        }

        return null;
    }

}