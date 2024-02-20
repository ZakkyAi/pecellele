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
        body {
            font-family: Arial, sans-serif;
        }
        #sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
            padding: 20px;
            background-color: #343a40; /* Dark gray */
            border-right: 1px solid #212529; /* Darker gray */
            color: #fff; /* White */
        }
        #sidebar h3,
        #sidebar ul {
            color: #fff; /* White */
            list-style: none;
            padding: 0;
        }
        #sidebar ul li a {
            color: #fff; /* White */
            text-decoration: none;
        }
        #sidebar ul li a:hover {
            color: #ffc107; /* Yellow */
        }
    </style>
</head>
<body>

<div id="sidebar">
    <ul class="list-unstyled" style="font-size: 20px;">
        <li><a href="homeadmin.php"><img src="gambar/lele.png" alt="" width="150px"></a></li>
        <li><a href="homeadmin.php">Home</a></li>
        <li><a href="userlist.php">Userlist</a></li>
        <li><a href="tambah_userlist.php">Tambah User</a></li>
        <li><a href="logout.php">Log out</a></li>
    </ul>
</div>


<div class="container">
    <div style="margin: 0 0 40px 25%;">
        <h1>Add New User</h1>
    </div>
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
