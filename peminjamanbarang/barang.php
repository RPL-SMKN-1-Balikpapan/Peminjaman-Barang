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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
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
        <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="content">
        <div class="header">
            <h2>Data Barang</h2>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>

        <div class="row-search" style="margin-top: 20px; display: flex; justify-content: flex-end;">
            <a href="tambahbrg.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Barang</a>
        </div>

        <div class="row">
            <?php
            $query = $mysqli->query("SELECT * FROM barang");
            while ($lihat = mysqli_fetch_array($query)) {
            ?>
                <div class="col-md-4" style="margin-top: 30px; margin-bottom: 30px">
                    <div class="card">
                        <img src="<?php echo $lihat['foto']; ?>" class="card-img-top" alt="" width="350px" height="300px">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $lihat['nama_brg']; ?></h5>
                            <p class="card-text">Stok: <?php echo $lihat['stok_brg']; ?></p>
                            <div class="text-center">
                                <a href="editbrg.php?id_brg=<?php echo $lihat['id_brg']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                <a href="hapusbrg.php?id=<?php echo $lihat['id_brg']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>
