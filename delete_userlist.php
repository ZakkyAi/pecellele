<?php
// Include the database connection file
include 'koneksi.php';

// Check if ID parameter exists
if (isset($_GET['id'])) {
    // Prepare a delete statement
    $sql = "DELETE FROM tbuser WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $param_id);

        // Set parameters
        $param_id = $_GET['id'];

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to userlist.php
            header("location: userlist.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }
}

// Close connection
$conn->close();
?>
