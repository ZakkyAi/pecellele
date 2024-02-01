<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if id_produk and status_pesanan are set and not empty
    if (isset($_POST['id_produk']) && isset($_POST['status_pesanan']) && !empty($_POST['id_produk'])) {
        $id_produk = $_POST['id_produk'];
        $status_pesanan = $_POST['status_pesanan'];

        for ($i = 0; $i < count($id_produk); $i++) {
            $id = $id_produk[$i];
            $status = $status_pesanan[$i];

            // Perform the update query
            $updateQuery = "UPDATE pesanan SET status='$status' WHERE id_produk=$id";
            $conn->query($updateQuery);
        }

        // Redirect back to the keranjangpenjual.php after updating
        header("Location: keranjangpenjual.php");
        exit();
    } else {
        echo "Error: Data not received correctly.";
    }
}

$conn->close();
?>
