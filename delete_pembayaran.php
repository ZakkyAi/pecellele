<?php
// Check if the ID parameter is provided
if (isset($_GET['id'])) {
    // Include the database connection file
    include 'koneksi.php';

    // Escape user inputs for security to prevent SQL injection
    $id_pembayar = $conn->real_escape_string($_GET['id']);

    // SQL query to delete a payment record based on the provided ID
    $sql = "DELETE FROM bayar WHERE id_pembayar = '$id_pembayar'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the previous page after deletion
        header("Location: pembayaran.php");
        exit();
    } else {
        // If deletion fails, display an error message
        echo "Error deleting record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If ID parameter is not provided, display an error message
    echo "ID parameter is not provided.";
}
?>
