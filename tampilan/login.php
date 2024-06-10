<?php
session_start();

if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "produk_apple";

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Memeriksa apakah pengguna terdaftar dalam tabel user
    $checkUserQuery = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($checkUserQuery);
    $stmt->bind_param("ss", $uname, $pwd);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Pengguna ditemukan, set data sesi dan arahkan ke halaman akun.php
        $_SESSION['username'] = $uname;
        header("Location: akun.php");
        exit;
    } else {
        // Pengguna tidak ditemukan, tampilkan pesan kesalahan
        echo '<div class="alert alert-danger" role="alert">
                Invalid username or password. Please try again.
              </div>';
    }

    // Menutup koneksi database
    $stmt->close();
    $conn->close();
}
?>
<!-- <?php
if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "produk_apple";

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Memeriksa apakah pengguna terdaftar dalam tabel user
    $checkUserQuery = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($checkUserQuery);
    $stmt->bind_param("ss", $uname, $pwd);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Pengguna ditemukan, lakukan tindakan yang diperlukan (misalnya, alihkan ke halaman beranda)
        header("Location: akun.php");
        exit;
    } else {
        // Pengguna tidak ditemukan, tampilkan pesan kesalahan
        echo '<div class="alert alert-danger" role="alert">
                Invalid username or password. Please try again.
              </div>';
    }

    // Menutup koneksi database
    $stmt->close();
    $conn->close();
}
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Apple Product API</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
  <style>
    body {
      font-family: Helvetica;
      margin: 0;
      padding: 0;
      height: 100%;
      overflow: hidden;
    }

    .container-fluid {
      padding: 0;
      margin: 0;
    }

    .row {
      margin: 0;
    }

    .col {
      padding: 0;
    }

    .col-login {
      background-color: black;
      color: #fff;
      padding: 50px;
      min-height: 100vh;
      
    }

    .col-welcome {
      background-image: url("../image/ipong.jpg");
      background-size: cover;
      background-position: center;
      display: flex;
      align-items: center;
      justify-content: center;
      background-size: 94%;
    }

    .container-login {
      max-width: 450px;
      margin-bottom: 0px;
      margin-left: 80px;
      align-items: center;
    }

    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin: 20px;
    }

    .card-body {
      padding-bottom: 20px;
      margin-left: 20px;
      margin-right: 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 5px;
      color: black;
      font-weight: bold;
    }

    h5 {
      text-align: center;
      font-weight: bold;
      margin-bottom: 30px;
    }

    .form-group {
      margin-bottom: 20px;
      justify-content: center;
    }

    .form-group label {
      font-weight: bold;
      color: black;
    }

    .form-control {
      height: 20px;
      padding:20px
    }

    .btn-primary {
      width: 100%;
      height: 40px;
    }

    .text-center {
      text-align: center;
      color: black;
    }

    .mt-3 {
      margin-top: 30px;
    }

    .h4-welcome {
      font-family: Helvetica;
      text-align: center;
      font-size: 50px;
      color: white;
      padding-top: 20px;
      margin-bottom: 20px;
    }

    .image-welcome {
      max-width: 300px;
      margin: auto;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col col-login">
        <div class="container-login">
          <h4 class="h4-welcome">Welcome Back!</h4>
          <div class="card">
            <div class="card-body">
              <h2>Login</h2>
              <h5 style=color:black>Apple Product API</h5>
              <form action="login.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input name="uname" type="text" class="form-control" id="username" placeholder="Enter username" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input name="pwd" type="password" class="form-control" id="password" placeholder="Enter password" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
                <p class="text-center mt-3">Don't have an account? <a href="regis-token.php">Register here</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col col-welcome">
        <div class="container">
          <!-- <h4 class="h4-welcome">Welcome <br>Back!</h4> -->
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script>
</body>

</html>
