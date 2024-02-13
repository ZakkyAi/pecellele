<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            font-family: Arial, sans-serif;
            margin-top: 20px;
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <?php
        // Check if user ID is provided
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            include 'koneksi.php'; // Include the database connection file
            
            // Prepare a SQL statement to fetch user data based on ID
            $sql = "SELECT * FROM tbuser WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                // Display form to edit user information
                ?>
                <form method="POST" action="proses_edit_userlist.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['nama']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['namauser']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <select class="form-control" id="level" name="level">
                            <option value="pembeli" <?php if($row['level'] == 'pembeli') echo 'selected'; ?>>Pembeli</option>
                            <option value="penjual" <?php if($row['level'] == 'penjual') echo 'selected'; ?>>Penjual</option>
                            <option value="admin" <?php if($row['level'] == 'admin') echo 'selected'; ?>>Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <?php
            } else {
                echo "<p>User not found.</p>";
            }
            $stmt->close(); // Close the prepared statement
            $conn->close(); // Close the database connection
        } else {
            echo "<p>No user ID provided.</p>";
        }
        ?>
    </div>
</body>
</html>
