<?php
include 'koneksi.php';

// Retrieve data from the "pesanan" table with a join to "tbproduk"
$sql = "SELECT pesanan.*, tbproduk.nama AS nama_makanan, tbproduk.harga
        FROM pesanan
        INNER JOIN tbproduk ON pesanan.id_produk = tbproduk.id";
$result = $conn->query($sql);

// Calculate total amount
$totalAmount = 0;

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Replace "Family Feast" with your logo -->
        <a class="navbar-brand" href="#"><img src="gambar/lele.png" alt="Your Logo" height="50px"></a>
        <!-- ... (your navigation menu) ... -->
    </div>
</nav>

<div class="container mt-5">
    <h2>Form Pembayaran</h2>
    <!-- Add the enctype attribute for image upload -->
    <form action="process_bayar.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama_pembayar" class="form-label">Nama Pembayar</label>
            <input type="text" class="form-control" id="nama_pembayar" name="nama_pembayar" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="ygdipesan" class="form-label">Pesanan</label>
            <input type="hidden" name="ygdipesan" value="">
            <ul>
                <?php
                $ygdipesanArray = array();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $productDetails = $row["nama_makanan"] . " - " . $row["Jumlah"] . " item(s)";
                        $ygdipesanArray[] = $productDetails;
                        $totalAmount += $row["harga"] * $row["Jumlah"]; // Calculate total amount
                        echo "<li>" . $productDetails . "</li>";
                    }
                } else {
                    echo "<li>No pesanan available</li>";
                }
                ?>
            </ul>
            <input type="hidden" name="ygdipesan" value="<?php echo implode(', ', $ygdipesanArray); ?>">
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="text" class="form-control" id="total" name="total" value="<?php echo $totalAmount; ?>" readonly>
        </div>
        <div class="mb-3">bayar jumlah sesuai. dengan qris</div>

        <img src="gambar/qr.jpg" alt="Description of the image">


        <div class="mb-3">
            <label for="gambar" class="form-label">Upload Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
        </div>

        <div class="mb-3">Untuk pembayaran hanya menerima transfer dana dan gopay 0895604344221</div>
        <div class="mb-3">dan mohon setelah pembayaran konfirmasi ke no wa 0895604344221</div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
