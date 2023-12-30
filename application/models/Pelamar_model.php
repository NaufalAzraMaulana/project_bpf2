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
}