<?php
session_start();

include 'koneksi.php';

// Check if 'level' key is set in the session
if (isset($_SESSION['level'])) {
    $level = $_SESSION['level'];

    if ($level == 'penjual') {
        // Jika sudah diarahkan ke home.php, biarkan pengguna di sana
        if (basename($_SERVER['PHP_SELF']) !== 'home.php') {
            header('Location: home.php');
            exit;
        }
    } elseif ($level == 'admin') {
        // Jika sudah diarahkan ke homeadmin.php, biarkan pengguna di sana
        if (basename($_SERVER['PHP_SELF']) !== 'homeadmin.php') {
            header('Location: homeadmin.php');
            exit;
        }
    } elseif ($level == 'pembeli') {
        // Jika sudah diarahkan ke homepembeli.php, biarkan pengguna di sana
        if (basename($_SERVER['PHP_SELF']) !== 'homepembeli.php') {
            header('Location: homepembeli.php');
            exit;
        }
    }
} else {
    // Redirect to a login page or handle the case where 'level' is not set
    header('Location: form_login.php');
    exit;
}
?>
