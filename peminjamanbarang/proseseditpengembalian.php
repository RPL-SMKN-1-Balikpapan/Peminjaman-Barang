<?php
include "config/koneksi.php";

// Ambil data dari POST
$id = $_POST['id']; // ID pengembalian
$tgl_kembali = $_POST['tgl_kembali']; // Tanggal pengembalian
$id_peminjaman = $_POST['id_peminjaman']; // ID peminjaman (tambahkan ini jika diperlukan)

// Query untuk memperbarui tanggal pengembalian
$ganti = "UPDATE pengembalian SET tgl_kembali='$tgl_kembali' WHERE id='$id'";

// Eksekusi query untuk memperbarui pengembalian
$update = $mysqli->query($ganti);

if ($update) {
    // Jika tanggal pengembalian diperbarui, pastikan juga untuk memperbarui status peminjaman jika diperlukan
    $update_status = "UPDATE peminjaman SET status=1 WHERE id_peminjaman='$id_peminjaman'"; // Status 1 berarti sudah dikembalikan
    $mysqli->query($update_status);

    header("location:pengembalian.php");
} else {
    echo $ganti;
    echo "Gagal mengubah data";
}
?>
