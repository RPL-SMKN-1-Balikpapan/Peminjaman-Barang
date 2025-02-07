<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:login.php');
} else {
    $username = $_SESSION['admin'];
}
include "config/koneksi.php"; // Pastikan jalur ini benar
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

        .box-body {
            margin-top: 20px;
        }

        .btn-danger {
            margin-right: 10px;
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
        <div style="flex-grow: 1;"></div>
        
    </div>

    <div class="content">
        <h2 class="page-header">Tambah Peminjaman</h2>
        <hr>

        <?php if (isset($_GET['message'])): ?>
            <div class='alert alert-danger'>
                <strong>Oops!</strong> <?= htmlspecialchars($_GET['message']) ?>
            </div>
        <?php endif; ?>

        <form role="form" action="prosestambahpeminjaman.php" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label for="">Pilih Barang :</label>
                    <select name="nama_barang" class="form-control mt-2" required>
                        <option value="" selected disabled>- Pilih Barang -</option>
                        <?php
                        $sql = "SELECT * FROM barang";
                        $query = $mysqli->query($sql);
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?php echo $data['id_brg'] ?>"><?php echo $data['nama_brg'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="">Nama Peminjam :</label>
                    <select name="nama_peminjam" class="form-control mt-2" required>
                        <option value="" selected disabled>- Nama Peminjam -</option>
                        <?php
                        $sql = "SELECT * FROM anggota";
                        $query = $mysqli->query($sql);
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?php echo $data['id_anggota'] ?>"><?php echo $data['nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="exampleInputPassword1">Tanggal Pinjam :</label>
                    <input type="date" name="tgl_pinjam" class="form-control mt-2" placeholder="Tanggal Pinjam..." required>
                </div>

                <div class="box mt-5" style="display: flex; justify-content: space-between;">
                    <a href="peminjaman.php" class="btn btn-danger">Back</a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
