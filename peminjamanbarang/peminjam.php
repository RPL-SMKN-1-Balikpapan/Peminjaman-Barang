<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:login.php');
    exit();
} else {
    $username = $_SESSION['admin'];
    require_once 'config/koneksi.php';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
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

        .btn-danger {
            background-color: #ff4b4b;
            border: none;
            transition: background 0.3s;
        }

        .btn-danger:hover {
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
        <a href="logout.php" class="btn btn-danger" style="text-align:left"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="content">
        <div class="header">
            <h2 class="page-header">Data Anggota</h2>
            <a href="tambahpeminjam.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Anggota</a>
        </div>
        <hr>

        <table id="tabelanggota" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Jurusan</th>
                    <th>Kelas</th>
                    <th>Opsi</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = $mysqli->query("SELECT * FROM anggota");
                while ($lihat = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($lihat['id_anggota']); ?></td>
                        <td><?php echo htmlspecialchars($lihat['nama']); ?></td>
                        <td><?php echo htmlspecialchars($lihat['jurusan']); ?></td>
                        <td><?php echo htmlspecialchars($lihat['no_kelas']); ?></td>
                        <td>
                            <a href="editpeminjam.php?id_peminjam=<?php echo htmlspecialchars($lihat['id_anggota']); ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="confirmDelete(<?php echo $lihat['id_anggota']; ?>)"><i class="fa fa-trash"></i> Hapus</button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm("Apakah Anda yakin ingin menghapus anggota ini?")) {
                window.location.href = "hapuspeminjam.php?id=" + id;
            }
        }
    </script>
</body>
</html>
