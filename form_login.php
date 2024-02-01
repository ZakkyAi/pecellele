<?php
include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .form-container {
            max-width: 400px; /* Set a maximum width for the form container */
            margin: auto; /* Center the form container */
        }

        .form-label {
        }

        .form-control {
            width: 100%; /* Make input fields fill the container width */
            margin-bottom: 10px; /* Add some space between input fields */
        }

        .login-btn{
            width: 100%; /* Make buttons fill the container width */
        }
        
        .register-btn {
            width: 340px;
            margin-bottom: px
        }

        .logout-btn  {
            width: 340px;
        }

        .mt-3 {
            margin-top: 10px; /* Adjust margin top for consistency */

        }
        .center-btn {
            display: flex;
            justify-content: center;
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
        <h2 class="text-center mb-4">Login </h2>
        <form action="proses_login.php" method="post">
            <label for="nama" class="form-label">Username:</label>
            <input type="text" name="nama" class="form-control" required>

            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" class="form-control" required>

            <!-- New input field for namauser -->
            <input type="submit" class="btn btn-success mt-3 login-btn" value="Login">
        </form>

        <?php
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo "<p class='text-center text-danger mt-3'>Login failed. Please check your username, password.</p>";
        }
        ?>
    </div>
    <div class="text-center mt-3 regis">
        <a href="register.php" class="btn btn-primary mt-3 register-btn">Register</a>
    </div>

    <div class="text-center mt-3 ">
        <a href="logout.php" class="btn btn-danger mt-3 logout-btn">Logout</a>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
