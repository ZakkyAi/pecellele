<?php
// Include the database connection file
include 'koneksi.php';

// Check if the ID parameter is set in the URL
if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];

    // Retrieve data for the specified ID from the "pesanan" table
    $sql = "SELECT p.id, p.nama AS nama_produk, p.harga AS harga_produk, pe.* FROM pesanan pe
            JOIN tbproduk p ON pe.id_produk = p.id
            WHERE pe.id_produk = $id_produk";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>

<div class="container mt-5">
    <form action="edit_proses_keranjang.php" method="post">
        <input type="hidden" name="id_produk" value="<?php echo $row['id_produk']; ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama_produk']; ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?php echo $row['Jumlah']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $row['harga_produk']; ?>" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Update Pesanan</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
    } else {
        echo "Record not found";
    }

    // Close the database connection
    $conn->close();
} else {
    echo "ID not provided in the URL";
}
?>
