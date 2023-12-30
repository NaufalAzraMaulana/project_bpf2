<?php
defined('BASEPATH') or exit('no direct script access allowed');
// Article_model.php
class Article_model extends CI_Model {
    public function get_articles() {
        // Assuming 'articles' is the name of your table
        return $this->db->get('articles')->result_array();
    }

    public function insert_article($data) {
        $this->db->insert('articles', $data);
        return $this->db->insert_id(); // Return the inserted article's ID
    }
}