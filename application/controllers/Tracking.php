<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking extends CI_Controller {

<<<<<<< HEAD
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tracking_model');
    }

    public function index()
    {
        $data = [
            'cari' => false,
            'hasil' => null
        ];

        if($this->input->post('keyword'))
        {
            $data['cari'] = true;

            $keyword = trim($this->input->post('keyword'));

            $data['hasil'] = $this->Tracking_model->cariLaundry($keyword);
        }

        $this->load->view('tracking/index',$data);
=======
    public function index()
    {
        $this->load->view('tracking/index');
>>>>>>> 1a678dd8bf37ac519780b69f9099dca1443eee6b
    }

}