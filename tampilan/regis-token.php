
<?php
if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

    // koneksi db
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "produk_apple";

    // membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // memeriksa apakah pengguna sudah terdaftar sebelumnya
    $checkUserQuery = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($checkUserQuery);
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result();
    $token = md5($uname . $pwd);

    if ($result->num_rows > 0) {
        $registrationFail = '<div class="alert alert-success" role="alert">
                                    Username already exists. Please choose a different username.
                                </div>';
    } else {
        // menambahkan pengguna baru ke database
        $sql = "INSERT INTO user (username, password, key_token) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $uname, $pwd, $token);
        $stmt->execute();

        $registrationSuccess = '<div class="alert alert-success" role="alert">
                                    Registration successful! Login to explore the Apple Product Documentation.
                                </div>
                                <a href="login.php" class="btn btn-primary">Login Here</a>';

        // menutup koneksi database
        $stmt->close();
        $conn->close();
    }
}
?>

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
      background-size: 95%;
    }

    .container-login{
      max-width: 450px;
      margin-top: 30px;
      margin-left: 80px;
    }

    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card-body {
      padding: 50px;
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
      color: black;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: bold;
      color: black;
    }

    .form-control {
      height: 40px;
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
            <div class="col col-welcome">
                <div class="container">
                    <!-- <h4 class="h4-welcome">Welcome!</h4> -->
                    <!-- <div class="image-welcome">
                        <img src="../image/apple_logo.png" alt="Apple Logo" width="100%">
                    </div> -->
                </div>
            </div>
            <div class="col col-login">
                <div class="container-login">
                    <div class="card">
                        <div class="card-body">
                            <h2>Registration</h2>
                            <h5>Apple Product API</h5>
                            <?php
                            if (isset($registrationSuccess)) {
                                echo $registrationSuccess;
                            } else {
                            ?>
                            <?php
                              if (isset($registrationFail)) {
                                echo $registrationFail;
                              }
                                ?>
                                <form action="regis-token.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input name="uname" type="text" class="form-control" id="username"
                                            placeholder="Enter username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input name="pwd" type="password" class="form-control" id="password"
                                            placeholder="Enter password" required>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
                                    <p class="text-center mt-3">Already have an account? <a href="login.php">Login
                                            here</a></p>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script>
</body>
</html>
