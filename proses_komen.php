<?php
// Include your connection script
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $wa = $_POST["whatsapp"]; // Add a semicolon here
    $message = $_POST["message"];

    // Perform any necessary validation or processing here
    // For example, you might validate the email format, save the data to a database, etc.

    // Assume you have a table named tbkomen
    $sql = "INSERT INTO tbkomen (nama, email, wa, komen) VALUES ('$name', '$email', '$wa', '$message')"; // Fix the typo here
    
    if ($conn->query($sql) === TRUE) {
        // Successful insertion
        echo "<script language='javascript'>
              alert('Pesan mu telah terkirim');
              document.location='homepembeli.php';
              </script>";
    } else {
        // Error during insertion
        echo "<script language='javascript'>
              alert('Pesan mu tidak terkirim');
              </script>";
        echo mysqli_error($conn);
    }
} else {
    // If the form wasn't submitted through POST, handle accordingly (optional)
    echo "<script language='javascript'>
          alert('This page is not meant to be accessed directly');
          document.location='dashboard.php'; // Redirect to the dashboard or any appropriate page
          </script>";
}

// Close the connection
$conn->close();
?>
