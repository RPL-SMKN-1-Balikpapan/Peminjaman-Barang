<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Peminjaman Alat</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
// Ganti dengan koneksi MySQLi
require_once "config.inc.php"; // Pastikan Anda sudah membuat file ini untuk koneksi ke database

// Query untuk mengambil data barang
$alat = $mysqli->query("SELECT * FROM barang") or die(mysqli_error($mysqli));
?>
<div id="contents3">
    <center>
        <div id="items">
            <h1>Peminjaman Alat</h1>
            <div class="row">
                <?php
                while ($row_alat = mysqli_fetch_array($alat)) {
                ?>
                    <div class="col-md-4"> <!-- Membuat kolom untuk tata letak -->
                        <img src="../<?php echo $row_alat['foto']; ?>" width="200px" height="150px" alt="">
                        <ul>
                            <li><a href="#">Nama: <?php echo $row_alat['nama_brg']; ?></a></li>
                            <li><a href="#">Stok: <?php echo $row_alat['stok_brg']; ?></a></li>
                            <li><a href="#" class="btn btn-danger">Pinjam</a></li>
                        </ul>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </center>
</div>

<?php require_once "templates/footer.php"; ?>
</body>
</html>
