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
    public function update_article($id, $judul, $jenis, $isi, $Hari, $tanggal_publikasi, $gambar)
    {
        // Update data artikel berdasarkan ID
        $data = array(
            'judul' => $judul,
            'jenis' => $jenis,
            'isi' => $isi,
            'Hari' => $Hari,
            'tanggal_publikasi' => $tanggal_publikasi
            // tambahkan kolom-kolom lain yang ingin diubah
        );

        // Jika ada gambar yang diunggah, lakukan pembaruan gambar
        if (!empty($gambar)) {
            $data['gambar'] = $gambar;
        }

        $this->db->where('id', $id);
        $this->db->update('articles', $data);
    }
    public function delete_article($artikelid)
    {
        // Hapus data artikel berdasarkan ID
        $this->db->where('id', $artikelid);
        $this->db->delete('articles');
    }
}