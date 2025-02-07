<?php
session_start();

// Daftar admin
$admins = [
    ['username' => 'admin1', 'password' => '123'],
    ['username' => 'admin2', 'password' => '456'],
    ['username' => 'admin3', 'password' => '789']
];

// Mengambil input dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Memeriksa apakah login berhasil
$login_success = false;
foreach ($admins as $admin) {
    if ($username === $admin['username'] && $password === $admin['password']) {
        $login_success = true;
        $_SESSION['login_success'] = true;
        $_SESSION['username'] = $admin['username']; // Menyimpan username di sesi
        header("Location: dashboard.php"); // Arahkan ke dashboard
        exit();
    }
}

if (!$login_success) {
    // Login gagal
    $_SESSION['login_success'] = false;
    header("Location: login.php?status=failure");
    exit();
}
?>
