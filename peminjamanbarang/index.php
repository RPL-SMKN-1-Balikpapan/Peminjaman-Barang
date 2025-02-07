<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="./images/logo1.png">
    <title>Website Peminjaman Alat Geomatika</title>
    <style>
        * {
            font-family: 'Roboto', sans-serif;
        }

        body {
            overflow-x: hidden;
            background: linear-gradient(135deg, #f4f6f9, #d6e9f7);
        }

        .navbar {
            background: linear-gradient(45deg, #2691D9, #1B5D8B);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            height: 45px;
            width: 45px;
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #FFDD57 !important;
        }

        .container-fluid {
            height: 92vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: url('./images/background-pattern.svg') no-repeat center center;
            background-size: cover;
        }

        .hero-text h1 {
            font-size: 3.5rem;
            color: #1B5D8B;
            font-weight: 700;
        }

        .hero-text p {
            font-size: 1.2rem;
            margin-top: 20px;
            color: #5a5a5a;
        }

        .hero-btn {
            background: linear-gradient(90deg, #2691D9, #1B5D8B);
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            margin-top: 30px;
            transition: all 0.3s ease;
        }

        .hero-btn:hover {
            background: linear-gradient(90deg, #1B5D8B, #2691D9);
            box-shadow: 0px 4px 15px rgba(38, 145, 217, 0.3);
            transform: translateY(-3px);
        }

        footer {
            background-color: #1B5D8B;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        footer i {
            margin-right: 5px;
        }

        footer label {
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .hero-text h1 {
                font-size: 2.5rem;
            }

            .hero-text p {
                font-size: 16px;
            }

            .hero-btn {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./images/logo1.png" alt="Logo">
                Peminjaman Alat Geomatika
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tentangkami.php">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php">
                            <button type="button" class="btn btn-light" style="color: #2691D9; font-weight: bold;">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 hero-text">
                <h1>Welcome Rent Here</h1>
                <p>Selamat Datang di Aplikasi Pemimjaman Alat Geomatika, Tempat Terbaik untuk Memenuhi Kebutuhan Peminjaman Barang Laboratorium Komputer!</p>
                <a href="tentangkami.php">
                    <button class="hero-btn">Read Now!</button>
                </a>
            </div>
            <div class="col-lg-6">
                <img src="./images/tentangkami.png" alt="About Us" class="img-fluid">
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div>
            <i class="fas fa-gavel"></i>
            <label>2023 Copyright - Website Peminjaman Alat Geomatika</label>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
