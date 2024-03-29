<?php
// Include the database connection file
include 'koneksi.php';

session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Fetch the user's data from the database
    $user_id = $_SESSION['user_id'];
    $user_query = "SELECT namauser FROM tbuser WHERE id = $user_id";
    $user_result = $conn->query($user_query);

    if ($user_result->num_rows > 0) {
        $user_row = $user_result->fetch_assoc();
        $namauser = htmlspecialchars($user_row['namauser']);
    } else {
        $namauser = "Guest"; // Default if user not found
    }
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: form_login.php");
    exit();
}

// Retrieve data from the "pesanan" table with a join to "tbproduk"
$sql = "SELECT pesanan.*, tbproduk.nama AS nama_makanan
        FROM pesanan
        INNER JOIN tbproduk ON pesanan.id_produk = tbproduk.id";
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
        <a class="navbar-brand" href="homepembeli.php"><img src="gambar/lele.png" alt="Your Logo" height="50px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto"> <!-- Use ms-auto to push the items to the right -->
                <li class="nav-item">
                    <a class="nav-link active" href="homepembeli.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="homepembeli.php#menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="homepembeli.php#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="keranjangpembeli.php">Keranjang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="statuspembeli.php">status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <li class="nav-item">
            <a class="nav-link active" href="#"><?php echo $namauser; ?></a>
                 </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container mt-5">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Nama makanan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                // Display data in the table
                $count = 1;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $count . "</td>";
                        echo "<td>" . $row["nama_makanan"] . "</td>"; // Display the food name from tbproduk
                        echo "<td>" . $row["Jumlah"] . "</td>";
                        echo "<td>" . $row["harga"] . "</td>";
                        echo "<td>
                                <a href='edit_keranjang.php?id=" . $row["id_produk"] . "' class='btn btn-secondary me-2'>Edit</a>
                                <a href='delete_keranjang.php?id=" . $row["id_produk"] . "' class='btn btn-danger' onclick=\"return confirm('Yakin ingin menghapus pesanan ini?')\">Delete</a>
                              </td>";
                        echo "</tr>";
                        $count++;
                    }
                } else {
                    echo "<tr><td colspan='6'>No data available</td></tr>";
                }
                ?>

            </tbody>
        </table>

        <a href="bayar.php" class="btn btn-success" my-3">bayar</a>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>
