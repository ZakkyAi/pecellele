<?php
require 'koneksi.php';

session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    // If not, redirect to login page
    header("Location: form_login.php");
    exit();
}

// Fetch user data including the name from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT namauser FROM tbuser WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $namauser = $user['namauser'];
} else {
    // Handle the case when user data is not found
    $namauser = "User";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>DashBoard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .mySlides {display:none;}
    </style>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body>

    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
        <a href="home.php" class="w3-bar-item w3-button"><img src="gambar/lele.png" alt="" width="150px"></a>
        <h3 class="w3-bar-item">Selamat Datang, <?php echo $namauser; ?></h3>
        <a href="dashboard.php" class="w3-bar-item w3-button">Produk</a>
        <a href="kategori.php" class="w3-bar-item w3-button">Kategori</a>
        <a href="tambah.php" class="w3-bar-item w3-button">Tambah Produk</a>
        <a href="inbox.php" class="w3-bar-item w3-button">Inbox</a>
        <a href="keranjangpenjual.php" class="w3-bar-item w3-button">Pesanan</a>
        <a href="log_bayar.php" class="w3-bar-item w3-button">log pesanan</a>
        <a href="pembayaran.php" class="w3-bar-item w3-button">pembayaran</a>
        
        <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
    </div>

    <!-- Page Content -->
    <div style="margin-left:25%">

        <div class="w3-container w3-teal">
            <h1>Selamat Datang, <?php echo $namauser; ?></h1>
        </div>

    </div>

</body>

</html>
