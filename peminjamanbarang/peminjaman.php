<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:login.php');
} else {
    $username = $_SESSION['admin'];
}

include "config/koneksi.php"; // Pastikan jalur ini benar

// Cek koneksi
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
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

        /* Style the sidebar */
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

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
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
        <div style="flex-grow: 1;"></div>
        <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="content">
        <h2 class="page-header">Peminjaman</h2>
        
        <?php if (isset($_GET['message'])): ?>
            <div class='alert alert-danger'>
                <strong>Opps!</strong> <?= htmlspecialchars($_GET['message']) ?>
            </div>
        <?php endif; ?>

        <div class="mb-3">
            <a href="tambahpeminjaman.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Peminjaman</a>
        </div>

        <div class="row">
            <?php
            $sql = "SELECT peminjaman.id_peminjaman, peminjaman.status, peminjaman.id_anggota, peminjaman.tgl_pinjam, barang.nama_brg, anggota.nama FROM peminjaman JOIN barang ON peminjaman.id_brg=barang.id_brg JOIN anggota ON anggota.id_anggota=peminjaman.id_anggota ORDER BY peminjaman.id_peminjaman DESC";
            $query = $mysqli->query($sql);
            while ($lihat = mysqli_fetch_array($query)):
            ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($lihat['nama_brg']) ?></h5>
                            <p class="card-text">Peminjam: <?= htmlspecialchars($lihat['nama']) ?></p>
                            <p class="card-text">Tanggal Pinjam: <?= date('d-m-Y', strtotime($lihat['tgl_pinjam'])) ?></p>
                            <p class="card-text">
                                <span class="badge <?= $lihat['status'] == 1 ? 'bg-success' : 'bg-danger' ?>">
                                    <?= $lihat['status'] == 1 ? 'Sudah Dikembalikan' : 'Belum Dikembalikan' ?>
                                </span>
                            </p>
                            <a href="editpeminjaman.php?id_peminjaman=<?= $lihat['id_peminjaman'] ?>" class="btn btn-primary">Edit</a>
                            <?php if ($lihat['status'] == 1): // Tombol hapus hanya muncul jika sudah dikembalikan ?>
                                <a href="hapuspeminjaman.php?id=<?= $lihat['id_peminjaman'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus peminjaman ini?');">Hapus</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
