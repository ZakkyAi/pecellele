<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['nama_pembayar']) && 
        isset($_POST['alamat']) && 
        isset($_POST['ygdipesan']) && 
        isset($_POST['total']) && 
        isset($_FILES['gambar'])  // Check if the file input is set
    ) {
        $nama_pembayar = $_POST['nama_pembayar'];
        $alamat = $_POST['alamat'];
        $ygdipesan = $_POST['ygdipesan'];
        $totalAmount = $_POST['total'];

        // Process image upload
        $gambarFileName = $_FILES['gambar']['name'];
        $gambarTmpName = $_FILES['gambar']['tmp_name'];
        $gambarUploadPath = 'path/to/upload/directory/' . $gambarFileName;  // Change this path accordingly

        move_uploaded_file($gambarTmpName, $gambarUploadPath);

        // Insert data into the bayar table
        $insertQuery = "INSERT INTO bayar (nama_pembayar, alamat, ygdipesan, jumlah_bayar, gambar) 
                        VALUES ('$nama_pembayar', '$alamat', '$ygdipesan', '$totalAmount', '$gambarFileName')";
        $conn->query($insertQuery);

        header("Location: keranjangpembeli.php");
        exit();
    } else {
        echo "Error: Data not received correctly.";
    }
}

$conn->close();
?>
