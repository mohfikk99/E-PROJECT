<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->load->view('template/header_user');
        $this->load->view('Auth/login');
        $this->load->view('template/footer');
    }

    public function proses_login()
    {


        //set form validation
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        //set message form validation
        $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

        //cek validasi
        if ($this->form_validation->run() == TRUE) {

            //get data dari FORM
            $username = $this->input->post("username", TRUE);
            $password = $this->input->post('password');

            //checking data via model
            $checking = $this->Login_model->check_login('admin', array('username' => $username), array('password' => $password));

            //jika ditemukan, maka create session
            if ($checking != FALSE) {
                foreach ($checking as $apps) {

                    $session_data = array(

                        'username' => $apps->username,
                        'user_pass' => $apps->password,
                        'level'      => $apps->level
                    );
                    //set session userdata
                    $this->session->set_userdata($session_data);

                    //redirect berdasarkan level user
                    if ($this->session->userdata("level") == "admin") {
                        redirect('admin');
                    }
                }
            } else {

                $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> MAAF</b> username atau password salah!</div></div>';
                $this->load->view('template/header_user');
                $this->load->view('Auth/login', $data);
                $this->load->view('template/footer');
            }
        } else {

            $this->load->view('template/header_user');
            $this->load->view('Auth/login');
            $this->load->view('template/footer');
        }
    }
}
