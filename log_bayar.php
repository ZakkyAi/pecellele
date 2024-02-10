<?php
include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Add Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title>Your Log Bayar Page</title>
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
            <h1>log pesanan</h1>
        </div>
    <div class="container">

    
        <?php
        // Include the koneksi.php file for database connection
        include 'koneksi.php';

        // Your SQL query to retrieve data goes here
        $sql = "SELECT * FROM log";
        $result = $conn->query($sql);

        // Display the data in a table
        if ($result->num_rows > 0) {
            echo "<table class='table'>";
            echo "<thead>\n";
            echo "    <tr>\n";
            echo "        <th>ID</th>\n";
            echo "        <th>Nama Pembayar</th>\n";
            echo "        <th>Alamat</th>\n";
            echo "        <th>Yang Dipesan</th>\n";
            echo "        <th>Jumlah Bayar</th>\n";
            echo "        <th>Status</th>\n"; 
            echo "    </tr>\n";
            echo "</thead>\n";
            echo "<tbody>\n";
            // Your table body content goes here
            echo "</tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>\n";
                echo "    <td>{$row['id_pembayar']}</td>\n";
                echo "    <td>{$row['nama_pembayar']}</td>\n";
                echo "    <td>{$row['alamat']}</td>\n";
                echo "    <td>{$row['ygdipesan']}</td>\n";
                echo "    <td>{$row['jumlah_bayar']}</td>\n";
                echo "    <td>{$row['status']}</td>\n";
                echo "</tr>\n";
            }
            

            echo "</tbody></table>";
        } else {
            echo "Tidak ada pesanan saat ini";
        }

        // Close the connection
        $conn->close();
        ?>

    </div>

    <!-- Add Bootstrap 5.3 JS (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
