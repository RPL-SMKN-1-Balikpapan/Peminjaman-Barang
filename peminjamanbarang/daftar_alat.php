<?php 
require_once "config/koneksi.php"; // Pastikan file koneksi sesuai dan menggunakan mysqli

// Membuat koneksi ke database
$koneksi = mysqli_connect("host", "username", "password", "database");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data barang
$alat = mysqli_query($koneksi, "SELECT * FROM barang");

if (!$alat) {
    die("Query gagal: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <title>Website Peminjaman Alat Geomatika</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
<head>
</head>

<body>
    <div id="contents3">
        <center>
            <div id="items">
                <h1>Peminjaman Alat</h1>
                <div class="row">
                    <?php
                    while ($row_alat = mysqli_fetch_array($alat)) {
                    ?>
                        <img src="images/lcd.jpg" width="200px" height="150px" alt="">
                        <ul>
                            <li><a href="">Nama : <?php echo $row_alat['nama_brg']; ?></a></li>
                            <li><a href="">Stok : <?php echo $row_alat['stok_brg']; ?></li>
                        </ul>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </center>
    </div>
</body>

<!-- Memanggil footer -->
<?php require_once "templates/footer.php" ?>
