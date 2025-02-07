<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:login.php');
} else {
    $username = $_SESSION['admin'];
}

include "config/koneksi.php"; // Pastikan jalur ini benar

// Ambil data dari form
$nama_barang = $_POST['nama_barang'];
$nama_peminjam = $_POST['nama_peminjam'];
$tgl_pinjam = $_POST['tgl_pinjam'];

// Mulai transaksi
$mysqli->begin_transaction();

try {
    // Tambah peminjaman
    $sqlPeminjaman = "INSERT INTO peminjaman (id_brg, id_anggota, tgl_pinjam, status) VALUES (?, ?, ?, 0)";
    $stmtPeminjaman = $mysqli->prepare($sqlPeminjaman);
    $stmtPeminjaman->bind_param("iis", $nama_barang, $nama_peminjam, $tgl_pinjam);
    $stmtPeminjaman->execute();

    // Kurangi stok barang
    $sqlStok = "UPDATE barang SET stok_brg = stok_brg - 1 WHERE id_brg = ?";
    $stmtStok = $mysqli->prepare($sqlStok);
    $stmtStok->bind_param("i", $nama_barang);
    $stmtStok->execute();

    // Commit transaksi
    $mysqli->commit();

    // Redirect atau tampilkan pesan sukses
    header("Location: peminjaman.php?message=Peminjaman berhasil ditambahkan");
} catch (Exception $e) {
    // Rollback transaksi jika ada kesalahan
    $mysqli->rollback();
    header("Location: peminjaman.php?message=Terjadi kesalahan: " . $e->getMessage());
}
?>
