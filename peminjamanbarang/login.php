<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image/png" href="./images/logo1.png">
    <title>Website Peminjaman Alat Geomatika</title>
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            font-family: 'Poppins', sans-serif;
        }

        .box-area {
            transition: transform 0.3s ease;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }

        .box-area:hover {
            transform: scale(1.03);
        }

        .left-box {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            color: #fff;
        }

        .left-box img {
            max-width: 250px;
            animation: fadeIn 1.5s ease;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .right-box {
            padding: 50px;
            background: #fff;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .header-text {
            color: #333;
            font-weight: bold;
        }

        .header-text h2 {
            font-size: 28px;
        }

        .form-control {
            border: none;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #1e3c72;
            border: none;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2a5298;
        }

        .btn-light {
            background-color: #f7f7f7;
            border: none;
            color: #333;
        }

        .btn-light:hover {
            background-color: #ddd;
        }

        a img {
            width: 20px;
        }

        /* Custom alert box */
        .alert-box {
            display: none;
            padding: 15px;
            border-radius: 10px;
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 1000;
            font-size: 16px;
            color: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>

    <?php
    session_start();
    // Memeriksa apakah sesi login sukses di-set
    if (!isset($_SESSION['admin'])) {
        $_SESSION['admin'] = "";
    }
    echo $_SESSION['admin'];
    ?>

    <div class="row" style="background:#0379C8">
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="row border rounded-5 p-3 bg-white shadow box-area">
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                    <div class="featured-image mb-3">
                        <img src="./user/images/admin.png" class="img-fluid" alt="Admin">
                    </div>
                    <p class="lead mt-3">Admin Panel</p>
                </div>
                <div class="col-md-6 right-box">
                    <div class="row align-items-center text-center">
                        <div class="header-text mb-4">
                            <h2>Login Admin</h2>
                        </div>
                        <form action="proseslogin.php" method="post">
                            <div class="input-group mb-3">
                                <input name="username" type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Username" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" required>
                            </div>
                            <div class="input-group mb-3">
                                <button class="btn btn-lg btn-primary w-100 fs-6" type="submit">Login</button>
                            </div>
                            <div class="input-group mb-3">
                                <a href="user/login_anggota.php" class="btn btn-lg btn-light w-100 fs-6">
                                    <img src="./user/images/user.png" class="me-2" alt="User">
                                    <small>Login Sebagai Anggota</small>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Memeriksa status login
    $status = isset($_GET['status']) ? $_GET['status'] : '';
    ?>

    <script>
        $(document).ready(function() {
            const status = "<?php echo $status; ?>";
            if (status === "success") {
                showAlert("green", "Login berhasil, tunggu sebentar! \u2705"); // Emoji centang
                setTimeout(() => window.location.href = 'dashboard.php', 5000); // Redirect ke dashboard setelah 5 detik
            } else if (status === "failure") {
                showAlert("red", "Tolong periksa username dan password! \u26A0"); // Emoji bahaya
            }

            // Fungsi untuk menampilkan alert
            function showAlert(color, message) {
                let alertBox = $('<div class="alert-box"></div>');
                alertBox.css({
                    'background-color': color,
                    'padding': '15px',
                    'border-radius': '10px',
                    'color': 'white',
                    'position': 'fixed',
                    'top': '10px',
                    'right': '10px',
                    'z-index': '1000',
                    'font-size': '16px',
                    'box-shadow': '0 5px 15px rgba(0,0,0,0.1)',
                });
                alertBox.text(message);

                $('body').append(alertBox);
                alertBox.fadeIn();

                setTimeout(function() {
                    alertBox.fadeOut(500, function() {
                        $(this).remove();
                    });
                }, 5000); // Alert akan hilang setelah 5 detik
            }
        });
    </script>
</body>
</html>
