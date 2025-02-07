<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
            overflow: hidden;
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
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
        }
        .logout-btn {
            color: white;
            background-color: #ff4b4b;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .logout-btn:hover {
            background-color: #e60000;
        }
        .geomatik-image {
            margin-top: 30px;
            width: 100%;
            height:50%;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
    <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<div class="content">
    <div class="header">
        <h2>Dashboard</h2>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card p-3 mb-4">
                <h5>Total Barang</h5>
                <hr>
                <h2 class="text-center">
                    <?php
                    require 'config/koneksi.php';
                    $query = $mysqli->query("SELECT count(id_brg) as total_barang FROM barang");
                    $data = mysqli_fetch_assoc($query);
                    echo $data['total_barang'];
                    ?>
                </h2>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3 mb-4">
                <h5>Total Peminjaman</h5>
                <hr>
                <h2 class="text-center">
                    <?php
                    $query = $mysqli->query("SELECT count(id_peminjaman) as total_peminjaman FROM peminjaman");
                    $data = mysqli_fetch_assoc($query);
                    echo $data['total_peminjaman'];
                    ?>
                </h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3 mb-4">
                <h5>Grafik Peminjaman</h5>
                <hr>
                <div id="grafikPeminjaman" style="height: 300px;"></div>
            </div>
        </div>
    </div>
    
    <!-- Gambar Geomatika -->
    <div class="row">
        <div class="col-md-12">
            <img src="https://static.vecteezy.com/system/resources/previews/012/806/443/non_2x/mountain-ridge-free-png.png" alt="Geomatika" class="geomatik-image">
        </div>
    </div>
</div>
 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafikPeminjaman').getContext('2d');
    const grafikPeminjaman = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Peminjaman per Bulan',
                data: [12, 19, 3, 5, 2, 3, 15, 10, 20, 5, 7, 14],
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>
