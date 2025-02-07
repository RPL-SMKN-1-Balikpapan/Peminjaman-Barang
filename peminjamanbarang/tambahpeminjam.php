<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:login.php');
    exit();
} else {
    $username = $_SESSION['admin'];
}

include "config/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" type="image/png" href="./images/logo1.png">
    <title>Website Peminjaman Alat Geomatika</title>
    <style>
        /* Style the sidebar */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            color: #333;
        }
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background: linear-gradient(to right, #007bff, #0056b3);
            padding-top: 70px;
        }

        /* Style the navigation menu */
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            margin: 10px 0;
            border-radius: 5px;
            transition: background 0.3s;
        }

        /* Change color on hover */
        .sidebar a:hover {
            background-color: #0056b3;
        }

        /* Style the content */
        .content {
            margin-left: 250px;
            padding: 20px;
            padding-top: 30px;
        }

        .form-group label {
            font-weight: bold;
        }

        .box {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="barang.php"><i class="fas fa-box"></i> Barang</a>
        <a href="peminjam.php"><i class="fas fa-users"></i> Anggota</a>
        <a href="peminjaman.php"><i class="fas fa-clipboard"></i> Peminjaman</a>
        <a href="pengembalian.php"><i class="fas fa-undo"></i> Pengembalian</a>
    </div>

    <div class="content">
        <h2 class="page-header">Tambah Anggota</h2>
        <form role="form1" action="prosestambahpeminjam.php" method="post">
            <div class="box-body mt-3">
                <hr>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control mt-2" placeholder="Nama..." required>
                </div>
                <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control mt-2" placeholder="Password..." required>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6 mt-2">
                        <label>Jurusan :</label>
                        <select name="jurusan" class="form-control mt-2" required>
                            <option value="" disabled selected>- Pilih Jurusan -</option>
                            <option value="TKP">Teknik Konstruksi dan Perumahan</option>
                            <option value="DPIB">Desain Permodelan dan Informasi Bangunan</option>
                            <option value="TAV">Teknik Audio Video</option>
                            <option value="TEI">Teknik Elektronika Industri</option>
                            <option value="TPL">Teknik Pengelasan</option>
                            <option value="TP">Teknik Pemesinan</option>
                            <option value="TKR">Teknik Kendaraan Ringan</option>
                            <option value="TAB">Teknik Alat Berat</option>
                            <option value="GP">Geologi Pertambangan</option>
                            <option value="TOI">Teknik Otomasi Industri</option>
                            <option value="Geom">Teknik Geomatika</option>
                            <option value="TITL">Teknik Instalasi Tenaga Listrik</option>
                            <option value="TKJ">Teknik Komputer dan Jaringan</option>
                            <option value="RPL">Rekayasa Perangkat Lunak</option>
                        </select>
                    </div>

                    <div class="col-md-6 mt-2">
                        <label>Nomor Kelas :</label>
                        <select name="no_kelas" class="form-control mt-2" required>
                            <option value="" disabled selected>- Kelas -</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                            <option value="XIII">XIII</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="box mt-5">
                <a href="peminjam.php" class="btn btn-danger">Back</a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button>
            </div>
        </form>
    </div>

</body>

</html>
