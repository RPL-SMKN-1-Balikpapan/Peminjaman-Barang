<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" type="image/png" href="./images/logo1.png">
    <title>Website Peminjaman Alat Geomatika</title>
    <style>
        * {
            font-family: 'Roboto', sans-serif;
        }

        body {
            background-color: #f4f7fb;
        }

        .navbar {
            background: linear-gradient(45deg, #2691D9, #1B5D8B);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            color: white !important;
        }

        .navbar-nav .nav-link.active {
            color: #FFD700 !important;
        }

        .navbar-nav .nav-link:hover {
            color: #FFD700 !important;
            transition: color 0.3s ease;
        }

        .hero-section {
            background: linear-gradient(120deg, #6EC1E4, #2691D9);
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: bold;
        }

        .hero-divider {
            width: 80px;
            height: 4px;
            background-color: #FFD700;
            margin: 20px auto;
        }

        .hero-text {
            font-size: 1.3rem;
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .btn-hero {
            background-color: #FFD700;
            color: #1B5D8B;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-hero:hover {
            background-color: #FFDD57;
            color: #fff;
        }

        .about-section {
            padding: 60px 0;
            background-color: #fff;
        }

        .about-title {
            font-size: 2.5rem;
            color: #1B5D8B;
            font-weight: bold;
            text-align: center;
        }

        .about-text {
            font-size: 1.2rem;
            color: #5a5a5a;
            line-height: 1.8;
            margin-top: 20px;
        }

        .about-image {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            border-radius: 10px;
        }

        .footer {
            background-color: #1B5D8B;
            color: white;
            padding: 20px 0;
            text-align: center;
            position: relative;
        }

        .footer a {
            color: #FFD700;
            text-decoration: none;
        }

        .footer a:hover {
            color: #FFDD57;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .about-title {
                font-size: 2rem;
            }

            .about-text {
                font-size: 1rem;
            }

            .about-image {
                max-width: 350px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./images/logo1.png" alt="Logo" style="height: 45px; width: 45px; margin-right: 10px;">
                Peminjaman Alat Geomatika
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="tentangkami.php">Tentang Kami</a>
                    </li>
                    <li class="nav-item ms-5 loggin-button">
                        <a href="login.php">
                            <button type="button" class="btn btn-light btn-custom">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <h1 class="hero-title">About Our Company</h1>
        <div class="hero-divider"></div>
        <p class="hero-text">Learn more about how we provide essential equipment for laboratories and empower research.</p>
        <a href="contact.php" class="btn-hero">Contact Us</a>
    </div>

    <!-- About Section -->
    <div class="about-section container">
        <div class="row text-center mb-4">
            <div class="col-12">
                <h2 class="about-title">Who We Are</h2>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6 text-center">
                <img src="./images/perusahaan.png" alt="Company Image" class="about-image img-fluid">
            </div>
            <div class="col-md-6">
                <p class="about-text">Aplikasi Pemimjaman Barang Lab adalah perusahaan yang berdedikasi dalam menyediakan solusi peminjaman barang untuk kebutuhan laboratorium. Kami memahami pentingnya akses yang mudah terhadap peralatan laboratorium.</p>
                <p class="about-text">Visi kami adalah memudahkan proses peminjaman barang lab dengan platform inovatif, memastikan para peneliti, mahasiswa, dan staf lab dapat fokus tanpa hambatan.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p><i class="fas fa-gavel"></i> © 2023 Peminjaman Alat Geomatika. All rights reserved.</p>
            
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
