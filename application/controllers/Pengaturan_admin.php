<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan_admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('Pengaturan_admin_model');
    $this->load->model('login_model');
  }

  public function index()
  {
    $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();


    $this->load->view('pengaturan_admin/akses');
  }

  public function edit_penyakit($kd_penyakit)
  {

    $data['title'] = 'Ubah Penyakit';
    $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

    $where = array('kd_penyakit' => $kd_penyakit);
    $data['penyakit'] = $this->Pengaturan_admin_model->edit_data($where, 'penyakit_solusi')->result();

    $this->load->view('template/header_admin');
    $this->load->view('template/sidebar');
    $this->load->view('template/topbar', $data);
    $this->load->view('pengaturan_admin/edit_penyakit', $data);
    $this->load->view('template/footer_admin');
  }

  public function update_penyakit()
  {
    $kd_penyakit = $this->input->post('kd_penyakit');
    $nama_penyakit = $this->input->post('nama_penyakit');
    $definisi = $this->input->post('definisi');
    $solusi = $this->input->post('solusi');

    $data = array(
      'nama_penyakit' => $nama_penyakit,
      'definisi' => $definisi,
      'solusi' => $solusi,
    );

    $where = array(
      'kd_penyakit' => $kd_penyakit
    );

    $this->Pengaturan_admin_model->update_data($where, $data, 'penyakit_solusi');
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
      Penyakit telah berhasil di edit</div>');
    redirect('admin/penyakit_solusi');
  }


  public function hapus_penyakit($kd_penyakit)
  {

    $this->Pengaturan_admin_model->hapus_penyakit($kd_penyakit);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    Penyakit telah berhasil dihapus</div>');
    redirect('admin/penyakit_solusi');
  }


  public function edit_gejala($kd_gejala)
  {

    $data['title'] = 'Ubah gejala';
    $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

    $where = array('kd_gejala' => $kd_gejala);
    $data['gejala'] = $this->Pengaturan_admin_model->edit_data($where, 'gejala')->result();

    $this->load->view('template/header_admin');
    $this->load->view('template/sidebar');
    $this->load->view('template/topbar', $data);
    $this->load->view('pengaturan_admin/edit_gejala', $data);
    $this->load->view('template/footer_admin');
  }

  public function update_gejala()
  {
    $kd_gejala = $this->input->post('kd_gejala');
    $gejala = $this->input->post('gejala');


    $data = array(
      'gejala' => $gejala,
    );

    $where = array(
      'kd_gejala' => $kd_gejala
    );

    $this->Pengaturan_admin_model->update_data($where, $data, 'gejala');
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
      Gejala telah berhasil di edit</div>');
    redirect('admin/gejala');
  }


  public function hapus_gejala($kd_gejala)
  {

    $this->Pengaturan_admin_model->hapus_gejala($kd_gejala);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    gejala telah berhasil dihapus</div>');
    redirect('admin/gejala');
  }


  public function edit_relasi($id_relasi)
  {

    $data['title'] = 'Ubah Relasi';
    $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

    $data['relasi'] = $this->Pengaturan_admin_model->getRelasi($id_relasi);
    $data['gejala'] = $this->db->get('gejala')->result_array();
    $data['penyakit'] = $this->db->get('penyakit_solusi')->result_array();

    $this->load->view('template/header_admin', $data);
    $this->load->view('template/sidebar');
    $this->load->view('template/topbar', $data);
    $this->load->view('pengaturan_admin/edit_relasi', $data);
    $this->load->view('template/footer_admin');
  }

  public function update_relasi()
  {
    $id_relasi = $this->input->post('id_relasi');
    $kd_gejala = $this->input->post('kd_gejala');
    $kd_penyakit = $this->input->post('kd_penyakit');
    $bobot = $this->input->post('bobot');


    $data = array(
      'kd_gejala' => $kd_gejala,
      'kd_penyakit' => $kd_penyakit,
      'bobot' => $bobot,
    );

    $where = array(
      'id_relasi' => $id_relasi
    );

    $this->Pengaturan_admin_model->update_data($where, $data, 'relasi');
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
      Relasi telah berhasil di edit</div>');
    redirect('admin/relasi');
  }


  public function hapus_relasi($id_relasi)
  {

    $this->Pengaturan_admin_model->hapus_relasi($id_relasi);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    Relasi telah berhasil dihapus</div>');
    redirect('admin/relasi');
  }

  public function edit_admin($id)
  {

    $data['title'] = 'Ubah admin';
    $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

    $where = array('id' => $id);
    $data['admin'] = $this->Pengaturan_admin_model->edit_data($where, 'admin')->result();

    $this->load->view('template/header_admin');
    $this->load->view('template/sidebar');
    $this->load->view('template/topbar', $data);
    $this->load->view('pengaturan_admin/edit_admin', $data);
    $this->load->view('template/footer_admin');
  }

  public function update_admin()
  {
    $id = $this->input->post('id');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $level = $this->input->post('level');


    $data = array(
      'username' => $username,
      'password' => $password,
      'level' => $level,
    );

    $where = array(
      'id' => $id,
    );

    $this->Pengaturan_admin_model->update_data($where, $data, 'admin');
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
      admin telah berhasil di edit</div>');
    redirect('admin');
  }


  public function hapus_admin($id)
  {

    $this->Pengaturan_admin_model->hapus_admin($id);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    admin telah berhasil dihapus</div>');
    redirect('admin');
  }
}
