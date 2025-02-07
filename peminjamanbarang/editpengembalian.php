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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" type="image/png" href="./images/logo1.png">
    <title>Website Peminjaman Alat Geomatika</title>
    <style>
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
            transition: width 0.3s;
        }

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

        .sidebar a:hover {
            background-color: #0056b3;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            padding-top: 30px;
        }

        .page-header {
            margin-top: 0;
        }

        .logout-btn {
            color: white;
            background-color: #ff4b4b;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .logout-btn:hover {
            background-color: #e60000;
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
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Edit Pengembalian</h1>

        <section class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                    </div>
                    <?php
                    $id = $_GET['id_pengembalian'];
                    $query = $mysqli->query("SELECT pengembalian.*,
                                barang.id_brg,
                                barang.nama_brg,
                                peminjaman.id_peminjaman,
                                peminjaman.tgl_pinjam,
                                peminjaman.status,
                                anggota.id_anggota,
                                anggota.nama
                                FROM pengembalian JOIN barang
                                ON pengembalian.id_brg=barang.id_brg JOIN anggota
                                ON pengembalian.id_anggota=anggota.id_anggota JOIN peminjaman
                                ON peminjaman.id_peminjaman=pengembalian.id_peminjaman
                                WHERE pengembalian.id='$id'");
                    $qu = mysqli_fetch_array($query);
                    ?>

                    <form role="form" action="proseseditpengembalian.php?id=<?= $id ?>" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">ID :</label>
                                <input type="text" disable value="<?php echo $qu['id_peminjaman'] ?>" name="id" class="form-control mt-2" placeholder="" disabled>
                                <input type="hidden" value="<?= $qu['id_peminjaman']; ?>" name="id">
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleInputPassword1">Nama Barang :</label>
                                <input type="text" name="nama_brg" readonly="" class="form-control mt-2" disabled value="<?= $qu['nama_brg'] ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleInputPassword1">Nama Peminjam :</label>
                                <input type="text" name="nama" class="form-control mt-2" disabled value="<?= $qu['nama'] ?>" readonly>
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleInputPassword1">Tanggal Pinjam :</label>
                                <input type="date" disabled value="<?php echo date('Y-m-d', strtotime($qu['tgl_pinjam'])) ?>" name="tgl_pinjam"
                                class="form-control mt-2 datepicker" required readonly>
                            </div>
                            <div class="form-group mt-3">
                                <label>Tanggal Kembali :</label>
                                <input type="date" name="tgl_kembali" class="form-control mt-2" value="<?= date('Y-m-d', strtotime($qu['tgl_kembali'])) ?>">
                            </div>

                            <div class="box mt-5" style="display: flex; justify-content: space-between;">
                                <a href="pengembalian.php" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </section><!-- /.content -->
            </div>
        </div>
    </div>
</body>
</html>
