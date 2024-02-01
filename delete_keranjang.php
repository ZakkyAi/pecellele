<?php
// Include the database connection file
include 'koneksi.php';

// Check if the ID parameter is set in the POST request
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare a DELETE statement with a prepared statement
    $stmt = $conn->prepare("DELETE FROM pesanan WHERE id_produk = ?");
    $stmt->bind_param("i", $id);

    // Execute the DELETE statement
    if ($stmt->execute()) {
        // Redirect to keranjang.php after successful deletion
        header("Location: keranjangpembeli.php");
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
    
    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request or missing ID parameter";
}
?>
