<?php
// Include the database connection file
include 'koneksi.php';

// Retrieve data from the "pesanan" table
$sql = "SELECT * FROM pesanan";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Replace "Family Feast" with your logo -->
        <a class="navbar-brand" href="#"><img src="gambar/lele.png" alt="Your Logo" height="50px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="homepembeli.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="homepembeli.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="homepembeli.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="keranjang.php">Keranjang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container mt-5">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">ID Produk</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                // Display data in the table
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_produk"] . "</td>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["Alamat"] . "</td>";
                        echo "<td>" . $row["Jumlah"] . "</td>";
                        echo "<td>" . $row["harga"] . "</td>";
                        echo "<td>
                                <a href='delete_keranjang.php?id=" . $row["id_produk"] . "' class='btn btn-danger' onclick=\"return confirm('Yakin ingin menghapus pesanan ini?')\">Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No data available</td></tr>";
                }
                ?>

            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>
