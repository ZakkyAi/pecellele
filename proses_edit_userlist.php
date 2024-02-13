<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['namauser']) && isset($_POST['level'])) {
        // Get form data
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['namauser']; // Corrected the field name here
        $level = $_POST['level'];

        // Include database connection file
        include 'koneksi.php';

        // Prepare and bind an update statement
        $sql = "UPDATE tbuser SET nama=?, email=?, namauser=?, level=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $name, $email, $username, $level, $id);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect back to userlist.php with success message
            header("location: userlist.php?success=1");
            exit();
        } else {
            // Redirect back to edit_userlist.php with error message
            header("location: edit_userlist.php?id=$id&error=1");
            exit();
        }

        // Close the prepared statement and database connection
        $stmt->close();
        $conn->close();
    } else {
        // Redirect back to edit_userlist.php with error message
        header("location: edit_userlist.php?error=2");
        exit();
    }
} else {
    // Redirect back to edit_userlist.php with error message
    header("location: edit_userlist.php?error=3");
    exit();
}
?>
