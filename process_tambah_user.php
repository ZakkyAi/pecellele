<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include 'koneksi.php';

    // Escape user inputs for security
    $nama = $conn->real_escape_string($_POST['nama']);
    $email = $conn->real_escape_string($_POST['email']);
    $namauser = $conn->real_escape_string($_POST['namauser']);
    $password = $conn->real_escape_string($_POST['password']);
    $level = $conn->real_escape_string($_POST['level']);

    // Encrypt the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into tbuser table
    $sql = "INSERT INTO tbuser (nama, email, namauser, password, level) VALUES ('$nama', '$email', '$namauser', '$hashed_password', '$level')";
    if ($conn->query($sql) === TRUE) {
        // If the user is successfully added, redirect to the userlist.php page
        header("Location: userlist.php");
        exit();
    } else {
        // If there is an error, display an error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted, redirect to the tambah_userlist.php page
    header("Location: tambah_userlist.php");
    exit();
}
?>
