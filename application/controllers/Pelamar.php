<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pelamar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->model('Pelamar_model');
        $this->load->model('Article_model');
        $this->load->model('Comment_model');
        $this->load->model('Job_model');
        $this->load->model('Kursus_model');
    }

    public function index()
    {
        $data['articleCount'] = $this->Dashboard_model->getArticleCount();
        $data['trainingCount'] = $this->Dashboard_model->getTrainingCount();
        $data['applicantCount'] = $this->Dashboard_model->getApplicantCount();
        $data['jobCount'] = $this->Dashboard_model->getJobCount();
        $this->load->view("layout/header");
        $this->load->view("landingpage", $data);
        $this->load->view("layout/footer");
    }
    public function survey()
    {
        if (!$this->session->userdata('email')) {
            redirect('Auth');
        }

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
        $this->load->view('pelamar/edit_profile', $data);
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
    public function artikel()
    {
        $data['articles'] = $this->Article_model->get_articles();
        $data['categories'] = $this->Article_model->get_categories();
        $data['recent_articles'] = $this->Article_model->get_recent_articles();
        $this->load->view("layout/header");
        $this->load->view("pelamar/artikel", $data);
        $this->load->view("layout/footer");
    }
    public function detail_artikel($id)
    {
        $data['article'] = $this->Article_model->get_article_by_id($id);
        $data['comments'] = $this->Comment_model->get_comments_by_article($id);
        // Fetch categories for the sidebar
        $data['categories'] = $this->Article_model->get_categories();
        $data['recent_articles'] = $this->Article_model->get_recent_articles();
        $data['pelamar_id'] = $this->session->userdata('pelamar_id');
        $this->load->view("layout/header");
        $this->load->view("pelamar/detail_art1", $data);
        $this->load->view("layout/footer");
    }
    public function cari_artikel()
    {
        $keyword = $this->input->post('keyword');
        $data['articles'] = $this->Article_model->search_articles($keyword);
        $this->load->view("layout/header");
        $this->load->view("pelamar/artikel", $data);
        $this->load->view("layout/footer");
    }
    public function artikel_by_category($category)
    {
        $data['articles'] = $this->Article_model->get_articles_by_category(urldecode($category));
        $this->load->view("layout/header");
        $this->load->view("pelamar/artikel", $data);
        $this->load->view("layout/footer");
    }
    public function tambah_komentar()
    {
        $article_id = $this->input->post('article_id');
        $pelamar_id = $this->input->post('pelamar_id');
        $comment = $this->input->post('comment');

        if (empty($pelamar_id) || !is_numeric($pelamar_id)) {
            redirect('Pelamar/detail_artikel/' . $article_id);
        }
        $data = array(
            'article_id' => $article_id,
            'pelamar_id' => $pelamar_id,
            'comment' => $comment
        );
        $this->Comment_model->insert_comment($data);
        redirect('Pelamar/detail_artikel/' . $article_id);
    }
    public function kursus()
    {
        $email = $this->session->userdata('email'); // Replace with the actual skill of the logged-in Pelamar

        $data['Kursus_list'] = $this->Kursus_model->get_all_kursus();
        $data['joinedData'] = $this->Pelamar_model->getJoinedDataById($email);

        $this->load->view("layout/header");
        $this->load->view("pelamar/kursus", $data);
        $this->load->view("layout/footer");
    }
    public function detail_kursus($id)
    {
        $data['kursus'] = $this->Kursus_model->get_kursus_by_id($id);
        $data['Kursus_detail'] = $this->Kursus_model->getKursusDetail($id);
        $this->load->view("layout/header");
        $this->load->view("pelamar/detail_kursus", $data);
        $this->load->view("layout/footer");
    }
    public function rekomendasi_kursus()
    {
        // Ambil id pelamar dari sesi atau model sesuai kebutuhan
        $email = $this->session->userdata('email');


        // Panggil fungsi model untuk mendapatkan data kursus berdasarkan id pelamar
        $data['Rekomendasi'] = $this->Pelamar_model->getJoinedDataById($email);

        // Load view rekomendasi kursus
        $this->load->view("layout/header");
        $this->load->view("pelamar/rekomendasi_kursus", $data);
        $this->load->view("layout/footer");
    }
    public function loker()
    {
        $data['jobs'] = $this->Job_model->get_all_jobs();
        $this->load->view("layout/header");
        $this->load->view("pelamar/loker", $data);
        $this->load->view("layout/footer");
    }
    public function detail_loker($job_id)
    {
        $data['job'] = $this->Job_model->get_job_by_id($job_id);
        $this->load->view("layout/header");
        $this->load->view("pelamar/detail_loker", $data);
        $this->load->view("layout/footer");
    }
}
