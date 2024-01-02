<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Job_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_jobs()
    {
        $query = $this->db->get('jobs');
        return $query->result_array();
    }

    public function get_job_details($job_id)
    {
        $query = $this->db->get_where('jobs', array('id' => $job_id));
        return $query->row_array();
    }
    public function get_job_by_id($job_id)
    {
        $query = $this->db->get_where('jobs', array('id' => $job_id));
        return $query->row_array();
    }
}