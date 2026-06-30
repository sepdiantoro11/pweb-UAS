<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir_model extends CI_Model {

    public function register($data) {
        return $this->db->insert('kasir', $data);
    }

    public function check_email_exists($email) {
        $query = $this->db->get_where('kasir', array('email' => $email));
        return $query->num_rows() > 0;
    }

    public function login_check($nama, $email) {
        $this->db->where('nama_kasir', $nama);
        $this->db->where('email', $email);
        $query = $this->db->get('kasir');
        
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}