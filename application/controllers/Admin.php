<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        $this->load->model('konsultasi_model');
        $this->load->model('perawatan_model');
        $this->load->model('login_model');
    }

    public function index()
    {

        $data['title'] = 'Data Admin';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['admin'] = $this->db->get('admin')->result_array();

        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[admin.username]', ['is_unique' => 'Username ini sudah terdaftar!']);
        $this->form_validation->set_rules('password', 'password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header_admin', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/data_admin', $data);
            $this->load->view('template/footer_admin');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
            ];
            $this->db->insert('admin', $data);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
        admin baru ditambahkan!</div>');
            redirect('admin');
        }
    }

    public function penyakit_solusi()
    {
        $data['title'] = 'Data Penyakit';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['penyakit'] = $this->db->get('penyakit_solusi')->result_array();

        $this->form_validation->set_rules('kd_penyakit', 'kd_penyakit', 'required|trim|is_unique[penyakit_solusi.kd_penyakit]', ['is_unique' => 'Kode Penyakit ini sudah terdaftar!']);
        $this->form_validation->set_rules('nama_penyakit', 'nama_penyakit', 'required|trim|is_unique[penyakit_solusi.nama_penyakit]', ['is_unique' => 'Nama Penyakit ini sudah terdaftar!']);
        $this->form_validation->set_rules('definisi', 'definisi', 'required');
        $this->form_validation->set_rules('solusi', 'solusi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header_admin', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/penyakit_solusi', $data);
            $this->load->view('template/footer_admin');
        } else {
            $data = [
                'kd_penyakit' => $this->input->post('kd_penyakit'),
                'nama_penyakit' => $this->input->post('nama_penyakit'),
                'definisi' => $this->input->post('definisi'),
                'solusi' => $this->input->post('solusi'),
            ];
            $this->db->insert('penyakit_solusi', $data);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
            penyakit baru ditambahkan!</div>');
            redirect('admin/penyakit_solusi');
        }
    }

    public function gejala()
    {
        $data['title'] = 'Data Gejala';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['gejala'] = $this->db->get('gejala')->result_array();

        $this->form_validation->set_rules('kd_gejala', 'kode gejala', 'required|trim|is_unique[gejala.kd_gejala]', ['is_unique' => 'Kode Gejala ini sudah terdaftar!']);
        $this->form_validation->set_rules('gejala', 'nama gejala', 'required|trim|is_unique[gejala.gejala]', ['is_unique' => 'Nama Gejala ini sudah terdaftar!']);


        if ($this->form_validation->run() == false) {
            $this->load->view('template/header_admin', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/gejala', $data);
            $this->load->view('template/footer_admin');
        } else {
            $data = [
                'kd_gejala' => $this->input->post('kd_gejala'),
                'gejala' => $this->input->post('gejala'),

            ];
            $this->db->insert('gejala', $data);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
            Gejala baru ditambahkan!</div>');
            redirect('admin/gejala');
        }
    }

    public function relasi()
    {
        $data['title'] = 'Data Relasi';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['penyakit'] = $this->db->get('penyakit_solusi')->result_array();
        $data['gejala'] = $this->db->get('gejala')->result_array();
        $data['relasi'] = $this->konsultasi_model->getrelasi();


        $this->form_validation->set_rules('kd_penyakit', 'nama penyakit', 'required');
        $this->form_validation->set_rules('kd_gejala', 'nama gejala', 'required');
        $this->form_validation->set_rules('bobot', 'bobot', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('template/header_admin', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/relasi', $data);
            $this->load->view('template/footer_admin');
        } else {
            $data = [
                'kd_penyakit' => $this->input->post('kd_penyakit'),
                'kd_gejala' => $this->input->post('kd_gejala'),
                'bobot' => $this->input->post('bobot'),

            ];
            $this->db->insert('relasi', $data);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
            penyakit baru ditambahkan!</div>');
            redirect('admin/relasi');
        }
    }

    public function laporan_user()
    {
        $data['title'] = 'Laporan  User';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/header_admin', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/laporan_user', $data);
        $this->load->view('template/footer_admin');
    }
}
