<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:login.php');
    exit();
}

include 'config/koneksi.php';

if (isset($_GET['id'])) {
    $id_peminjaman = $_GET['id'];

    // Hapus data peminjaman berdasarkan id_peminjaman
    $stmt = $mysqli->prepare("DELETE FROM anggota WHERE id_anggota = ?");
    $stmt->bind_param("i", $id_peminjaman);

    if ($stmt->execute()) {
        // Redirect ke halaman peminjaman setelah berhasil menghapus
        header("location:peminjam.php");
        exit(); // Menghentikan eksekusi setelah redirect
    } else {
        echo "Gagal menghapus data peminjaman: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
} else {
    echo "ID peminjaman tidak ditemukan.";
}

// Tutup koneksi
$mysqli->close();
?>
