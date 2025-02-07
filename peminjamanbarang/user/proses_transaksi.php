<?php
require_once "../config/koneksi.php";
session_start();

if (isset($_POST['finish'])) {
    // Mendapatkan data dari sesi dan form
    $id_anggota = $_SESSION['id_anggota'];
    $nama = $_POST['nama'];
    $tgl = date('Y-m-d'); // Tanggal saat ini dalam format YYYY-MM-DD

    // Menyimpan peminjaman dan mengurangi stok barang
    $item = $_SESSION['items'];
    foreach ($item as $key => $value) {
        // Cek stok barang
        $query_barang = $mysqli->query("SELECT * FROM barang WHERE id_brg = '$key'");
        $barang = mysqli_fetch_assoc($query_barang);

        if ($barang['stok_brg'] > 0) {
            // Mengurangi stok barang
            $new_stok = $barang['stok_brg'] - 1;
            $update_stok = $mysqli->query("UPDATE barang SET stok_brg = '$new_stok' WHERE id_brg = '$key'");

            // Jika update stok berhasil, masukkan peminjaman ke database
            if ($update_stok) {
                $d = $mysqli->query("INSERT INTO peminjaman (id_brg, id_anggota, tgl_pinjam)
                    VALUES ('$key', '$id_anggota', '$tgl')");
            }
        }
    }

    // Hapus items dari session setelah proses selesai
    unset($_SESSION['items']);
    session_destroy();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" type="image/png" href="../images/logo1.png">
    <title>Aplikasi Pemimjaman Barang Lab</title>
    <style>
        html, body {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa; /* Warna latar belakang yang lebih terang */
            font-family: 'Roboto', sans-serif;
        }

        #wrapper {
            width: 100%;
            max-width: 600px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek shadow */
            padding: 20px;
            background-color: #ffffff;
        }

        h3 {
            font-size: 24px;
            color: #007bff; /* Warna teks biru */
            font-weight: bold;
        }

        .card-text p {
            font-size: 16px;
            color: #6c757d;
        }

        .btn-custom {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            color: white;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .btn-logout {
            background-color: #dc3545;
        }

        .btn-logout:hover {
            background-color: #c82333;
        }

        @media print {
            .print-link, .btn-logout {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Start: Wrapper -->
    <div id="wrapper">
        <!-- Start: Container -->
        <div class="container ">
            <!-- Start: Card -->
            <div class="card">
                <div class="card-body text-center">
                    <div class="title">
                        <h3><i class="fas fa-check-circle"></i> Peminjaman Selesai</h3>
                    </div>
                    <div class="card-text mt-4">
                        <h3>Selamat! Anda Telah Berhasil Checkout</h3>
                        <p>Terima kasih telah meminjam barang di Aplikasi Pemimjaman Barang Lab.</p>
                    </div>
                    <div class="card-text mt-4">
                        <?php
                        if (isset($nama)) {
                            echo '<h4>Nama Peminjam: ' . $nama . '</h4>';
                            echo '<p>Tanggal Pinjam: ' . $tgl . '</p>';
                        }
                        ?>
                        <a href="javascript:window.print()" class="btn-custom print-link"><i class="fas fa-print"></i> Cetak</a>
                        <a href="logout.php" class="btn-custom btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </div>
            </div>
            <!-- End: Card -->
        </div>
        <!-- End: Container -->
    </div>
    <!-- End: Wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>