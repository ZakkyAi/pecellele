<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
    $id_kategori = $_GET['id'];

    // Query untuk menghapus kategori
    $query = "DELETE FROM tbkategori WHERE id = '$id_kategori'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect ke halaman kategori.php setelah berhasil dihapus
        header("Location: kategori.php");
        exit(); // Pastikan tidak ada output sebelum header
    } else {
        // Alert jika produk gagal dihapus
        echo "<script language='javascript'>
            alert('Produk gagal dihapus');
            window.location.href = 'kategori.php'; // Redirect after alert
        </script>";
        exit(); // Pastikan tidak ada output sebelum header
    }
}
?>
