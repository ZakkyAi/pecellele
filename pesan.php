<?php
session_start();
include 'koneksi.php';

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:logout.php?pesan=gagal");
}

require 'koneksi.php'; // Pastikan file koneksi.php sesuai dengan pengaturan koneksi database Anda

// Ambil daftar produk dari database
$queryproduk = "SELECT * FROM tbproduk";
$result_produk = mysqli_query($conn, $queryproduk);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-submit {
            background-color: #0d6efd;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>

<body>
    <div class="container">
    <form action="proses_pemesanan.php" method="post" enctype="multipart/form-data">
        <h1 class="text-center my-4">Formulir Pemesanan</h1>
        <div class="form-container">
            <form action="proses_pemesanan.php" method="POST">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Pengiriman:</label>
                    <textarea id="alamat" name="alamat" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Pesanan:</label>
                    <input type="number" id="jumlah" name="jumlah" class="form-control" required>
                </div>
                <div class="form-group">
</div>
<img src="gambar/wa.jpg"  style="width: 100px; height: auto;">
<div class="form-group">
                    <label for="bukti_pembayaran">Unggah Bukti Pembayaran:</label>
                    <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*" class="form-control">
                </div>
<form action="proses_pemesanan.php" method="post" enctype="multipart/form-data">

    

                
                <button type="submit" class="btn btn-submit">Pesan Sekarang</button>
            </form>
        </div>
        
    </div>

    <!-- Bootstrap JS dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>