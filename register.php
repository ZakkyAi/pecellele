<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $namauser = $_POST["namauser"];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Hash the password using password_hash
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO tbuser (nama, email, password, level, namauser) VALUES (?, ?, ?, 'pembeli', ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nama, $email, $hashed_password, $namauser);

    if ($stmt->execute()) {
        // Registration successful
        echo "<script>alert('Registration successful!');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Add your custom styles here */
        .form-container {
            max-width: 400px;
            margin: auto;
        }

        .form-label {
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            margin-bottom: 10px;
        }

        .register-btn {
            width: 100%;
        }

        .login-btn {

            width: 340px;
        }

        .mt-3 {
            margin-top: 10px;
        }

        .center-btn {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .frame {
            max-width: 400px;
        margin: auto;
        border: 3px solid #ddd; /* Add a 1px solid border with a light gray color */
        padding: 15px; /* Add some padding for a cleaner look */
        border-radius: 5px; /* Add rounded corners for a softer appearance */
        
        }
    </style>
</head>

<body>
    <div class="frame">
    <div class="container mt-5 form-container">
        <h2 class="text-center mb-4">User Registration</h2>
        <form action="register.php" method="post">
            <label for="nama" class="form-label">Username:</label>
            <input type="text" name="nama" class="form-control" required>

            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required>

            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" class="form-control" required>

            <!-- New input for namauser -->
            <label for="namauser" class="form-label">Nama User:</label>
            <input type="text" name="namauser" class="form-control" required>

            <input type="submit" class="btn btn-primary mt-3 register-btn" value="Register">
        </form>
    </div>

    <div class="center-btn">
        <a href="form_login.php" class="btn btn-success mt-3 login-btn">Login</a>
    </div>

    </div>
    <!-- Include your scripts and Bootstrap JS here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
