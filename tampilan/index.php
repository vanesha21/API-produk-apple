<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apple API Documentation</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #9a7ca3; position:fixed; width: 100%; z-index: 9999; ">
    <div class="container">
      <!-- <a class="navbar-brand" href="#">Logo</a> -->
      <img src="../image/logo.png" alt="Logo" width="30rem">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" style="color:white" href="">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color:white" href="doc.php">Documentation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color:white" href="#products">Products</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="color:white" href="regis-token.php" role="button" data-bs-toggle="dropdown">
              Account
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="regis.php">Register</a></li>
              <li><a class="dropdown-item" href="login.php">Login</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <header class="hero">
      <div class="container" style="margin-top: 50px;">
        <h3 class="display-4">Apple API Documentation</h3>
        <p class="lead">Explore the API for Apple Products</p>
        <a href="regis-token.php" class="btn btn-light btn-outline-dark">Get Started</a>
      </div>
  </header>

  <!-- Product Section -->
  <section class="products" id="products">
    <div class="container">
      <h2 class="text-center mb-4">Explore Apple Products Documentation</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="../image/iphone.jpg" class="card-img-top" alt="iPhone">
            <div class="card-body">
              <h5 class="card-title">iPhone</h5>
              <p class="card-text">Documentation for iPhone API.</p>
              <a href="doc.php#section1" class="btn btn-outline-dark text-white" style="background-color: #c8b7c9;">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="../image/ipad.jpg" class="card-img-top" alt="iPad">
            <div class="card-body">
              <h5 class="card-title">iPad</h5>
              <p class="card-text">Documentation for iPad API.</p>
              <a href="doc.php#section6" class="btn btn-outline-dark text-white" style="background-color: #c8b7c9;">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="../image/macbok.png" class="card-img-top" alt="MacBook">
            <div class="card-body">
              <h5 class="card-title">MacBook</h5>
              <p class="card-text">Documentation for MacBook API.</p>
              <a href="doc.php#section11" class="btn btn-outline-dark text-white" style="background-color: #c8b7c9;">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <p>&copy; 2023 Apple. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script>

</body>

</html>