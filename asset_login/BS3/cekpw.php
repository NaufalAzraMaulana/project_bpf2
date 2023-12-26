<?php
// Password yang akan di-hash
$password = "admin";

// Menghash password dengan Bcrypt
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Menampilkan password yang telah di-hash (gunakan ini hanya dalam pengembangan atau debugging)
echo "Password yang di-hash: " . $hashedPassword;
?>