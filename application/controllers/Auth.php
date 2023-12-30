<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('layout/auth_header');
        $this->load->view('auth/login');
        $this->load->view('layout/auth_footer');
    }

    public function login()
{
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == false) {
        // Validation failed, show login form with errors
        $this->load->view('auth/login');
    } else {
        // Validation passed, proceed with login
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->load->model('auth_model'); // Load the model

        $user = $this->auth_model->check_login($email, $password);

        if ($user) {
            // Password is correct, set session and redirect
            $data = [
                'email' => $user['email'],
                'role' => $user['role']
                // You can add more user data to the session as needed
            ];

            $this->session->set_userdata($data);

            // Redirect to the appropriate home page based on the user role
            if ($user['role'] == 'admin') {
                redirect('Admin/home');
            } else {
                // Check if the user has completed the survey (based on your database structure)
                $email = $this->session->userdata('email');
                $user = $this->db->get_where('pelamar', ['email' => $email])->row_array();

                if (!$user || empty($user['bakat'])) {
                    // If the user has not completed the survey, redirect to the survey page
                    redirect('Pelamar/survey');
                } else {
                    redirect('pelamar/home');
                }
            }
        } else {
            // Incorrect email or password
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong email or password!</div>');
            redirect('Auth');
        }
    }
}



    public function register()
    {
        $this->load->view('layout/auth_header');
        $this->load->view('auth/registrasi');
        $this->load->view('layout/auth_footer');
    }
    public function do_register()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('email', 'Alamat Email', 'trim|required|valid_email|is_unique[pelamar.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('re_pass', 'Ulangi Password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('agree-term', 'Syarat dan Ketentuan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/auth_header');
            $this->load->view('auth/registrasi');
            $this->load->view('layout/auth_footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 'user' // Default role for registration
                // Add other fields as needed
            ];

            $this->load->model('auth_model');
            $this->auth_model->register($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi berhasil! Silakan login.</div>');
            redirect('Auth');
        }
    }

    public function logout()
    {
        // Perform the logout actions (destroy session, etc.)
        $this->session->sess_destroy();

        // Set a flash message
        $this->session->set_flashdata('logout_message', 'You have been logged out successfully.');

        // Redirect to a suitable page
        redirect('auth');
    }
}
