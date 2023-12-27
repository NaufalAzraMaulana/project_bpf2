<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelamar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->model('Pelamar_model');
    }

    public function index()
    {
        $data['articleCount'] = $this->Dashboard_model->getArticleCount();
        $data['trainingCount'] = $this->Dashboard_model->getTrainingCount();
        $data['applicantCount'] = $this->Dashboard_model->getApplicantCount();
        $data['jobCount'] = $this->Dashboard_model->getJobCount();

        // $this->load->view("layout/header");
        $this->load->view("landingpage", $data);
        $this->load->view("layout/footer");
    }
    public function survey()
    {
        // Check if the user is logged in
        if (!$this->session->userdata('email')) {
            redirect('Auth');
        }

        // Load the survey view
        $this->load->view('pelamar/survey');
    }
    public function home()
    {


        $data['articleCount'] = $this->Dashboard_model->getArticleCount();
        $data['trainingCount'] = $this->Dashboard_model->getTrainingCount();
        $data['applicantCount'] = $this->Dashboard_model->getApplicantCount();
        $data['jobCount'] = $this->Dashboard_model->getJobCount();

        $this->load->view("layout/header");
        $this->load->view("pelamar/home", $data);
        $this->load->view("layout/footer");
    }

    public function save_talent()
    {
        // Check if the user is logged in
        if (!$this->session->userdata('email')) {
            redirect('Auth');
        }

        // Get the selected talent from the form submission
        $selected_talent = $this->input->post('talent');

        // Update the 'bakat' column in the 'pelamar' table
        $email = $this->session->userdata('email');
        $this->db->where('email', $email);
        $this->db->update('pelamar', ['bakat' => $selected_talent]);

        // Redirect to the home page or any other page you want
        redirect('Pelamar/home');
    }

    public function profile()
    {
        // Retrieve user data from the database (assuming user is logged in)
        $email = $this->session->userdata('email');
        $data['user'] = $this->Pelamar_model->get_by_email($email);
        $this->load->view('layout/header');
        $this->load->view('pelamar/profile', $data);
        $this->load->view('layout/footer');
    }

    public function edit_profile()
    {
        // Assuming you have a form to edit 
        // Retrieve user data from the database (assuming user is logged in)
        $email = $this->session->userdata('email');
        $data['user'] = $this->Pelamar_model->get_by_email($email);
        $this->load->view('layout/header');
        $this->load->view('pelamar/edit_profile',$data);
        $this->load->view('layout/footer');
    }

    public function update_profile()
    {
        // Handle form submission for updating user profile
        // This may include updating name, skill, and image
        // Validate and process the form data

        $data = array(
            'nama' => $this->input->post('nama'),
            'bakat' => $this->input->post('bakat'),
        );

        // If the user is uploading a new image
        $upload_image = $_FILES['gambar']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/gambar/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        // Update the user profile in the database
        $email = $this->session->userdata('email');
        $this->Pelamar_model->update_profile($email, $data);
        // Display SweetAlert confirmation
    $this->session->set_flashdata('success', 'Profil berhasil diperbarui!');
    redirect('pelamar/profile');

        // Redirect to the profile page
        redirect('pelamar/profile');
    }
}
