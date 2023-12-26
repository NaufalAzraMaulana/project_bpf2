<?php
defined('BASEPATH') or exit('no direct script access allowed');
// Model: Auth_model.php

class Auth_model extends CI_Model {
    public function check_login($email, $password) {
        $user = $this->db->get_where('pelamar', ['email' => $email])->row_array();

        if ($user) {
            // User found, verify password
            if (password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false; // Password is incorrect
            }
        } else {
            return false; // User not found
        }
    }

    public function register($data) {
        $this->db->insert('pelamar', $data);
    }
}
