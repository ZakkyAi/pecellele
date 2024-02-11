<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare a delete statement
    $sql = "DELETE FROM tbkomen WHERE id = ?";
    
    if($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $id);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()) {
            // Records deleted successfully. Redirect to landing page
            header("location: inbox.php");
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
    
    // Close statement
    $stmt->close();
    
    // Close connection
    $conn->close();
} else {
    // If the 'id' parameter is not set, redirect to the inbox page
    header("location: inbox.php");
    exit();
}
?>
