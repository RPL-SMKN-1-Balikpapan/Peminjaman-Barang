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

        .content {
            margin-left: 250px;
            padding: 20px;
            padding-top: 30px;
        }

        table {
            border-collapse: separate;
            border-spacing: 0 1rem; /* Add spacing between rows */
        }

        .table th,
        .table td {
            vertical-align: middle; /* Align text vertically */
        }

        .table tbody tr:hover {
            background-color: #f1f1f1; /* Hover effect */
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
    <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>


    <div class="content">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h2 class="page-header">Pengembalian</h2>
            <hr>
            <div class="table-responsive">
                <table id="tabelpengembalian" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT pengembalian.*, 
                                barang.id_brg, 
                                barang.nama_brg, 
                                peminjaman.id_peminjaman, 
                                peminjaman.tgl_pinjam, 
                                peminjaman.status, 
                                anggota.id_anggota, 
                                anggota.nama 
                                FROM pengembalian 
                                JOIN barang ON pengembalian.id_brg=barang.id_brg 
                                JOIN anggota ON pengembalian.id_anggota=anggota.id_anggota 
                                JOIN peminjaman ON peminjaman.id_peminjaman=pengembalian.id_peminjaman 
                                WHERE peminjaman.status=1";
                        $query = $mysqli->query($sql);

                        if ($query && mysqli_num_rows($query) > 0) {
                            $no = 1;
                            while ($lihat = mysqli_fetch_array($query)) {
                        ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo htmlspecialchars($lihat['nama_brg']); ?></td>
                                    <td><?php echo htmlspecialchars($lihat['nama']); ?></td>
                                    <td><?php echo htmlspecialchars($lihat['tgl_pinjam']); ?></td>
                                    <td><?php echo htmlspecialchars($lihat['tgl_kembali']); ?></td>
                                    <td>
                                        <a href="editpengembalian.php?id_pengembalian=<?php echo $lihat['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="hapuspengembalian.php?id=<?php echo $lihat['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>Tidak ada data pengembalian yang tersedia.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
