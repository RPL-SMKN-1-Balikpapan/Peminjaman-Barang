<?php
session_start();
if(!isset($_SESSION['admin'])) {
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

        .box {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
    </div>

    <div class="content">
        <h1 class="page-header">Edit Anggota</h1>
        <hr>
        <section class="row">
            <div class="col-md-12">
                <div class="box">
                    <?php
                    $id_peminjam = $_GET['id_peminjam'];
                    $query = $mysqli->query("SELECT * FROM anggota WHERE id_anggota='$id_peminjam'");

                    if ($qu = mysqli_fetch_array($query)) {
                    ?>
                    <form role="form" action="proseseditpeminjam.php" method="post">
                        <div class="form-group">
                            <label>No :</label>
                            <input type="text" value="<?php echo htmlspecialchars($qu['id_anggota']); ?>" name="id_peminjam" class="form-control" disabled>
                            <input type="hidden" value="<?php echo htmlspecialchars($qu['id_anggota']); ?>" name="id_peminjam">
                        </div>
                        <div class="form-group mt-3">
                            <label>Username :</label>
                            <input type="text" value="<?php echo htmlspecialchars($qu['nama']); ?>" name="username" class="form-control" required>
                        </div>
                        <div class="form-group mt-3">
                            <label>Password :</label>
                            <input type="password" value="<?php echo htmlspecialchars($qu['password']); ?>" name="password" class="form-control" required>
                        </div>
                        <div class="form-group mt-3">
                            <label>Jurusan :</label>
                            <select name="jurusan" class="form-control" required>
                                <option value="" disabled>- Pilih Jurusan -</option>
                                <option value="TKP" <?php echo ($qu['jurusan'] == 'TKP') ? 'selected' : ''; ?>>Teknik Konstruksi dan Perumahan</option>
                                <option value="DPIB" <?php echo ($qu['jurusan'] == 'DPIB') ? 'selected' : ''; ?>>Desain Permodelan dan Informasi Bangunan</option>
                                <option value="TAV" <?php echo ($qu['jurusan'] == 'TAV') ? 'selected' : ''; ?>>Teknik Audio Video</option>
                                <option value="TEI" <?php echo ($qu['jurusan'] == 'TEI') ? 'selected' : ''; ?>>Teknik Elektronika Industri</option>
                                <option value="TPL" <?php echo ($qu['jurusan'] == 'TPL') ? 'selected' : ''; ?>>Teknik Pengelasan</option>
                                <option value="TP" <?php echo ($qu['jurusan'] == 'TP') ? 'selected' : ''; ?>>Teknik Pemesinan</option>
                                <option value="TKR" <?php echo ($qu['jurusan'] == 'TKR') ? 'selected' : ''; ?>>Teknik Kendaraan Ringan</option>
                                <option value="TAB" <?php echo ($qu['jurusan'] == 'TAB') ? 'selected' : ''; ?>>Teknik Alat Berat</option>
                                <option value="GP" <?php echo ($qu['jurusan'] == 'GP') ? 'selected' : ''; ?>>Geologi Pertambangan</option>
                                <option value="TOI" <?php echo ($qu['jurusan'] == 'TOI') ? 'selected' : ''; ?>>Teknik Otomasi Industri</option>
                                <option value="Geom" <?php echo ($qu['jurusan'] == 'Geom') ? 'selected' : ''; ?>>Teknik Geomatika</option>
                                <option value="TITL" <?php echo ($qu['jurusan'] == 'TITL') ? 'selected' : ''; ?>>Teknik Instalasi Tenaga Listrik</option>
                                <option value="TKJ" <?php echo ($qu['jurusan'] == 'TKJ') ? 'selected' : ''; ?>>Teknik Komputer dan Jaringan</option>
                                <option value="RPL" <?php echo ($qu['jurusan'] == 'RPL') ? 'selected' : ''; ?>>Rekayasa Perangkat Lunak</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Nomor Kelas :</label>
                            <select name="no_kelas" class="form-control" required>
                                <option value="" disabled>- No Kelas -</option>
                                <?php
                                // Jika Anda ingin menggunakan PHP untuk menampilkan pilihan
                                $kelas = ['X', 'XI', 'XII', 'XIII'];
                                foreach ($kelas as $k) {
                                    $selected = ($qu['no_kelas'] == $k) ? 'selected' : '';
                                    echo "<option value='$k' $selected>$k</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="box mt-5" style="display: flex; justify-content: space-between;">
                            <a href="peminjam.php" class="btn btn-danger">Back</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </form>
                    <?php
                    } else {
                        echo "<p>Data anggota tidak ditemukan.</p>";
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>

</body>
</html>
