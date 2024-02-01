<?php
session_start();

include 'koneksi.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
    <style>
        body {
            
    }
    </style>
<body>
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
        <a href="home.php" class="w3-bar-item w3-button"><img src="gambar/lele.png " alt="" width="150px"></a>
        <h3 class="w3-bar-item">Selamat Datang</h3>
        <a href="dashboard.php" class="w3-bar-item w3-button">Produk</a>
        <a href="kategori.php" class="w3-bar-item w3-button">Kategori</a>
        <a href="tambah.php" class="w3-bar-item w3-button">Tambah Produk</a>
        <a href="logout.php" class="w3-bar-item w3-button">logout</a>

      </div>
      
      <!-- Page Content -->
      <div style="margin-left:25%">
      
      <div class="w3-container w3-teal">
        <h1>Tambahkan Produk</h1>
</div>
    <div class="container mt-5">
        <a href="dashboard.php" class="btn btn-success" my-3">Kembali</a><br><br>
        <label >kategori</label>
        <form action="proses_tambah.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
        <select class="form-select" name="id_kategori" id="id_kategori" required>
        <?php
                        require 'koneksi.php';

                        // Query untuk mengambil data kategori dari database
                        $query_kategori = "SELECT * FROM tbkategori";
                        $result_kategori = mysqli_query($conn, $query_kategori);

                        // Loop untuk menampilkan opsi kategori
                        while ($kategori = mysqli_fetch_assoc($result_kategori)) {
                            echo "<option value='" . $kategori['id'] . "'>" . $kategori['nama'] . "</option>";
                        }
                        ?>
             </select>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>