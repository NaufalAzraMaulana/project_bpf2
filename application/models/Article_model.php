<?php
defined('BASEPATH') or exit('no direct script access allowed');
class Article_model extends CI_Model {
    public function get_articles() {
        return $this->db->get('articles')->result_array();
    }
    public function get_article_by_id($id) {
        return $this->db->get_where('articles', array('id' => $id))->row_array();
    }
    public function insert_article($data) {
        $this->db->insert('articles', $data);
        return $this->db->insert_id();
    }
    public function search_articles($keyword) {
        $this->db->like('judul', $keyword);
        $this->db->or_like('jenis', $keyword);
        return $this->db->get('articles')->result_array();
    }
    public function get_categories() {
        $this->db->select('jenis');
        $this->db->distinct();
        $result = $this->db->get('articles')->result_array();
        return $result;
    }
    public function get_articles_by_category($category) {
        $this->db->where('jenis', $category);
        return $this->db->get('articles')->result_array();
    }
    public function get_recent_articles($limit = 5) {
        $this->db->order_by('tanggal_publikasi', 'DESC');
        $this->db->limit($limit);
        return $this->db->get('articles')->result_array();
    }
}