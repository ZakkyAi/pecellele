<?php
include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <!-- Bootstrap 5.3 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Custom CSS for moving the image down and adjusting its size */
        .mb-3 img {
            margin-top: 10px; /* Adjust the margin as needed */
            max-width: 200px; /* Adjust the max-width for the smaller image */
            height: auto; /* Maintain aspect ratio */
            display: block; /* Ensure the image is centered */
            margin-bottom: 10px; /* Add some space below the image */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Produk</h2>
        <a href="dashboard.php" class="btn btn-success mb-3">Kembali</a>
        <form action="proses_edit.php" method="post" enctype="multipart/form-data">
            <?php
            require 'koneksi.php';
            $id = $_GET['id'];
            $data = mysqli_query($conn, "select * from tbproduk where id='$id'");
            while ($d = mysqli_fetch_assoc($data)) {
                ?>
                <div class="mb-3">
                <select class="form-select" name="id_kategori" id="id_kategori" required>
        <?php
                        require 'koneksi.php';

                        // Query untuk mengambil data kategori dari database
                        $query_kategori = "SELECT * FROM tbkategori";
                        $result_kategori = mysqli_query($conn, $query_kategori);

                        // Loop untuk menampilkan opsi kategori
                        while ($kategori = mysqli_fetch_assoc($result_kategori)) {
                            echo "<option value='" . $kategori['id'] . "'>" . $kategori['nama'] . "</option>";
                        }
                        ?>
             </select>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" value="<?php echo $d['nama']; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" name="harga" id="harga" value="<?php echo $d['harga']; ?>" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="text" name="stok" id="stok" value="<?php echo $d['stok']; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <!-- Show existing image and allow uploading a new one if needed -->
                    <input type="file" name="gambar" id="gambar" class="form-control mb-2">
                    <img src="gambar/<?php echo $d['gambar']; ?>" alt="existing image" class="img-thumbnail">
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" required class="form-control"><?php echo $d['deskripsi']; ?></textarea>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" name="submit" class="btn btn-success">Edit Data</button>
        </form>
        <?php
        }
        ?>
    </div>
    <!-- Bootstrap 5.3 JS CDN, place it at the end of your document -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
