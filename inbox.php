<?php
include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .btn {
            margin-right: 5px;
        }

        .table-container {
            max-width: 700px;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }

        /* Custom styling for the table */
        .table-container table {
            width: 100%;
        }

        .table th {
            background-color: #4B6A88;
            color: #f8f8ff;
        }

        .table-container table th,
        .table-container table td {
            padding: 12px;
        }
    </style>
</head>

<body>

    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
        <a href="home.php" class="w3-bar-item w3-button"><img src="gambar/lele.png " alt="" width="150px"></a>
        <h3 class="w3-bar-item">Selamat Datang</h3>
        <a href="dashboard.php" class="w3-bar-item w3-button">Produk</a>
        <a href="kategori.php" class="w3-bar-item w3-button">Kategori</a>
        <a href="tambah.php" class="w3-bar-item w3-button">Tambah Produk</a>
        <a href="inbox.php" class="w3-bar-item w3-button">Inbox</a>
        <a href="keranjang.php" class="w3-bar-item w3-button">Pesanan</a>
        <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
    </div>

    <!-- Page Content -->
    <div style="margin-left:25%">

        <div class="w3-container w3-teal">
            <h1>Inbox</h1>
        </div>

        <div class="container mt-5 table-container">
            <table class="table table-bordered">
                <thead class="table">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>WhatsApp</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // Include database connection file
                    include('koneksi.php');

                    // Fetch data from tbkomen
                    $sql = "SELECT * FROM tbkomen";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['nama'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['wa'] . "</td>";
                            echo "<td>" . $row['komen'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No data found</td></tr>";
                    }

                    // Close connection
                    $conn->close();
                    ?>

                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
