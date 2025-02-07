<?php
include "config/koneksi.php"; // Menghubungkan ke database

// Mengambil data dari form
$id = $_POST['id'];
$id_brg = $_POST['id_barang'];
$id_anggota = $_POST['id_anggota'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$status = $_POST['status'];

// Mulai transaksi
$mysqli->begin_transaction();

try {
    // Query untuk memperbarui peminjaman
    $ganti = "UPDATE peminjaman SET id_brg='$id_brg', id_anggota='$id_anggota', tgl_pinjam='$tgl_pinjam', status='$status' WHERE id_peminjaman='$id'";
    
    // Eksekusi query untuk memperbarui peminjaman
    if (!$mysqli->query($ganti)) {
        throw new Exception('Gagal memperbarui peminjaman: ' . $mysqli->error);
    }

    // Cek jika status peminjaman sudah dikembalikan
    if ($status == 1) {
        // Tanggal pengembalian
        $tgl_kembali = date('Y-m-d');

        // Masukkan data pengembalian ke tabel pengembalian
        $insert = "INSERT INTO pengembalian(id_brg, id_peminjaman, id_anggota, tgl_kembali) VALUES('$id_brg', '$id', '$id_anggota', '$tgl_kembali')";
        if (!$mysqli->query($insert)) {
            throw new Exception('Gagal menambah data pengembalian: ' . $mysqli->error);
        }
        
        // Tambah stok barang setelah pengembalian
        $update_stok = "UPDATE barang SET stok_brg = stok_brg + 1 WHERE id_brg = '$id_brg'";
        if (!$mysqli->query($update_stok)) {
            throw new Exception('Gagal memperbarui stok barang: ' . $mysqli->error);
        }
    } else {
        // Jika status diubah menjadi 'belum dikembalikan', kurangi stok jika stok masih ada
        $cek_stok = "SELECT stok_brg FROM barang WHERE id_brg = '$id_brg'";
        $result = $mysqli->query($cek_stok);
        $row = $result->fetch_assoc();

        if ($row['stok_brg'] > 0) {
            $update_stok = "UPDATE barang SET stok_brg = stok_brg - 1 WHERE id_brg = '$id_brg'";
            if (!$mysqli->query($update_stok)) {
                throw new Exception('Gagal memperbarui stok barang: ' . $mysqli->error);
            }
        } else {
            throw new Exception('Stok barang tidak cukup untuk peminjaman.');
        }
    }

    // Commit transaksi
    $mysqli->commit();
    
    // Redirect ke halaman peminjaman dengan pesan sukses
    header("location:peminjaman.php?message=Peminjaman berhasil diupdate.");
    exit; // Pastikan untuk keluar setelah header redirect
} catch (Exception $e) {
    // Rollback transaksi jika ada kesalahan
    $mysqli->rollback();
    // Redirect ke halaman peminjaman dengan pesan kesalahan
    header("location:peminjaman.php?message=Terjadi kesalahan: " . urlencode($e->getMessage()));
    exit; // Pastikan untuk keluar setelah header redirect
}
?>
