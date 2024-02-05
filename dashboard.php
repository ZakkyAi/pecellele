<?php
session_start();
include 'koneksi.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        <a href="inbox.php" class="w3-bar-item w3-button">Inbox</a>
        <a href="keranjangpenjual.php" class="w3-bar-item w3-button">Pesanan</a>
        <a href="log_bayar.php" class="w3-bar-item w3-button">log pesanan</a>
        <a href="pembayaran.php" class="w3-bar-item w3-button">pembayaran</a>
        <a href="logout.php" class="w3-bar-item w3-button">logout</a>
    </div>

    <!-- Page Content -->
    <div style="margin-left:25%">
        <div class="w3-container w3-teal">
            <h1>Produk</h1>
        </div>

        <div class="container mt-5">
            <?php
            // Include database connection
            require 'koneksi.php';

            // Number of products to display per page
            $productsPerPage = 10;

            // Current page number
            $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

            // Fetch products from the database with pagination
            $offset = ($currentPage - 1) * $productsPerPage;

            // Proses pencarian
            $keyword = '';
            if (isset($_GET['cari']) && !empty($_GET['keyword'])) {
                $keyword = $_GET['keyword'];
                $result = mysqli_query($conn, "SELECT tbproduk.*, tbkategori.nama AS kategori_nama 
                                                FROM tbproduk
                                                JOIN tbkategori ON tbproduk.id_kategori = tbkategori.id
                                                WHERE tbproduk.id_kategori LIKE '%$keyword%' OR
                                                tbproduk.nama LIKE '%$keyword%' OR
                                                tbproduk.deskripsi LIKE '%$keyword%'
                                                LIMIT $offset, $productsPerPage");
            } else {
                $result = mysqli_query($conn, "SELECT tbproduk.*, tbkategori.nama AS kategori_nama 
                                                FROM tbproduk
                                                JOIN tbkategori ON tbproduk.id_kategori = tbkategori.id
                                                LIMIT $offset, $productsPerPage");
            }

            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            ?>

            <div class="mb-4">
                <a href="tambah.php" class="btn btn-success mb-3">Tambah Produk</a>
                <a href="logout.php" class="btn btn-danger mb-3">Logout</a>

                <form action="dashboard.php" method="get" class="mb-3">
                    <input type="text" name="keyword" class="form-control" placeholder="Masukkan keyword pencarian" autocomplete="off">
                    <button type="submit" name="cari" class="btn btn-success mt-3">Cari</button>
                </form>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Aksi</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = ($currentPage - 1) * $productsPerPage + 1;
                            foreach ($products as $row) :
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i++; ?></th>
                                    <td>
                                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary me-2">Edit</a>
                                        <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">Delete</a>
                                    </td>
                                    <td>
                                        <img src="gambar/<?php echo $row["gambar"]; ?>" alt="gambar produk" class="img-thumbnail">
                                    </td>
                                    <td><?php echo $row["nama"]; ?></td>
                                    <td><?php echo $row["harga"]; ?></td>
                                    <td><?php echo $row["stok"]; ?></td>
                                    <td><?php echo $row["deskripsi"]; ?></td>
                                    <td><?php echo $row["kategori_nama"]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <?php
                // Count total products
                $totalProducts = mysqli_query($conn, "SELECT COUNT(*) as total FROM tbproduk");
                $totalProducts = mysqli_fetch_assoc($totalProducts)['total'];

                $productsPerPage = 10;

// Current page number
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Fetch products from the database with pagination
$offset = ($currentPage - 1) * $productsPerPage;


// Calculate total pages
$totalPages = ceil($totalProducts / $productsPerPage);
                ?>

                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                            <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>
