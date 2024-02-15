<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            font-family: Arial, sans-serif;
            margin-top: 20px;
        }
        form {
            width: 50%;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Add New User</h1>
    <form action="process_tambah_user.php" method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label">Name:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="namauser" class="form-label">Username:</label>
            <input type="text" class="form-control" id="namauser" name="namauser" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Level:</label>
            <select class="form-select" id="level" name="level" required>
                <option value="pembeli">Pembeli</option>
                <option value="penjual">Penjual</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
