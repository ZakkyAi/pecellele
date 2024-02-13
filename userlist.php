<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            font-family: Arial, sans-serif;
            margin-top: 20px;
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
        #content {
            margin-left: 250px;
            padding: 20px;
        }
        table {
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #343a40;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<div id="sidebar">
    <ul class="list-unstyled">
        <li><a href="homeadmin.php"><img src="gambar/lele.png" alt="" width="150px"></a></li>
        <li><a href="homeadmin.php">Home</a></li>
        <li><a href="userlist.php">Userlist</a></li>
        <li><a href="logout.php">log out</a></li>
    </ul>
</div>

<div id="content">
    <div class="container">
        <h1>User List</h1>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>NamaUser</th>
                    <th>Level</th>
                    <th>Action</th> <!-- Added column for action buttons -->
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php'; // Include the database connection file

                // Fetch data from tbuser
                $sql = "SELECT * FROM tbuser";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>".$row["id"]."</td>
                                <td>".$row["nama"]."</td>
                                <td>".$row["email"]."</td>
                                <td>".$row["namauser"]."</td>
                                <td>".$row["level"]."</td>
                                <td>
                                    <a href='edit_userlist.php?id=".$row["id"]."' class='btn btn-primary'>Edit</a>
                                    <a href='delete_userlist.php?id=".$row["id"]."' class='btn btn-danger'>Delete</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No users found</td></tr>";
                }
                $conn->close(); // Close the database connection
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
