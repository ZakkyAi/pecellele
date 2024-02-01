<?php
// koneksi database
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari tiap elemen dalam form
    $id_kategori = $_POST["id_kategori"];
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    $deskripsi = $_POST["deskripsi"];

    // Handle file upload
    $targetDir = "gambar/";
    $targetFile = $targetDir . basename($_FILES["gambar"]["name"]);
    $gambar = $_FILES["gambar"]["name"];

    // query insert data
    $query = "INSERT INTO tbproduk (id_kategori, nama, harga, stok, deskripsi, gambar) VALUES ('$id_kategori', '$nama', '$harga', '$stok', '$deskripsi', '$gambar')";

    if (mysqli_query($conn, $query)) {
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile);
        echo "<script language='javascript'>
        alert ('Data produk berhasil ditambahkan');
        document.location='dashboard.php';
        </script>";
    } else {
        echo "<script language='javascript'>
        alert ('Data produk gagal ditambahkan');
        </script>";
        echo mysqli_error($conn);
    }
}
?>
