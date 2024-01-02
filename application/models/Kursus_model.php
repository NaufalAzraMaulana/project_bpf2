<?php

class Kursus_model extends CI_Model
{
    public function insert_kursus($data)
    {
        // Insert data into 'kursus' table
        $this->db->insert('kursus', $data);
    }

    public function get_all_kursus()
    {
        // Retrieve all data from 'kursus' table
        $query = $this->db->get('kursus');
        return $query->result(); // Return the result as an array of objects
    }

    // You can add more functions as needed

    // Example: Get a specific kursus by its ID
    public function get_kursus_by_id($id)
    {
        // $query = $this->db->get_where('kursus', array('id' => $id));
        // return $query->row(); // Return a single row as an object
        return $this->db->get_where('kursus', array('id' => $id))->row_array();
    }
    // Model (Kursus_model.php)
    public function getKursusDetail($id)
    {
        $query = $this->db->get_where('kursus', array('id' => $id));
        return $query->row(); // Menggunakan row() untuk mendapatkan satu baris objek
    }

    public function getRekomendasiKursus()
    {
        $this->db->select('pelamar.id, pelamar.nama, pelamar.email, pelamar.bakat, kursus.nama_kursus');
        $this->db->from('pelamar');
        $this->db->join('kursus', 'pelamar.bakat = kursus.bakat_required');
        $query = $this->db->get();
        return $query->result();
    }
    public function getKursusByIdPelamar($id)
    {
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

    public function update_kursus($id)
    {
        // Validasi form jika diperlukan

        // Ambil data dari form
        $nama_kursus = $this->input->post('nama_kursus');
        $deskripsi = $this->input->post('deskripsi');
        $bakat_required = $this->input->post('bakat_required');

        // Update data kursus ke database
        $data = [
            'nama_kursus' => $nama_kursus,
            'deskripsi' => $deskripsi,
            'bakat_required' => $bakat_required,
            // Tambahkan field lainnya jika ada
        ];
        $this->db->where('id', $id);
        $this->db->update('kursus', $data);
    }
    public function delete_kursus($id)
    {
        // Hapus kursus dari database
        $this->db->where('id', $id);
        $this->db->delete('kursus');
    }
}
