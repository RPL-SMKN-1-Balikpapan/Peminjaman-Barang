<!-- editpeminjaman.php -->
<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:login.php');
} else {
    $username = $_SESSION['admin'];
}
?>
<?php
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
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Edit Peminjaman</h1>
            <hr>
            <section class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form element -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                        </div><!--/.box-header-->
                        <?php
                        $id = $_GET['id_peminjaman'];
                        $query = $mysqli->query("SELECT * FROM peminjaman INNER JOIN anggota ON peminjaman.id_anggota=anggota.id_anggota WHERE id_peminjaman='$id'");
                        $qu = mysqli_fetch_array($query);
                        ?>
                        <!-- form start -->
                        <form role="form" action="proseseditpeminjaman.php" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ID :</label>
                                    <input type="text" disabled value="<?php echo $qu['id_peminjaman'] ?>" name="id" class="form-control mt-2" placeholder="">
                                    <input type="hidden" value="<?= $qu['id_peminjaman']; ?>" name="id">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="exampleInputPassword1">Nama Barang :</label>
                                    <select class="form-control mt-2" name="id_barang" required>
                                        <?php
                                        $query = $mysqli->query('SELECT * FROM barang');
                                        while ($result = mysqli_fetch_array($query)) {
                                        ?>
                                            <option value="<?php echo $result['id_brg'] ?>" <?php echo $result['id_brg'] == $qu['id_brg'] ? 'selected' : '' ?>><?php echo $result['nama_brg']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="exampleInputPassword1">Nama Peminjam :</label>
                                    <select class="form-control" name="id_anggota" required>
                                        <?php
                                        $query = $mysqli->query('SELECT * FROM anggota');
                                        while ($result = mysqli_fetch_array($query)) {
                                        ?>
                                            <option value="<?php echo $result['id_anggota'] ?>" <?php echo $result['id_anggota'] == $qu['id_anggota'] ? 'selected' : '' ?>><?php echo $result['nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="exampleInputPassword1">Tanggal Peminjaman :</label>
                                    <input type="date" value="<?php echo date('Y-m-d', strtotime($qu['tgl_pinjam'])) ?>" name="tgl_pinjam" class="form-control mt-2 datepicker" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="exampleInputPassword1">Status Peminjaman :</label>
                                    <select name="status" class="form-control mt-2" required>
                                        <option value="1" <?php echo $qu['status'] == 1 ? 'selected' : '' ?>>Sudah Dikembalikan</option>
                                        <option value="0" <?php echo $qu['status'] == 0 ? 'selected' : '' ?>>Belum Dikembalikan</option>
                                    </select>
                                </div>

                                <div class="box mt-5" style="display: flex; justify-content: space-between;">
                                    <a href="peminjaman.php" class="btn btn-danger">Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
            </section><!-- /.content -->
        </div>
    </div>
</body>
</html>
