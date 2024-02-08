<?php
include 'koneksi.php';

?>

<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .mySlides {display:none;}
    </style>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body>

    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
        <a href="home.php" class="w3-bar-item w3-button"><img src="gambar/lele.png" alt="" width="150px"></a>
        <h3 class="w3-bar-item">Selamat Datang</h3>
        <a href="dashboard.php" class="w3-bar-item w3-button">Produk</a>
        <a href="kategori.php" class="w3-bar-item w3-button">Kategori</a>
        <a href="tambah.php" class="w3-bar-item w3-button">Tambah Produk</a>
        <a href="inbox.php" class="w3-bar-item w3-button">Inbox</a>
        <a href="keranjangpenjual.php" class="w3-bar-item w3-button">Pesanan</a>
        <a href="log_bayar.php" class="w3-bar-item w3-button">log pesanan</a>
        <a href="pembayaran.php" class="w3-bar-item w3-button">pembayaran</a>
        
        <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
    </div>

    <!-- Page Content -->
    <div style="margin-left:25%">

        <div class="w3-container w3-teal">
            <h1>pembayaran</h1>
        </div>


<div class="container mt-5">
    <?php
    include 'koneksi.php';

    // Query to retrieve all data from the "bayar" table
    $sql = "SELECT * FROM bayar";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card mb-3'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>ID: " . $row["id_pembayar"] . "</h5>";
            echo "<p class='card-text'>Nama Pembayar: " . $row["nama_pembayar"] . "</p>";
            echo "<p class='card-text'>Alamat: " . $row["alamat"] . "</p>";
            echo "<p class='card-text'>Yang Dipesan: " . $row["ygdipesan"] . "</p>";
            echo "<p class='card-text'>Jumlah Bayar: " . $row["jumlah_bayar"] . "</p>";

            // Display image from the "gambar" folder
            $gambarPath = "gambar/" . $row["gambar"];
            echo "<p class='card-text'>Gambar: <img src='$gambarPath' alt='gambar' class='img-fluid'></p>";

            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p class='lead'> Tidak Ada pesanan</p>";
    }

    $conn->close();
    ?>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
