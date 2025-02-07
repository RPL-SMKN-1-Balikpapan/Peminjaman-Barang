<?php
include 'config/koneksi.php';

$id_peminjaman = $_GET['id'];

// Cek jika id_peminjaman sudah ada pada tabel pengembalian sebelum menghapus
$cek_pengembalian = $mysqli->query("SELECT * FROM pengembalian WHERE id_peminjaman = $id_peminjaman");

if (mysqli_num_rows($cek_pengembalian) > 0) {
    // Jika peminjaman sudah ada di pengembalian, jangan dihapus
    $message = "⚠️ Konfirmasi Pengembalian di Tab Pengembalian.";
    $alert_class = "alert-danger";
} else {
    // Jika belum ada di pengembalian, bisa dihapus
    $hapus = $mysqli->query("DELETE FROM peminjaman WHERE id_peminjaman = $id_peminjaman");

    if ($hapus) {
        $message = "✅ Data peminjaman berhasil dihapus.";
        $alert_class = "alert-success";
    } else {
        $message = "⚠️ Gagal menghapus data peminjaman.";
        $alert_class = "alert-danger";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" type="image/png" href="./images/logo1.png">
    <title>Hapus Peminjaman</title>
</head>

<body>
    <div class="container mt-5">
        <div class="alert <?php echo $alert_class; ?>" role="alert" style="text-align: center;">
            <?php echo $message; ?>
        </div>
        <div class="text-center">
            <a href="peminjaman.php" class="btn btn-primary"><i class="fas fa-tachometer-alt"></i> Kembali ke ke tab peminjaman</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
