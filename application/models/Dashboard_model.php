<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getArticleCount() {
        return $this->db->count_all('articles');
    }

    public function getTrainingCount() {
        return $this->db->count_all('kursus');
    }

    public function getApplicantCount() {
        return $this->db->count_all('pelamar');
    }

    public function getJobCount() {
        return $this->db->count_all('jobs');
    }
}