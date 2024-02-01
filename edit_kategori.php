<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: form_login.php");
    exit();
}

require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $categoryId = $_GET['id'];

    // Fetch category details from the database based on the ID
    $query = "SELECT * FROM tbkategori WHERE id = $categoryId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $category = mysqli_fetch_assoc($result);
    } else {
        // Handle the case where the category is not found
        echo "Category not found.";
        exit();
    }
} else {
    // Handle the case where the ID is not provided in the URL
    echo "Invalid request.";
    exit();
}

// Handle form submission for updating the category
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedCategoryName = $_POST['updated_category_name'];

    // Update the category in the database
    $updateQuery = "UPDATE tbkategori SET nama = '$updatedCategoryName' WHERE id = $categoryId";
    mysqli_query($conn, $updateQuery);

    // Redirect back to the kategori.php page after updating
    header("Location: kategori.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        /* Add your custom styling here */
        body {
            margin: 20px;
        }

        form {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f8f9fa;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1 class="w3-container w3-teal">Edit Kategori</h1>
    <form method="post">
        <div class="mb-3">
            <label for="updated_category_name" class="form-label">Nama Kategori:</label>
            <input type="text" id="updated_category_name" name="updated_category_name" value="<?php echo $category['nama']; ?>" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
