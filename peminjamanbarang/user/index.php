<?php
session_start();
include("config.inc.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<link rel="icon" type="image/png" href="../images/logo1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" crossorigin="anonymous">
    
    <!-- Custom styles -->
    <style>
        /* Use a modern, elegant font */
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f0f2f5;
        }

        /* Navbar styling */
        .navbar {
            background-color: #007bff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.6rem;
            color: #fff !important;
        }

       
        .btn-logout:hover {
            background-color: #e6e6e6;
            transform: translateY(-2px);
        }

        /* Card styling */
        .card {
            border: none;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 1rem;
            background-color: #e0f7fa;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card img {
            border-radius: 1rem 1rem 0 0;
            object-fit: cover;
            height: 220px;
            width: 100%;
        }

        .card-body {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 0 0 1rem 1rem;
        }

        /* Enhanced font for the item name */
        .card-title {
            font-weight: 700;
            font-size: 1.6rem;
            color: #333;
            margin-bottom: 12px;
        }

        /* Styling for the details (Jenis and Stok) */
        .card-text-container {
            display: block;
            margin-bottom: 8px;
        }

        .card-text {
            margin-bottom: 4px; /* Reduce margin to bring text closer */
            color: #555;
            display: flex;
            align-items: center;
        }

        /* Styling for icons */
        .card-text i {
            margin-right: 8px;
            color: #007bff;
        }

        .btn-pinjam {
            background-color: #2691D9;
            border: none;
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .text-danger {
            font-weight: bold;
        }

        .footer {
            margin-top: 50px;
            padding: 20px 0;
            background-color: #f1f1f1;
            text-align: center;
        }

        /* Background colors for card rotations */
        .bg-light-blue {
            background-color: #e3f2fd;
        }

        .bg-light-purple {
            background-color: #f3e5f5;
        }

        .bg-light-green {
            background-color: #e8f5e9;
        }
    </style>

    <title>Aplikasi Peminjaman Barang Lab</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                🛒 Peminjaman Barang Lab
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="logout.php" class="btn btn-light" style="font-weight: bold;"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    // Fetch products from the database
    $alat = $mysqli->query("SELECT * FROM barang") or die(mysqli_error($mysqli));
    ?>

    <!-- Product Grid -->
    <div class="container mt-5">
        <div class="row">
            <?php
            $bg_classes = ['bg-light-blue', 'bg-light-purple', 'bg-light-green'];
            $counter = 0;
            while ($row_alat = mysqli_fetch_array($alat)) {
                $foto = $row_alat['foto'];
                $stok = $row_alat['stok_brg'];
                $bg_class = $bg_classes[$counter % 3]; // Rotate background colors
                $counter++;
                ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card <?php echo $bg_class; ?> h-100">
                        <img src="../<?php echo $foto; ?>" class="card-img-top" alt="<?php echo $row_alat['nama_brg']; ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $row_alat['nama_brg']; ?></h5>
                            <div class="card-text-container">
                                <p class="card-text">
                                    <i class="fas fa-tag"></i> Jenis: <?php echo $row_alat['jenis_brg']; ?>
                                </p>
                                <p class="card-text">
                                    <i class="fas fa-box"></i> Stok: <?php echo $stok; ?>
                                </p>
                            </div>
                            <?php if ($stok > 0) { ?>
                                <a href="cartfunction.php?act=add&amp;id_product=<?php echo $row_alat['id_brg']; ?>&amp;id_pembeli=<?php echo $_SESSION['id_anggota']; ?>&amp;ref=view_cart.php" class="btn btn-primary">
                                    <i class="fas fa-cart-arrow-down"></i> Pinjam
                                </a>
                            <?php } else { ?>
                                <span class="text-danger">Stok Habis</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Aplikasi Peminjaman Barang Lab. All Rights Reserved.</p>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>