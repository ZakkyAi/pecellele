<?php

include 'koneksi.php';


$koneksi = mysqli_connect("localhost", "root", "", "pecellele");

if (!$koneksi) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari formulir checkout
    $nama_mobil = isset($_POST['nama_mobil']) ? $_POST['nama_mobil'] : "";
    $id_produk = isset($_POST['id_produk']) ? $_POST['id_produk'] : "";  
    $jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : "";
    $nama_pembeli = isset($_POST['nama_pembeli']) ? $_POST['nama_pembeli'] : "";
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : "";
    $harga = isset($_POST['harga']) ? $_POST['harga'] : "";
    $metode_pembayaran = isset($_POST['metode_pembayaran']) ? $_POST['metode_pembayaran'] : "";

    // Gunakan prepared statement
    $query_insert_pesanan = "INSERT INTO pesanan (id_produk, nama, Alamat, Jumlah, harga) VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($koneksi, $query_insert_pesanan);

    // Bind parameter
    mysqli_stmt_bind_param($stmt, "isssi", $id_produk, $nama_pembeli, $alamat, $jumlah, $harga);

    // Execute statement
    $result_insert_pesanan = mysqli_stmt_execute($stmt);
    
    

    if (!$result_insert_pesanan) {
        echo "Error: " . $query_insert_pesanan . "<br>" . mysqli_error($koneksi);
    }

    mysqli_stmt_close($stmt);

    if ($result_insert_pesanan) {
        // Redirect ke halaman produk.php atau halaman lain yang sesuai
        header("Location: homepembeli.php");
        exit();
    }
}

mysqli_close($koneksi);
?>
