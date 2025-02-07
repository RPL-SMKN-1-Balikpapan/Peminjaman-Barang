<?php
session_start();
require_once("../config/koneksi.php");

$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk memeriksa username dan password anggota
$query = $mysqli->query("SELECT * FROM anggota WHERE nama='$username' AND password='$password'");

if (mysqli_num_rows($query) == 0) {
    // Menampilkan pesan alert jika login gagal
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .alert-custom {
                background-color: #dc3545; /* Warna merah */
                color: white;
                animation: blink 1s infinite; /* Animasi berkedip */
            }
            @keyframes blink {
                0% { opacity: 1; }
                50% { opacity: 0.5; }
                100% { opacity: 1; }
            }
        </style>
        <title>Login Gagal</title>
    </head>
    <body>
        <div class="container mt-5">
            <div class="alert alert-custom text-center" role="alert">
                ⚠️ Maaf, login Anda gagal! ⚠️
            </div>
            <div class="text-center">
                <a href="login_anggota.php" class="btn btn-light">Kembali ke Form Login</a>
            </div>
        </div>
    </body>
    </html>
    ';
} else {
    $row = mysqli_fetch_assoc($query);
    if ($row) {
        $_SESSION['anggota'] = $username; // Menyimpan username anggota di session
        $_SESSION['id_anggota'] = $row['id_anggota']; // Menyimpan id_anggota di session
        header("Location: index.php"); // Redirect ke halaman index
        exit; // Pastikan untuk menghentikan script setelah redirect
    }
}
?>