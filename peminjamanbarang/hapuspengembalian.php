<?php
include 'config/koneksi.php';

$id = $_GET['id'];

// Cek jika ID pengembalian valid
if (!empty($id) && is_numeric($id)) {
    // Hapus data pengembalian berdasarkan ID
    $hapus = $mysqli->query("DELETE FROM pengembalian WHERE id = $id");

    if ($hapus) {
        // Redirect ke halaman pengembalian jika penghapusan berhasil
        header("location:pengembalian.php");
    } else {
        // Pesan error jika gagal menghapus
        echo "<div class='alert alert-danger' style='background-color: red; color: white; padding: 10px;'>
                ⚠️ Gagal menghapus data pengembalian.
              </div>";
    }
} else {
    // Jika ID tidak valid, tampilkan pesan error
    echo "<div class='alert alert-danger' style='background-color: red; color: white; padding: 10px;'>
            ⚠️ ID pengembalian tidak valid.
          </div>";
}
?>
