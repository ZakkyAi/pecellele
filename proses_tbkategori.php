<?php
// Include database connection
require 'koneksi.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize the input
    $newCategoryName = mysqli_real_escape_string($conn, $_POST['new_category_name']); // Adjust based on your form field name

    // Perform additional validation if needed

    // Perform the SQL query to insert a new category
    $insertQuery = "INSERT INTO tbkategori (nama) VALUES ('$newCategoryName')";
    
    if (mysqli_query($conn, $insertQuery)) {
        // If the insertion is successful, redirect back to the category page
        header("Location: kategori.php");
        exit();
    } else {
        // If an error occurs, display an error message
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // If the form is not submitted, redirect to the form page
    header("Location: tambah_kategori.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
