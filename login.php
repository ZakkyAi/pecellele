<?php
// login.php

// Start the session
session_start();

include 'koneksi.php';


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $nama = $_POST['nama'];
    $password = $_POST['password'];

    // Validate the form data (you may need more validation)
    if (empty($nama) || empty($password)) {
        $error = "Username and password are required!";
    } else {
        // Database connection parameters
        $servername = "localhost"; // Assuming the MySQL server is on the same machine
        $username = "root"; // Assuming the default MySQL username
        $password_db = ""; // Assuming no password for the default MySQL setup
        $dbname = "pecellele"; // Your database name

        // Create a connection
        $conn = new mysqli($servername, $username, $password_db, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the query
        $stmt = $conn->prepare("SELECT id, nama, password, level FROM tbuser WHERE nama = ?");
        $stmt->bind_param("s", $nama);
        $stmt->execute();
        $stmt->store_result();

        // Check if the user exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($userId, $userName, $hashedPassword, $userLevel);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $hashedPassword)) {
                // Authentication successful
                $_SESSION['user_id'] = $userId;
                $_SESSION['user_level'] = $userLevel;
                header('Location: dashboard.php'); // Redirect to the dashboard or home page
                exit();
            } else {
                // Authentication failed
                $error = "Invalid password!";
            }
        } else {
            // Authentication failed
            $error = "User not found!";
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="login.php">
        <label>Username:</label>
        <input type="text" name="nama" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
