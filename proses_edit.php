<?php
// koneksi database
require 'koneksi.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari tiap elemen dalam form
    $id_produk = $_POST["id"]; // Assuming the primary key column is named 'id'
    $id_kategori = $_POST["id_kategori"];
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    $deskripsi = $_POST["deskripsi"];

    // Check if a new image is uploaded
    if ($_FILES["gambar"]["size"] > 0) {
        $targetDir = "gambar/";
        $targetFile = $targetDir . basename($_FILES["gambar"]["name"]);
        $gambar = $_FILES["gambar"]["name"];

        move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile);

        // Update query with a new image
        $query = "UPDATE tbproduk SET id_kategori='$id_kategori', nama='$nama', harga='$harga', stok='$stok', deskripsi='$deskripsi', gambar='$gambar' WHERE id='$id_produk'";
    } else {
        // Update query without changing the image
        $query = "UPDATE tbproduk SET id_kategori='$id_kategori', nama='$nama', harga='$harga', stok='$stok', deskripsi='$deskripsi' WHERE id='$id_produk'";
    }

    // Execute the update query
    if (mysqli_query($conn, $query)) {
        echo "<script language='javascript'>
        alert('Data produk berhasil diupdate');
        document.location='dashboard.php';
        </script>";
    } else {
        echo "<script language='javascript'>
        alert('Data produk gagal diupdate');
        </script>";
        echo mysqli_error($conn);
    }
} else {
    // If the form is not submitted, you may want to fetch the existing data to populate the form for editing
    if (isset($_GET["id"])) {
        $id_produk = $_GET["id"];
        // Fetch data from the database based on the $id_produk
        $result = mysqli_query($conn, "SELECT * FROM tbproduk WHERE id='$id_produk'");
        $row = mysqli_fetch_assoc($result);

        // Populate the form fields with the fetched data
        $id_kategori = $row["id_kategori"];
        $nama = $row["nama"];
        $harga = $row["harga"];
        $stok = $row["stok"];
        $deskripsi = $row["deskripsi"];
    }
}
?>
