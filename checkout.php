<?php
include 'koneksi.php';

$koneksi = mysqli_connect("localhost", "root", "", "pecellele");

if (!$koneksi) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

$id_produk_terpilih = isset($_GET['id_produk']) ? $_GET['id_produk'] : 1; // Default ID produk jika tidak ada yang dipilih
$query_produk_terpilih = "SELECT id, nama, harga FROM tbproduk WHERE id = $id_produk_terpilih";
$result_produk_terpilih = mysqli_query($koneksi, $query_produk_terpilih);

if (!$result_produk_terpilih) {
    echo "Error: " . $query_produk_terpilih . "<br>" . mysqli_error($koneksi);
}

// Ambil baris hasil query untuk produk terpilih
$row_produk_terpilih = mysqli_fetch_assoc($result_produk_terpilih);

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Form Checkout</h2>
                    </div>
                    <div class="card-body">
                        <form action="proses_checkout.php" method="post" onsubmit="return validateForm()">

                            <div class="form-group">
                                <label for="id_produk">ID Produk:</label>
                                <input type="text" class="form-control" name="id_produk" value="<?php echo isset($row_produk_terpilih['id']) ? $row_produk_terpilih['id'] : ''; ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="nama_produk">Nama menu:</label>
                                <input type="text" class="form-control" name="nama_produk" value="<?php echo isset($row_produk_terpilih['nama']) ? $row_produk_terpilih['nama'] : ''; ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga:</label>
                                <input type="text" name="harga" id="harga_produk" value="<?php echo isset($row_produk_terpilih['harga']) ? $row_produk_terpilih['harga'] : ''; ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah:</label>
                                <input type="number" class="form-control" name="jumlah" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Beli</button>
                                <a href="homepembeli.php" class="btn btn-success my-3">Kembali</a><br><br>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
