<?php

include 'koneksi.php';


$koneksi = mysqli_connect("localhost", "root", "", "dbtugasakhir");

if (!$koneksi) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

// Query untuk mendapatkan data penjualan
$query_sales = "SELECT pesanan.nama_mobil, 
                       pesanan.harga, 
                       SUM(pesanan.jumlah) as total_jumlah, 
                       SUM(pesanan.harga * pesanan.jumlah) as total_penjualan
                FROM pesanan
                WHERE pesanan.status = 'Dikonfirmasi'
                GROUP BY pesanan.id_produk";

$result_sales = mysqli_query($koneksi, $query_sales);

if (!$result_sales) {
    echo "Error: " . $query_sales . "<br>" . mysqli_error($koneksi);
}

// Query untuk mendapatkan total penjualan keseluruhan
$query_total = "SELECT SUM(pesanan.harga * pesanan.jumlah) as total_penjualan
                FROM pesanan
                WHERE pesanan.status = 'Dikonfirmasi'";

$result_total = mysqli_query($koneksi, $query_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_penjualan_keseluruhan = $row_total['total_penjualan'];

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <!-- Bootstrap CSS (Optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<style>
    body{
        padding-bottom: 100px;
    }

    .nav-link{
        color: white;
    }

    .nav-link:hover{
      color: #848482;
    }
</style>

<body>

<header class="fixed-top">
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Jeep Journeys</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto btn-primary">
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="produk.php">Produk</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="daftar_pesanan.php">Daftar Pesanan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="laporan_penjualan.php">Laporan Penjualan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
    </div>
  </div>
</nav>
</header>

    <div class="container">
        <h2 class="text-center">Laporan Penjualan</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Total Jumlah Terjual</th>
                    <th>Total Penjualan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row_sales = mysqli_fetch_assoc($result_sales)) {
                    echo "<tr>";
                    echo "<td>" . $row_sales['nama_mobil'] . "</td>";
                    echo "<td>Rp " . number_format($row_sales['harga'], 0, ',', '.') . "</td>";
                    echo "<td>" . $row_sales['total_jumlah'] . "</td>";
                    echo "<td>Rp " . number_format($row_sales['total_penjualan'], 0, ',', '.') . "</td>";
                    echo "</tr>";
                }
                ?>
                <tr>
                    <td colspan="3" class="text-end"><strong>Total Penjualan Keseluruhan:</strong></td>
                    <td><strong>Rp <?php echo number_format($total_penjualan_keseluruhan, 0, ',', '.'); ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>