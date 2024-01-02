<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->model('Pelamar_model');
        $this->load->model('Article_model');
        $this->load->model('Kursus_model');
        $this->load->model('Comment_model');
        $this->load->model('Job_model');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['articleCount'] = $this->Dashboard_model->getArticleCount();
        $data['trainingCount'] = $this->Dashboard_model->getTrainingCount();
        $data['applicantCount'] = $this->Dashboard_model->getApplicantCount();
        $data['jobCount'] = $this->Dashboard_model->getJobCount();

        $this->load->view("layout/header_admin");
        $this->load->view("landingpage", $data);
        $this->load->view("layout/footer_admin");
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

        if ($this->session->userdata('email')) {
            // Jika sudah login, dapatkan informasi pengguna dari sesi
            $data['user_email'] = $this->session->userdata('email');
            $data['user_role'] = $this->session->userdata('role');
        }
        $data['articleCount'] = $this->Dashboard_model->getArticleCount();
        $data['trainingCount'] = $this->Dashboard_model->getTrainingCount();
        $data['applicantCount'] = $this->Dashboard_model->getApplicantCount();
        $data['jobCount'] = $this->Dashboard_model->getJobCount();

        $this->load->view("layout_admin/header");
        $this->load->view("admin/home", $data);
        $this->load->view("layout_admin/footer");
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
        $data['user'] = $this->Pelamar_model->get_all_pelamar();
        $this->load->view('layout_admin/header');
        $this->load->view('admin/profile', $data);
        $this->load->view('layout_admin/footer');
    }

    public function edit_profile()
    {
        // Assuming you have a form to edit 
        // Retrieve user data from the database (assuming user is logged in)
        $email = $this->session->userdata('email');
        $data['user'] = $this->Pelamar_model->get_by_email($email);
        $this->load->view('layout/header');
        $this->load->view('admin/edit_profile', $data);
        $this->load->view('layout/footer');
    }
    public function delete_profile($pelamarid)
    {
        

        // Call the delete_profile function in Pelamar_model
        $this->Pelamar_model->delete_profile($pelamarid);

        // Set a flashdata message to indicate successful deletion
        $this->session->set_flashdata('success', 'Profile has been successfully deleted.');

        // Redirect to the page where you display all user profiles
        redirect('admin/profile');
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

        $this->load->view("layout_admin/header");
        $this->load->view("admin/adm_artikel", $data);
        $this->load->view("layout_admin/footer");
    }
    public function detail_artikel()
    {
        // Fetch the selected article by ID
        $data['article'] = $this->Article_model->get_article_by_id($id);
        $data['comments'] = $this->Comment_model->get_comments_by_article($id);
        // Fetch categories for the sidebar
        $data['categories'] = $this->Article_model->get_categories();
        $data['recent_articles'] = $this->Article_model->get_recent_articles();
        $data['pelamar_id'] = $this->session->userdata('pelamar_id');

        $this->load->view("layout_admin/header");
        $this->load->view("admin/detail_art1", $data);
        $this->load->view("layout_admin/footer");
    }
    public function edit_artikel($id)
    {
        $data['article'] = $this->Article_model->get_article_by_id($id);

        $this->load->view("layout_admin/header");
        $this->load->view("admin/edit_artikel", $data);
        $this->load->view("layout_admin/footer");
    }

    // Admin controller (Admin.php)

    public function add_article()
    {
        // Check if admin is logged in
        if (!$this->session->userdata('email') || $this->session->userdata('role') !== 'admin') {
            // Redirect to the login page if not logged in as admin
            redirect('Auth');
        }

        // Form validation
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
        $this->form_validation->set_rules('isi', 'Isi', 'trim|required');
        $this->form_validation->set_rules('hari', 'Hari', 'trim|required');
        $this->form_validation->set_rules('tanggal_publikasi', 'Tanggal Publikasi', 'trim|required');

        if ($this->form_validation->run() == false) {
            // If validation fails, reload the form
            $this->load->view("layout_admin/header");
            $this->load->view('admin/add_artikel');
            $this->load->view("layout_admin/footer");
        } else {
            // If validation succeeds, add article to the database
            $data = [
                'judul' => $this->input->post('judul'),
                'jenis' => $this->input->post('jenis'),
                'isi' => $this->input->post('isi'),
                'hari' => $this->input->post('hari'),
                'tanggal_publikasi' => $this->input->post('tanggal_publikasi'),
            ];

            // File upload configuration
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048;
            $config['upload_path'] = FCPATH . 'assets/img/artikel/';
            $config['overwrite'] = true;
            $config['max_width'] = 1080;
            $config['max_height'] = 1080;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                // If upload successful, get the uploaded file name
                $new_image = $this->upload->data('file_name');
                $data['gambar'] = $new_image;
            } else {
                // If upload fails, handle errors
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error_message', $error);
                // redirect('Admin/add_article');
            }

            // Insert data into the database
            $this->Article_model->insert_article($data);

            // Redirect to the admin page or another appropriate page
            redirect('Admin/home');
        }
    }

    public function update_artikel($id)
    {
        // Validasi form jika diperlukan

        // Ambil data dari form
        $judul = $this->input->post('judul');
        $jenis = $this->input->post('jenis');
        $isi = $this->input->post('isi');
        $Hari = $this->input->post('Hari');
        $tanggal_publikasi = $this->input->post('tanggal_publikasi');

        // Handle unggahan gambar
        $config['upload_path'] = './path/to/upload/directory/'; // Sesuaikan dengan direktori tempat menyimpan gambar
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048; // Sesuaikan dengan batas ukuran gambar

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $gambar_data = $this->upload->data();
            $gambar = $gambar_data['file_name'];
        } else {
            $gambar = ''; // Jika tidak ada gambar yang diunggah, tetapkan nilai kosong
        }

        // Update data artikel ke database
        $this->Article_model->update_article($id, $judul, $jenis, $isi, $Hari, $tanggal_publikasi, $gambar);

        // Redirect ke halaman daftar artikel atau halaman lainnya
        redirect('Admin/home');
    }

    // controllers/Admin.php

    public function delete_article($artikelid)
    {
        // if (!$this->session->userdata('email') || $this->session->userdata('role') !== 'admin') {
        //     redirect('Auth');
        // }
        // Load model
        $this->Article_model->delete_article($artikelid);

        // Redirect ke halaman daftar kursus atau halaman lainnya
        redirect('Admin/home');
    }
    public function kursus()
    {
        // $email =$this->session->userdata('email'); // Replace with the actual skill of the logged-in Pelamar

        $data['Kursus_list'] = $this->Kursus_model->get_all_kursus();
        $this->load->view("layout_admin/header");
        $this->load->view("admin/adm_kursus", $data);
        $this->load->view("layout_admin/footer");
    }

    // ...

    public function add_kursus()
    {
        // Check if admin is logged in
        if (!$this->session->userdata('email') || $this->session->userdata('role') !== 'admin') {
            // Redirect to the login page if not logged in as admin
            redirect('Auth');
        }

        // Form validation
        $this->form_validation->set_rules('nama_kursus', 'Nama Kursus', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Kursus', 'trim|required');
        $this->form_validation->set_rules('bakat_required', 'Bakat yang Dibutuhkan', 'trim|required');

        if ($this->form_validation->run() == false) {
            // If validation fails, reload the form
            $this->load->view("layout_admin/header");
            $this->load->view('admin/add_kursus');
            $this->load->view("layout_admin/footer");
        } else {
            // If validation succeeds, add kursus to the database
            $data = [
                'nama_kursus' => $this->input->post('nama_kursus'),
                'deskripsi' => $this->input->post('deskripsi'),
                'bakat_required' => $this->input->post('bakat_required'),
                'pendidikan_required' => $this->input->post('pendidikan_required'), // Uncomment this line if you want to include this field
            ];

            // File upload configuration
            // Modify this part accordingly

            // Insert data into the database
            $this->Kursus_model->insert_kursus($data);

            // Redirect to the admin page or another appropriate page
            redirect('Admin/home');
        }
    }
    // controllers/Admin.php

    public function edit_kursus($id)
    {
        // Load model
        $this->load->model('Kursus_model'); // Sesuaikan dengan nama model yang sesuai

        // Ambil data kursus berdasarkan ID
        $data['Kursus_list'] = $this->Kursus_model->get_kursus_by_id($id);

        // Validasi form jika diperlukan
        $this->form_validation->set_rules('nama_kursus', 'Nama Kursus', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Kursus', 'required');
        $this->form_validation->set_rules('bakat_required', 'Bakat yang Dibutuhkan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("layout_admin/header");
            $this->load->view('admin/edit_kursus', $data);
            $this->load->view("layout_admin/footer");
        } else {
            // Jika validasi berhasil, update data kursus
            $this->Kursus_model->update_kursus($id);

            // Redirect ke halaman daftar kursus atau halaman lainnya
            redirect('Admin/home');
        }
    }

    public function delete_kursus($id)
    {
        // Load model


        // Hapus kursus dari database
        $this->Kursus_model->delete_kursus($id);

        // Redirect ke halaman daftar kursus atau halaman lainnya
        redirect('Admin/home');
    }

    public function loker()
    {
        $data['jobs'] = $this->Job_model->get_all_jobs();
        $this->load->view("layout_admin/header");
        $this->load->view("admin/loker", $data);
        $this->load->view("layout_admin/footer");
    }
    public function add_loker()
    {
        // if (!$this->session->userdata('email') || $this->session->userdata('role') !== 'admin') {
        //     redirect('Auth');
        // }

        // Form validation
        $this->form_validation->set_rules('posisi', 'Posisi', 'trim|required');
        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'trim|required');
        $this->form_validation->set_rules('kriteria', 'Kriteria', 'trim|required');
        $this->form_validation->set_rules('deskripsi_pekerjaan', 'Deskripsi Pekerjaan', 'trim|required');
        $this->form_validation->set_rules('bakat_required', 'Bakat yang Dibutuhkan', 'trim|required');
        $this->form_validation->set_rules('pendidikan_required', 'Pendidikan yang Dibutuhkan', 'trim|required');
        $this->form_validation->set_rules('deskripsi_perusahaan', 'Deskripsi Perusahaan', 'trim|required'); // Add this line
        $this->form_validation->set_rules('lokasi_kerja', 'Lokasi Kerja', 'trim|required'); // Add this line
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required'); // Add this line
        $this->form_validation->set_rules('jam_kerja', 'Jam Kerja', 'trim|required'); // Add this line
        $this->form_validation->set_rules('gaji', 'Gaji', 'trim|required'); // Add this line
        $this->form_validation->set_rules('link', 'Link', 'trim|required'); // Add this line

        if ($this->form_validation->run() == false) {
            // If validation fails, reload the form
            $this->load->view("layout_admin/header");
            $this->load->view('admin/add_loker');
            $this->load->view("layout_admin/footer");
        } else {
            // If validation succeeds, add job posting to the database
            $data = [
                'posisi' => $this->input->post('posisi'),
                'perusahaan' => $this->input->post('perusahaan'),
                'kriteria' => $this->input->post('kriteria'),
                'deskripsi_pekerjaan' => $this->input->post('deskripsi_pekerjaan'),
                'bakat_required' => $this->input->post('bakat_required'),
                'pendidikan_required' => $this->input->post('pendidikan_required'),
                'deskripsi_perusahaan' => $this->input->post('deskripsi_perusahaan'), // Add this line
                'lokasi_kerja' => $this->input->post('lokasi_kerja'), // Add this line
                'kategori' => $this->input->post('kategori'), // Add this line
                'jam_kerja' => $this->input->post('jam_kerja'), // Add this line
                'gaji' => $this->input->post('gaji'), // Add this line
                'link' => $this->input->post('link'), // Add this line
            ];

            // File upload configuration
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048;
            $config['upload_path'] = FCPATH . 'assets/img/';
            $config['file_name'] = uniqid(); // Set a unique name for the file

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                // If upload successful, get the uploaded file name
                $data['foto'] = $this->upload->data('file_name');
            } else {
                // If upload fails, handle errors
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error_message', $error);
            }

            // Insert data into the database
            $this->Job_model->insert_job($data);

            // Redirect to the admin page or another appropriate page
            redirect('Admin/loker');
        }
    }

    // Edit a job posting
    public function edit_loker($job_id)
    {
        // if (!$this->session->userdata('email') || $this->session->userdata('role') !== 'admin') {
        //     redirect('Auth');
        // }

        // Retrieve job details from the database
        $data['job'] = $this->Job_model->get_job_by_id($job_id);

        // Load the edit job posting view
        $this->load->view("layout_admin/header");
        $this->load->view('admin/edit_loker', $data);
        $this->load->view("layout_admin/footer");
    }

    // Update a job posting
    public function update_loker($job_id)
    {
        // if (!$this->session->userdata('email') || $this->session->userdata('role') !== 'admin') {
        //     redirect('Auth');
        // }

        // Form validation
    $this->form_validation->set_rules('posisi', 'Posisi', 'trim|required');
    $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'trim|required');
    $this->form_validation->set_rules('kriteria', 'Kriteria', 'trim|required');
    // Add validation rules for new fields
    $this->form_validation->set_rules('deskripsi_pekerjaan', 'Deskripsi Pekerjaan', 'trim|required');
    $this->form_validation->set_rules('bakat_required', 'Bakat yang Dibutuhkan', 'trim|required');
    $this->form_validation->set_rules('pendidikan_required', 'Pendidikan yang Dibutuhkan', 'trim|required');
    $this->form_validation->set_rules('deskripsi_perusahaan', 'Deskripsi Perusahaan', 'trim|required');
    $this->form_validation->set_rules('lokasi_kerja', 'Lokasi Kerja', 'trim|required');
    $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
    $this->form_validation->set_rules('jam_kerja', 'Jam Kerja', 'trim|required');
    $this->form_validation->set_rules('gaji', 'Gaji', 'trim|required');
    $this->form_validation->set_rules('link', 'Link', 'trim|required');

    if ($this->form_validation->run() == false) {
        // If validation fails, reload the form
        $this->load->view("layout_admin/header");
        $this->load->view('admin/edit_loker');
        $this->load->view("layout_admin/footer");
    } else {
        // If validation succeeds, update job posting in the database
        $data = [
            'posisi' => $this->input->post('posisi'),
            'perusahaan' => $this->input->post('perusahaan'),
            'kriteria' => $this->input->post('kriteria'),
            'deskripsi_pekerjaan' => $this->input->post('deskripsi_pekerjaan'),
            'bakat_required' => $this->input->post('bakat_required'),
            'pendidikan_required' => $this->input->post('pendidikan_required'),
            // Add other fields as needed
            'deskripsi_perusahaan' => $this->input->post('deskripsi_perusahaan'),
            'lokasi_kerja' => $this->input->post('lokasi_kerja'),
            'kategori' => $this->input->post('kategori'),
            'jam_kerja' => $this->input->post('jam_kerja'),
            'gaji' => $this->input->post('gaji'),
            'link' => $this->input->post('link'),
        ];

        // Update data in the database
        $this->Job_model->update_job($job_id, $data);

        // Redirect to the admin page or another appropriate page
        redirect('Admin/loker');
    }
}

    // Delete a job posting
    public function delete_loker($job_id)
    {
        // if (!$this->session->userdata('email') || $this->session->userdata('role') !== 'admin') {
        //     redirect('Auth');
        // }

        // Delete job posting from the database
        $this->Job_model->delete_job($job_id);

        // Redirect to the admin page or another appropriate page
        redirect('Admin/loker');
    }

    // Callback function to handle file upload
    public function upload_file($file)
    {
        // File upload configuration
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048;
        $config['upload_path'] = FCPATH . 'assets/img/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($file)) {
            // If upload successful, return true
            return true;
        } else {
            // If upload fails, set error message and return false
            $this->form_validation->set_message('upload_file', $this->upload->display_errors());
            return false;
        }
    }
    public function detail_loker($job_id)
    {
        $data['job'] = $this->Job_model->get_job_by_id($job_id);
        $this->load->view("layout_admin/header");
        $this->load->view("admin_admin/detail_loker", $data);
        $this->load->view("layout_admin/footer");
    }


    // ...

}
