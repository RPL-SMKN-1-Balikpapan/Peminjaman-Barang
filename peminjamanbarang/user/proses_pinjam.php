<?php
require_once("config.inc.php");
if (!isset($_SESSION)) {
    session_start();
}

// Ensure user is logged in
if (!isset($_SESSION['id_anggota']) || !isset($_SESSION['anggota'])) {
    header("Location: login.php");
    exit();
}

// Fetch user data
$anggota = $_SESSION['id_anggota'];
$query = $mysqli->prepare("SELECT * FROM anggota WHERE id_anggota = ?");
$query->bind_param("s", $anggota);
$query->execute();
$result = $query->get_result();
$userData = $result->fetch_assoc();
$query->close();

// Set timezone and get current date
date_default_timezone_set('Asia/Jakarta');
$date = date('d-F-Y');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Peminjaman Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" href="../images/logo1.png">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            color: #333;
        }
        .header {
            background-color: #4a90e2;
            color: white;
            padding: 2rem 0;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .container {
            padding-top: 2rem;
        }
        .panel {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        h4, h5 {
            color: #4a90e2;
            font-weight: 600;
        }
        .btn-custom {
            background-color: #4a90e2;
            border: none;
            border-radius: 25px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #3a7bc8;
            transform: translateY(-2px);
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #ced4da;
            padding: 0.75rem 1rem;
        }
        .barang-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1rem;
        }
        .card {
            border: none;
            border-radius: 10px;
            transition: all 0.3s ease;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        .card-img-top {
            height: 100px;
            object-fit: cover;
        }
        .card-body {
            padding: 0.5rem;
        }
        .card-title {
            font-size: 0.9rem;
            margin-bottom: 0;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="header text-center">
    <h2 class="mb-0">Aplikasi Peminjaman Barang</h2>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <h4 class="text-center mb-4">Pendataan Barang</h4>
                <form action="proses_transaksi.php" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" id="nama" class="form-control" disabled value="<?php echo htmlspecialchars($_SESSION['anggota']); ?>">
                        <input type="hidden" name="nama" value="<?php echo htmlspecialchars($_SESSION['anggota']); ?>">
                    </div>
                    <input type="hidden" name="id_anggota" value="<?php echo htmlspecialchars($userData['id_anggota']); ?>">
                    <div class="mb-3">
                        <label for="tgl_pinjam" class="form-label">Tanggal Pinjam:</label>
                        <input type="text" id="tgl_pinjam" class="form-control" disabled value="<?php echo $date; ?>">
                        <input type="hidden" name="tgl_pinjam" value="<?php echo $date; ?>">
                    </div>
                    <button type="submit" name="finish" class="btn btn-custom btn-block w-100">
                        <i class="fas fa-check-circle me-2"></i>Proses Peminjaman
                    </button>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel">
                <h4 class="text-center mb-4">Daftar Barang</h4>
                <div class="barang-container">
                    <?php
                    if (isset($_SESSION['items']) && !empty($_SESSION['items'])) {
                        foreach ($_SESSION['items'] as $key => $val) {
                            $query = $mysqli->prepare("SELECT * FROM barang WHERE id_brg = ?");
                            $query->bind_param("s", $key);
                            $query->execute();
                            $result = $query->get_result();
                            $rs = $result->fetch_assoc();
                            if ($rs) {
                    ?>
                    <div class="card">
                        <img src="../<?php echo htmlspecialchars($rs['foto']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($rs['nama_brg']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($rs['nama_brg']); ?></h5>
                        </div>
                    </div>
                    <?php
                            }
                            $query->close();
                        }
                    } else {
                        echo '<p class="text-center">Belum ada barang yang dipilih.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>