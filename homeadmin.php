<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Sidebar Example</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom styles */
    body {
      font-family: Arial, sans-serif;
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
    }
    #sidebar h3,
    #sidebar ul {
      color: #fff; /* White */
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
  </style>
</head>
<body>

<div id="sidebar">
  <ul class="list-unstyled">
    <li><a href="homeadmin.php"><img src="gambar/lele.png" alt="" width="150px"></a></li>
    <li><a href="homeadmin.php">Home</a></li>
    <li><a href="userlist.php">Userlist</a></li>
    <li><a href="logout.php">Log out</a></li>

  </ul>
</div>

<div id="content">
  <h1>Welcome Admin</h1>
  <p></p>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
