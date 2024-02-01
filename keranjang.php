<?php
// Include the database connection file
include 'koneksi.php';

// Retrieve data from the "pesanan" table joined with "tbproduk"
$sql = "SELECT pesanan.id_produk, tbproduk.nama, pesanan.Alamat, pesanan.Jumlah, tbproduk.harga
        FROM pesanan
        JOIN tbproduk ON pesanan.id_produk = tbproduk.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>

<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
    <a href="home.php" class="w3-bar-item w3-button"><img src="gambar/lele.png " alt="" width="150px"></a>
    <h3 class="w3-bar-item">Selamat Datang</h3>
    <a href="dashboard.php" class="w3-bar-item w3-button">Produk</a>
    <a href="kategori.php" class="w3-bar-item w3-button">Kategori</a>
    <a href="tambah.php" class="w3-bar-item w3-button">Tambah Produk</a>
    <a href="inbox.php" class="w3-bar-item w3-button">Inbox</a>
    <a href="keranjang.php" class="w3-bar-item w3-button">Pesanan</a>
    <a href="logout.php" class="w3-bar-item w3-button">logout</a>
</div>
      
<!-- Page Content -->
<div style="margin-left:25%">
    <div class="w3-container w3-teal">
        <h1>Selamat Datang Penjual</h1>
    </div>
    <div class="container mt-5">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">ID Produk</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                // Display data in the table
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_produk"] . "</td>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["Alamat"] . "</td>";
                        echo "<td>" . $row["Jumlah"] . "</td>";
                        echo "<td>" . $row["harga"] . "</td>";
                        echo "<td>
                                <a href='edit_keranjang.php?id=" . $row["id_produk"] . "' class='btn btn-secondary me-2'>Edit</a>
                                <a href='delete_keranjang.php?id=" . $row["id_produk"] . "' class='btn btn-danger' onclick=\"return confirm('Yakin ingin menghapus pesanan ini?')\">Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No data available</td></tr>";
                }
                ?>

            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>
