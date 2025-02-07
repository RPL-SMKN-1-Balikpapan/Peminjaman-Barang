<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "peminjaman";

// Membuat koneksi
$mysqli = new mysqli($host, $username, $password, $db);

// Mengecek koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

// Set karakter encoding
$mysqli->set_charset("utf8");

?>
