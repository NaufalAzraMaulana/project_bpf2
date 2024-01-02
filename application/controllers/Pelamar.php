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
        if (!$this->session->userdata('email')) {
            redirect('Auth');
        }
        $selected_talent = $this->input->post('talent');
        $email = $this->session->userdata('email');
        $this->db->where('email', $email);
        $this->db->update('pelamar', ['bakat' => $selected_talent]);
        redirect('Pelamar/home');
    }
    public function profile()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->Pelamar_model->get_by_email($email);
        $this->load->view('layout/header');
        $this->load->view('pelamar/profile', $data);
        $this->load->view('layout/footer');
    }
    public function edit_profile()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->Pelamar_model->get_by_email($email);
        $this->load->view('layout/header');
        $this->load->view('pelamar/edit_profile', $data);
        $this->load->view('layout/footer');
    }
    public function update_profile()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'bakat' => $this->input->post('bakat'),
        );

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
        $email = $this->session->userdata('email');
        $this->Pelamar_model->update_profile($email, $data);
        $this->session->set_flashdata('success', 'Profil berhasil diperbarui!');
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
        $this->load->view("layout/header");
        $this->load->view("pelamar/kursus");
        $this->load->view("layout/footer");
    }
    public function detail_kursus()
    {
        $this->load->view("layout/header");
        $this->load->view("pelamar/detail_kursus");
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
