<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('konsultasi_model');
        $this->load->model('login_model');
    }

    public function index()
    {
        $data['title'] = 'My Profile';

        $this->load->view('template/header_user', $data);
        $this->load->view('template/jumbotron');
        $this->load->view('user/home');
        $this->load->view('template/footer');
    }

    public function konsultasi()
    {
        $data['title'] = 'My Profile';

        $data['gejala'] = $this->db->get('gejala')->result_array();

        $this->load->view('template/header_user', $data);
        $this->load->view('user/konsultasi', $data);
        $this->load->view('template/footer');
    }


    public function hasil_konsul()
    {
        $data['title'] = 'My Profile';

        $konsul = $this->konsultasi_model->proses_diagnosa();

        $this->load->view('template/header_user', $data);
        $this->load->view('user/hasil_konsul', $data, $konsul);
        $this->load->view('template/footer');
    }

    public function cetak_hasil_konsul()
    {
        $data['title'] = 'My Profile';

        $konsul = $this->konsultasi_model->proses_diagnosa();

        $this->load->view('template/header_user', $data);
        $this->load->view('user/cetak_hasil_konsul', $data, $konsul);
    }
}
