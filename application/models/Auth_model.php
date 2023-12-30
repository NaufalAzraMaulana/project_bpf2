<?php
defined('BASEPATH') or exit('no direct script access allowed');
// Model: Auth_model.php

class Auth_model extends CI_Model {
    public function check_login($email, $password) {
        $user = $this->db->get_where('pelamar', ['email' => $email])->row_array();

        if ($user) {
            // User found, verify password using bcrypt
            if (password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false; // Password is incorrect
            }
        } else {
            // If user not found, check if it's an admin
            $admin = $this->db->get_where('admin', ['email' => $email])->row_array();

            if ($admin) {
                // Admin found, verify password using plain text (not recommended)
                if ($password === $admin['password']) {
                    return $admin;
                } else {
                    return false; // Password is incorrect
                }
            } else {
                return false; // User and Admin not found
            }
        }
    }

    public function register($data) {
        $this->db->insert('pelamar', $data);
    }
}