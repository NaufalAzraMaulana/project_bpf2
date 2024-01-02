<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kursus_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_kursus()
    {
        $query = $this->db->get('kursus');
        return $query->result_array();
    }

    public function get_kursus_details($id)
    {
        $query = $this->db->get_where('kursus', array('id' => $id));
        return $query->row_array();
    }

    public function get_kursus_by_id($id)
    {
        $query = $this->db->get_where('kursus', array('id' => $id));
        return $query->row_array();
    }
    public function insert_kursus($data)
    {
        // Insert data into 'kursus' table
        $this->db->insert('kursus', $data);
    }
    public function getRekomendasiKursus()
    {
        $this->db->select('pelamar.id, pelamar.nama, pelamar.email, pelamar.bakat, kursus.nama_kursus');
        $this->db->from('pelamar');
        $this->db->join('kursus', 'pelamar.bakat = kursus.bakat_required');
        $query = $this->db->get();
        return $query->result();
    }
    public function getKursusByIdPelamar($id) {
        $this->db->select('kursus.nama_kursus');
        $this->db->from('pelamar');
        $this->db->join('kursus', 'pelamar.bakat = kursus.bakat_required');
        $this->db->where('pelamar.id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getKursusCategories()
    {
        // Query untuk mendapatkan kategori kursus
        // Sesuaikan kebutuhan
        // $query = $this->db->get('bakat_required');
        // return $query->result_array();
        $this->db->select('bakat_required');
        $this->db->distinct();
        $result = $this->db->get('kursus')->result_array();
        return $result;
    }
    public function get_kursus_by_category($bakat_required)
    {
        $this->db->where('bakat_required', $bakat_required);
        $query = $this->db->get('kursus');
        return $query->result(); // Return the result as an array of objects
    }
}
