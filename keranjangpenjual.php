<?php
// Include the database connection file
include 'koneksi.php';

// Retrieve data from the "pesanan" table with a join to "tbproduk"
$sql = "SELECT pesanan.*, tbproduk.id AS id_produk, tbproduk.nama AS nama_makanan
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
    

<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
        <a href="home.php" class="w3-bar-item w3-button"><img src="gambar/lele.png " alt="" width="150px"></a>
        <h3 class="w3-bar-item">Selamat Datang</h3>
        <a href="dashboard.php" class="w3-bar-item w3-button">Produk</a>
        <a href="kategori.php" class="w3-bar-item w3-button">Kategori</a>
        <a href="tambah.php" class="w3-bar-item w3-button">Tambah Produk</a>
        <a href="logout.php" class="w3-bar-item w3-button">logout</a>
    </div>

    <!-- Page Content -->
    <div style="margin-left:25%">
        <div class="w3-container w3-teal">
            <h1>Produk</h1>
        </div>

        <div class="container mt-5">
            <form action="update_status.php" method="post">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama makanan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Status Pesanan</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $count = 1;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $count . "</td>";
                                echo "<td>" . $row["nama_makanan"] . "</td>";
                                echo "<td>" . $row["Jumlah"] . "</td>";
                                echo "<td>" . $row["harga"] . "</td>";
                                echo "<td>
                                    <select name='status_pesanan[]'>";
                                    
                                    // Fetch possible values for status from enum column
                                    $enumValues = ["belum_dipesan", "belum_dibayar", "dikemas", "dikirim", "selesai" /* add other possible values */];
                                    foreach ($enumValues as $enumValue) {
                                        $selected = ($enumValue == $row["status"]) ? 'selected' : '';
                                        echo "<option value='$enumValue' $selected>$enumValue</option>";
                                    }

                                echo "</select>
                                </td>";
                                echo "<input type='hidden' name='id_produk[]' value='" . $row["id_produk"] . "'>";
                                echo "</tr>";
                                $count++;
                            }
                        } else {
                            echo "<tr><td colspan='6'>No data available</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Update Status</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>
