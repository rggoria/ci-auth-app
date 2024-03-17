<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load the model needed
        $this->load->model('Auth_model', 'authdb');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'upload', 'session'));
    }

    public function index()
    {
        if ($this->session->userdata('login_state')) {
            redirect('Profile');
        } else {
            $this->load->view('include/header');
            $this->load->view('components/navbar');
            $this->load->view('pages/auth');
            $this->load->view('include/footer');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('loginUser', 'Username/Email', 'required');
        $this->form_validation->set_rules('loginPassword', 'Password', 'required');

        // Form Validation
        if (!$this->form_validation->run()) {
            $response = array(
                'valid' => false,
                'message' => validation_errors(),
                'loginUser' => form_error('loginUser'),
                'loginPassword' => form_error('loginPassword'),
            );
        } else {
            $data['login'] = $this->input->post('loginUser');
            // $data['password'] = md5($this->input->post('loginPassword'));
            $data['password'] = $this->input->post('loginPassword');
            $account = $this->authdb->read_user($data);
            if ($account == 'no_user') {
                $response = array(
                    'valid' => false,
                    'message' => 'No account found with this username/email.',
                );
            } elseif ($account == 'wrong_password') {
                $response = array(
                    'valid' => false,
                    'message' => 'Wrong username/email or password.',
                );
            } else {
                $response = array(
                    'valid' => true,
                    'message' => $account,
                );
                $session_login = array(
                    'id' => $account->id,
                    'role' => $account->role,
                    'login_state' => 'ACTIVE',
                );

                $this->session->set_userdata($session_login);
            }
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function signup()
    {
        $this->form_validation->set_rules('signupFirstname', 'First Name', 'required|regex_match[/^[a-zA-Z].*[\s\.]*$/]');
        $this->form_validation->set_rules('signupLastname', 'Last Name', 'required|regex_match[/^[a-zA-Z].*[\s\.]*$/]');
        $this->form_validation->set_rules('signupUsername', 'Username', 'required|min_length[6]|alpha_numeric|is_unique[users.username]');
        $this->form_validation->set_rules('signupEmail', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('signupBirthday', 'Birthday', 'required');
        $this->form_validation->set_rules('signupPassword', 'Password', 'required|min_length[8]');

        // Form Validation
        if (!$this->form_validation->run()) {
            $response = array(
                'valid' => false,
                'message' => validation_errors(),
                'signupFirstname' => form_error('signupFirstname'),
                'signupLastname' => form_error('signupLastname'),
                'signupUsername' => form_error('signupUsername'),
                'signupEmail' => form_error('signupEmail'),
                'signupBirthday' => form_error('signupBirthday'),
                'signupPassword' => form_error('signupPassword'),
            );
        } else {
            $data['firstname'] = $this->input->post('signupFirstname');
            $data['lastname'] = $this->input->post('signupLastname');
            $data['username'] = $this->input->post('signupUsername');
            $data['email'] = $this->input->post('signupEmail');
            $data['birthday'] = $this->input->post('signupBirthday');
            $data['password'] = $this->input->post('signupPassword');
            $data['role'] = "USER";
            $this->authdb->create_user($data);
            $response = array(
                'valid' => true,
                'message' => 'User Successfully Registered',
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
