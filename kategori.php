<?php
session_start();

include 'koneksi.php';



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/fdfc5fd2ca.js" crossorigin="anonymous"></script>
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

        .category-icon {
            margin-right: 10px;
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
        <a href="keranjangpenjual.php" class="w3-bar-item w3-button">Pesanan</a>
        <a href="log_bayar.php" class="w3-bar-item w3-button">log pesanan</a>
        <a href="pembayaran.php" class="w3-bar-item w3-button">pembayaran</a>
        <a href="logout.php" class="w3-bar-item w3-button">logout</a>

      </div>
      
      <!-- Page Content -->
      <div style="margin-left:25%">
      
      <div class="w3-container w3-teal">
        <h1>Kategori</h1>
</div>
        <div class="container mt-5">
        <?php
        require 'koneksi.php';

        $result_categories = mysqli_query($conn, "SELECT * FROM tbkategori");
        $categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newCategoryName = $_POST['new_category_name'];

            $insertQuery = "INSERT INTO tbkategori (nama) VALUES ('$newCategoryName')";
            mysqli_query($conn, $insertQuery);

            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
        ?>

        <div class="mb-4">
            <div class="table-container">
                <div class="table-buttons">
                    <a href="tambah_kategori.php" class="btn btn-success mb-3">Tambah</a>
                    <a href="dashboard.php" class="btn btn-danger mb-3">Kembali</a>
                </div>

                <!-- Display Categories in a Table -->
                <table class="table table-bordered">
                    <thead class="table">
                        <tr>
                            <th class="text-center w3-container w3-teal" style="width: 50px;">No</th>
                            <th class="w3-container w3-teal" >Nama Kategori</th>
                            <th class="w3-container w3-teal"></th>
                            

                        </tr>
                    </thead>
                    <tbody>
    <?php
    require 'koneksi.php';

    // Ambil data kategori dari database
    $query_kategori = "SELECT * FROM tbkategori";
    $result_kategori = mysqli_query($conn, $query_kategori);

    $count = 1; // Variable to keep track of the category number

    while ($kategori = mysqli_fetch_assoc($result_kategori)) :
    ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $kategori['nama']; ?></td>
            <td>
                <a href="proses_hapus_kategori.php?id=<?php echo $kategori['id']; ?>" onclick="return confirm('Yakin ingin menghapus kategori ini?')" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php
        $count++; // Increment the category number
    endwhile;
    ?>
</tbody>

                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
