<?php
require 'koneksi.php';

// Start the session
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
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pecel Lele Restaurant</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .card-details {
        display: none;
        padding: 15px;
        background-color: #f8f9fa;
    }
    .card {
        transition: box-shadow 0.3s ease-in-out;
    }

    .card:hover {
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    }

    .card-img-container {
        overflow: hidden;
        position: relative;
    }

    .card-img-container img {
        transition: transform 0.3s ease-in-out;
    }

    .card:hover .card-img-container img {
        transform: scale(1.1);
    }
    .card-img-container {
        overflow: hidden;
        position: relative;
    }

    .card-img-container img {
        transition: transform 0.3s ease-in-out;
    }

    .card-img-container:hover img {
        transform: scale(1.1);
    }
    .card-img-container {
    max-height: 200px; /* Adjust the value as needed */
    overflow: hidden;
}

.card-img-container img {
    width: 100%;
    height: auto;
}
.card {
    margin-bottom: 20px; /* Adjust the value as needed */
}
.col-md-4 {
    margin-bottom: 20px; /* Adjust the value as needed */
}

</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Replace "Family Feast" with your logo -->
        <a class="navbar-brand" href="#"><img src="gambar/lele.png" alt="Your Logo" height="50px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto"> <!-- Use ms-auto to push the items to the right -->
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
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


<!-- Carousel/Slideshow -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="gambar/bg.jpg" class="d-block w-100" alt="Slide 1">
        </div>
    </div>
</div>


<!-- Hero Section -->
<div class="container-fluid p-5 text-center bg-light">
    <h1>Welcome to Pecel Lele Restaurant</h1>
    <p>Nikmati Makan Pecel Lele tanpa Khawatir Di katain Kampungan</p>
</div>

<!-- Menu Section -->
<section id="menu" class="container mt-5">
    <h2>Our Menu</h2>

    <div class="row">
        <?php
        $sql = "SELECT * FROM tbproduk";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-img-container">
                            <img src="gambar/<?php echo htmlspecialchars($row['gambar']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['nama']); ?>">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['nama']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($row['deskripsi']); ?></p>
                            <p class="card-text"><?php echo htmlspecialchars($row['harga']); ?> Rupiah.</p>
                            <a href="checkout.php?id_produk=<?php echo $row['id']; ?>" class="btn btn-primary btn-lg">Order Now</a>
                        </div>
                        <div class="card-details">
                            <p>Stok: <?php echo htmlspecialchars($row['stok']); ?></p> <!-- Display the stock value -->
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>No menu items available.</p>";
        }
        ?>
    </div>
</section>


    <!-- Close the database connection -->
    <?php $conn->close(); ?>

<!-- Contact Section -->
<section id="contact" class="container mt-5">
    <h2>Contact Us</h2>
    <p>Untuk Membuat kerja sama atau membuat pesanan untuk acara dapat meng-email dan kami akan segera menghubungi anda</p>

    <!-- Contact Form -->
<form action="proses_komen.php" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Your Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Your Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="whatsapp" class="form-label">Your Whatsapp Number</label> <!-- Corrected id to "whatsapp" -->
        <input type="text" class="form-control" id="whatsapp" name="whatsapp" required> <!-- Corrected id to "whatsapp" -->
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Your Message</label>
        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</section>


<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get all the cards
        var cards = document.querySelectorAll('.card');

        // Add click event listener to each card
        cards.forEach(function (card) {
            card.addEventListener('click', function () {
                // Toggle the display of details for the clicked card
                var details = this.querySelector('.card-details');
                details.style.display = (details.style.display === 'none' || details.style.display === '') ? 'block' : 'none';
            });
        });
    });
</script>
</body>
</html>
