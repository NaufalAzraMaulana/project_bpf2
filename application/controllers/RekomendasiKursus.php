<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->model('Pelamar_model');
        // Load the Article_model
        $this->load->model('Article_model');
        $this->load->model('Comment_model');
        $this->load->model('Kursus_model');

    }
     public function index()
	{
		$this->load->view('welcome_message');
	}
    public function getrekomendasi_kursus($pelamarId)
{
    // Ambil bakat pelamar dari sesi atau model sesuai kebutuhan
    // $bakat = $this->session->userdata('bakat');

    // Ambil data kursus rekomendasi berdasarkan bakat pelamar
    // $data['Rekomendasi'] = $this->Kursus_model->getRekomendasiKursus();
    $data['joinedData'] = $this->Pelamar_model->getJoinedDataById($pelamarId);
    // Load view rekomendasi kursus
    $this->load->view("layout/header");
    $this->load->view("pelamar/rekomendasi_kursus", $data); // Change the view file name
    $this->load->view("layout/footer");
}
}