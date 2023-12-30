<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Comment_model extends CI_Model
{
    public function get_comments_by_article($article_id)
    {
        $this->db->select('comments.*, pelamar.nama');
        $this->db->from('comments');
        $this->db->join('pelamar', 'pelamar.id = comments.pelamar_id');
        $this->db->where('comments.article_id', $article_id);
        $this->db->order_by('comments.created_at', 'ASC');
        return $this->db->get()->result_array();
    }
    public function insert_comment($data)
    {
        $this->db->insert('comments', $data);
        return $this->db->insert_id();
    }
}
