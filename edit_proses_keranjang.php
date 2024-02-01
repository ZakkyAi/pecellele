<?php
// Include the database connection file
include 'koneksi.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve updated data from the form
    $id_produk = $_POST["id_produk"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $jumlah = $_POST["jumlah"];
    $harga = $_POST["harga"];

    // Update the entry in the "pesanan" table
    $updateSql = "UPDATE pesanan SET nama='$nama', Alamat='$alamat', Jumlah=$jumlah, harga=$harga WHERE id_produk = $id_produk";

    if ($conn->query($updateSql) === TRUE) {
        // Redirect to the data_pesanan page after successful update
        header("Location: keranjangpembeli.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid request";
}
?>
