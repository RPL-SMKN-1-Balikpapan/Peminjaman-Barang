<?php require_once "config.inc.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Keranjang Peminjaman - Aplikasi Peminjaman Barang Lab">
  <meta name="author" content="">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="icon" type="image/png" href="../images/logo1.png">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <title>Keranjang Peminjam - Aplikasi Peminjaman Barang Lab</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #e0f7fa, #ffffff);
    }

    .container {
      margin-top: 100px;
      max-width: 900px;
    }

    h3 {
      color: #1e3a8a; /* Dark blue for header */
      font-weight: 600;
      text-align: center;
      margin-bottom: 40px;
    }

    .card {
      padding: 40px;
      border-radius: 15px;
      background: white;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-10px);
    }

    table {
      border-radius: 10px;
      overflow: hidden;
    }

    table thead {
      background: linear-gradient(135deg, #1e3a8a, #3b82f6); /* Dark to Light blue for table header */
      color: white;
      font-size: 1.1rem;
    }

    table tbody tr:hover {
      background-color: #e0f7fa;
      transform: scale(1.02);
      transition: 0.3s ease-in-out;
    }

    img {
      border-radius: 50%;
      width: 60px;
      height: 60px;
      object-fit: cover;
    }

    .btn-primary {
      background-color: #3b82f6; /* Light blue for primary button */
      border: none;
      padding: 10px 20px;
      font-size: 1.2rem;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #1e3a8a; /* Dark blue for hover state */
      transform: translateY(-3px);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-danger {
      background-color: #e11d48; /* Slightly red-pink for contrast */
      border: none;
      padding: 10px 20px;
      font-size: 1.2rem;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-danger:hover {
      background-color: #be123c; /* Darker red for hover state */
      transform: translateY(-3px);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .table td, .table th {
      vertical-align: middle;
      text-align: center;
    }

    .footer {
      background-color: #1e3a8a; /* Dark blue for footer */
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 50px;
      font-size: 0.9rem;
    }

    @media (max-width: 768px) {
      .container {
        padding: 20px;
      }

      .card {
        padding: 20px;
      }

      img {
        width: 50px;
        height: 50px;
      }
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="card">
      <h3>Keranjang Peminjam</h3>
      <form action="index.php" method="post" id="cart">
        
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>ID Barang</th>
              <th>Nama Barang</th>
              <th>Foto</th>
              <th>Hapus</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_SESSION['items'])) {
              foreach ($_SESSION['items'] as $key => $val) {
                $query = $mysqli->query("SELECT barang.id_brg, barang.nama_brg, barang.foto FROM barang WHERE barang.id_brg = '$key'");
                $rs = mysqli_fetch_array($query);
                ?>
                <tr>
                  <td><?php echo $rs['id_brg']; ?></td>
                  <td><?php echo $rs['nama_brg']; ?></td>
                  <td><img src="../<?php echo $rs['foto']; ?>" alt="Foto Barang"></td>
                  <td>
                    <a href="cartfunction.php?act=del&amp;id_product=<?php echo $key; ?>&amp;ref=view_cart.php" class="text-danger">
                      <i class="fas fa-trash-alt fa-lg"></i>
                    </a>
                  </td>
                </tr>
                <?php
                mysqli_free_result($query);
              }
            }
            ?>
          </tbody>
        </table>
        
        <!-- Section for buttons: Pilih Barang Lain and Proses Pinjam -->
        <div class="row mt-4">
          <!-- Button Pilih Barang Lain -->
          <div class="col-6 text-start">
            <button type="submit" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Pilih Barang Lain</button>
          </div>
          <!-- Button Proses Pinjam -->
          <div class="col-6 text-end">
            <a href="proses_pinjam.php?id_anggota=<?php echo $_SESSION['id_anggota']; ?>" class="btn btn-primary"><i class="fas fa-tasks"></i> Proses Pinjam</a>
          </div>
        </div>
      </form>
    </div>
  </div>

  <footer class="footer">
    2023 &copy; Aplikasi Peminjaman Barang Lab. All rights reserved.
  </footer>

  <!-- Bootstrap and JQuery scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>