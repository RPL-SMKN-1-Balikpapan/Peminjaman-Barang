<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:login.php');
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

        .header h1 {
            margin: 0;
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
        <div class="header">
            <h1>Edit Barang</h1>
            <a href="barang.php" class="btn btn-danger">Back</a>
        </div>
        <hr>
        <section class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header with-border"></div>
                    <?php
                    $id_brg = $_GET['id_brg'];
                    $query = $mysqli->query("SELECT * FROM barang WHERE id_brg='$id_brg'");
                    while ($qu = mysqli_fetch_array($query)) {
                    ?>
                    <form role="form" action="proseseditbrg.php" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kode Alat/ID :</label>
                                <input type="text" disable value="<?php echo $qu['id_brg'] ?>" name="id_brg" class="form-control mt-2" placeholder="" disabled>
                                <input type="hidden" value="<?= $qu['id_brg']; ?>" name="id_brg">
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleInputPassword1">Nama Barang :</label>
                                <input type="text" value="<?php echo $qu['nama_brg'] ?>" name="nama_brg" class="form-control mt-2" placeholder="" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleInputPassword1">Stok Barang :</label>
                                <input type="text" value="<?php echo $qu['stok_brg'] ?>" name="stok_brg" class="form-control mt-2" placeholder="" required>
                            </div>
                        </div>
                        <div class="box mt-5" style="display: flex; justify-content: space-between;">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </form>
                    <?php
                    } // Penutupan while
                    ?>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
