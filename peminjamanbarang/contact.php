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
            background-color: #f4f6f9;
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

        h1 {
            color: #1B5D8B;
        }

        .form-control {
            border-radius: 0.375rem;
            border: 1px solid #ced4da;
            transition: box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #2691D9;
            box-shadow: 0 0 0 0.2rem rgba(38, 145, 217, 0.25);
        }

        .btn-primary {
            background-color: #2691D9;
            border-color: #2691D9;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #1B5D8B;
            border-color: #1B5D8B;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        footer {
            background-color: #1B5D8B;
            color: white;
            padding: 10px 0;
        }

        .form-wrapper {
            background: linear-gradient(to bottom right, #ffffff, #f0f5ff);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            transition: transform 0.3s ease;
        }

        .form-wrapper:hover {
            transform: translateY(-5px);
        }

        .form-wrapper h1 {
            font-size: 36px;
        }

        .form-wrapper button {
            width: 100%;
        }

        hr {
            width: 100px;
            margin: 0 auto;
            border: 2px solid #1B5D8B;
        }

        .navbar-toggler {
            border-color: #fff;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./images/logo1.png" alt="Pemimjaman alat Geomatika" style="height: 45px; width: 45px; margin-right: 5px;">
                Peminjaman Alat Geomatika
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-5" href="index.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="tentangkami.php">Tentang Kami</a>
                    </li>
                    <li class="nav-item ms-5">
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

    <!-- Contact Form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-wrapper text-center">
                    <h1 class="fw-bold">Contact Us</h1>
                    <hr>
                    <form id="contactForm" class="mt-4">
                        <div class="mb-3">
                            <label class="form-label" for="name"><i class="fas fa-user"></i> Name</label>
                            <input class="form-control" id="name" type="text" placeholder="Enter your name"
                                data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="emailAddress"><i class="fas fa-envelope"></i> Email
                                Address</label>
                            <input class="form-control" id="emailAddress" type="email" placeholder="Enter your email"
                                data-sb-validations="required, email" />
                            <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is
                                required.</div>
                            <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email is not valid.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="message"><i class="fas fa-comment-dots"></i> Message</label>
                            <textarea class="form-control" id="message" placeholder="Enter your message" style="height: 10rem;"
                                data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">Message is required.</div>
                        </div>

                        <button class="btn btn-primary btn-lg mt-3" type="submit"><i class="fas fa-paper-plane"></i> Send
                            Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3" style="background-color: #1B5D8B;">
            <i class="fas fa-gavel text-white" style="margin-right: 5px;"></i>
            <label class="text-white">2023 Copyright - Website Peminjaman Alat Geomatika</label>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
