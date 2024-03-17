<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load the model needed
        $this->load->model('Auth_model', 'authdb');
        // Load the model needed
        $this->load->model('Auth_model', 'authdb');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'pagination', 'upload', 'session'));
    }

    public function index()
    {
        $data['user'] = $this->authdb->read_profile($this->session->userdata('id'));
        if ($this->session->userdata('login_state')) {
            $this->load->view('include/header');
            $this->load->view('components/navbar');
            $this->load->view('pages/profile', $data);
            $this->load->view('include/footer');
        } else {
            redirect('Auth');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
