<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "produk_apple";

$conn = new mysqli($servername, $username, $password, $dbname);

$uname = $_SESSION['username'];

// Mengambil data user berdasarkan username
$getUserQuery = "SELECT * FROM user WHERE username = ?";
$stmt = $conn->prepare($getUserQuery);
$stmt->bind_param("s", $uname);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $token = $row['key_token'];
} else {
    // Jika user tidak ditemukan, lakukan tindakan yang sesuai
    // Misalnya, redirect ke halaman login atau menampilkan pesan error
    // Di sini, kita akan mengarahkan pengguna ke halaman login
    header("Location: login.php");
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account - Apple Product API</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Helvetica;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container-nav {
            margin: 0 auto;
            padding-top: 0px;
        }

        .alert-success {
            text-align: center;
            font-weight: bold;
            padding: 20px;
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
            border-radius: 4px;
        }

        /* .container-profile {
          
          margin: 0 auto;
          background-color: #fff;
          border-radius: 10px;
          padding: 30px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
          display: flex;
          align-items: center;
        } */

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            height: 40px;
        }

        .btn-primary {
            width: 100%;
            height: 40px;
        }
    </style>
</head>

<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar" style="background-color: #9a7ca3">
    <div class="container container-nav">
      <!-- <a class="navbar-brand" href="#">Logo</a> -->
      <img src="../image/logo.png" alt="Logo" width="30rem">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" style="color:white" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color:white" href="doc.php">Documentation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color:white" href="index.php#products">Products</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="color:white" href="akun.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Account
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Login</a></li>
              <li><a class="dropdown-item" href="#">Register</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br>
    <div class="container "> 
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color:#f4e6f5; color:#8e7791">
          <strong>Login Successful!</strong> Welcome, <?php echo $uname; ?>! <br>
          Please save your API key for future use.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="account fw-bold" style="color:#8e7791">
          <h1>
          <img src="../image/home.png" class="card-img-right" alt="Profile" width="40rem">
            <strong>Your Account</strong></h1>
        </div>
        
        <br>
        
        <div class="container-profile" style="text-align: center"> 
            <!-- <div class="list-group-item list-group-item-light"> -->
              <img src="../image/profile.png" class="card-img-center" alt="Profile" width="90rem"><br>
              <br><h2 style="color:#713b78"><strong><?php echo $uname; ?></strong></h2>
         
            <!-- <div class="list-group-item list-group-item-secondary" style="background-color: #f4e6f5"></div> -->
        </div><br>

        <div class="container">
        <ul class="list-group" style="text-align: center;">
          <li class="list-group-item list-group-item-dark" style="background-color: #c8b7c9;">Your API Key</li>
          <li class="list-group-item list-group-item-secondary" style="background-color: #f4e6f5"><?php echo $token; ?></li>
        </ul>
      </div><br><br><br>

      <div class="text-center">
  <a href="index.php" class="btn btn-outline-light" style="background-color: #8e7791; padding: 10px 20px;">
  <h5>Logout</h5></a>
</div>

    </div>
  </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
