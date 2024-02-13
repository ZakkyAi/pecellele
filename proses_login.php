<?php
require 'koneksi.php';
session_start();

$nama = $_POST['nama'];
$password = $_POST['password'];

$query = "SELECT id, nama, email, password, level FROM tbuser WHERE nama = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $nama);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verify the password using password_verify
    if (password_verify($password, $user['password'])) {
        // Password verification successful
        $_SESSION['user_id'] = $user['id'];

        // Adjusting the session level based on your database structure
        if ($user['level'] == "admin") {
            $_SESSION['level'] = "admin";
            header("Location: homeadmin.php");
            exit();
        } elseif ($user['level'] == "penjual") {
            $_SESSION['level'] = "penjual";
            header("Location: home.php");
            exit();
        } elseif ($user['level'] == "pembeli") {
            $_SESSION['level'] = "pembeli";
            header("Location: homepembeli.php");
            exit();
        } else {
            // Handle unrecognized user level
            header("Location: form_login.php?error=1");
            exit();
        }
    } else {
        // Redirect if password verification fails
        header("Location: form_login.php?error=1");
        exit();
    }
}

// Redirect if user not found
header("Location: form_login.php?error=1");
exit();
?>
