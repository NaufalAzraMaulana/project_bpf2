<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelamar_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_by_email($email)
    {
        // Fetch user data from the database based on email
        $query = $this->db->get_where('pelamar', array('email' => $email));
        return $query->row_array();
    }

    public function update_profile($email, $data)
    {
        // Update user profile data in the database
        $this->db->where('email', $email);
        $this->db->update('pelamar', $data);
    }
    public function get_jobs()
    {
        // Fetch job data from the database
        $query = $this->db->get('jobs');
        return $query->result_array();
    }
    public function getJoinedDataById($email) {
        $this->db->select('pelamar.id,kursus.id, pelamar.nama, pelamar.email, pelamar.bakat, kursus.nama_kursus, kursus.bakat_required, kursus.gambar');
        $this->db->from('kursus');
        $this->db->join('pelamar', 'pelamar.bakat = kursus.bakat_required');
        $this->db->where('pelamar.email', $email);
        $query = $this->db->get();
        return $query->result();
    }
}
