<?php
if (isset($_GET['status']) && $_GET['status'] == 'logout') {
    echo "<script>alert('Anda telah berhasil logout!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Penjualan Madu Alas Paser</title>
    <link rel = "stylesheet" href = "styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <!-- --navbar-- -->
  <nav class="navbar-up" id="side-bar">
    <a href="index.php">
        <img src="Logo TP.png" class="img-logo" alt="Logo">
    </a>
    <div class="navhead">
        <button class="hamburger" id="hamburger"><i class="fas fa-bars"></i></button>
        <div id="navbar-list">
            <a href="" class="dec-navbar">Home</a>
            <a href="tentang.php" class="dec-navbar">About</a>
            <a href="" class="dec-navbar">Contact Us</a>
            <a href="login.php" class="dec-navbar">Login</a>
            <div class="theme-switch">
                <button class="dark-btn"><i class="fas fa-moon"></i></button>
                <button class="light-btn"><i class="fas fa-sun"></i></button>
            </div>
        </div>
    </div>
</nav>
  <!-- --products-- -->
<div class="products">
    <h2>Our Products</h2>
    <div class="product-list">
        <div class="product-item">
            <img src="assets/madu5.jpg" alt="Madu Hutan Apis Mellifera 250 ml">
            <h3>Madu Hutan Apis Mellifera 250 ml</h3>
            <p class="price">Rp 85.000</p>
            <button type="submit" class="btn-buy" onclick="reqlogin()">Buy Now</button>
        </div>
        <div class="product-item">
            <img src="assets/madu2.jpg" alt="Madu Hutan Apis Dorsata 100ml">
            <h3>Madu Hutan Apis Dorsata 100ml</h3>
            <p class="price">Rp 50.000</p>
            <button type="submit" class="btn-buy" onclick="reqlogin()">Buy Now</button>
        </div>
        <div class="product-item">
            <img src="assets/madu3.jpg" alt="Madu Kelulut Trigona 250 ml">
            <h3>Madu Kelulut Trigona 250 ml</h3>
            <p class="price">150.000</p>
            <button type="submit" class="btn-buy" onclick="reqlogin()">Buy Now</button>
        </div>
        <br>
        <div class="product-item">
            <img src="assets/madu4.jpg" alt="Madu Hutan Apis Mellifera 450 ml">
            <h3>Madu Hutan Apis Mellifera 450 ml</h3>
            <p class="price">150.000</p>
            <button type="submit" class="btn-buy" onclick="reqlogin()">Buy Now</button>
        </div>
        <div class="product-item">
            <img src="assets/madu1.jpg" alt="Madu Hutan Apis Dorsata 250ml">
            <h3>Madu Hutan Apis Dorsata 250ml</h3>
            <p class="price">Rp 100.000</p>
            <button type="submit" class="btn-buy" onclick="reqlogin()">Buy Now</button>
        </div>
        <div class="product-item">
            <img src="assets/madu4.jpg" alt="Madu Hutan Apis Mellifera 450 ml">
            <h3>Madu Hutan Apis Mellifera 450 ml</h3>
            <p class="price">150.000</p>
            <button type="submit" class="btn-buy" onclick="reqlogin()">Buy Now</button>
        </div>
    </div>
</div>
  <!-- --footer-- -->
  <footer>
  <div class = "footer">
    <div class="footer-bottom">
        <p>&copy; 2024 Madu Alas Paser. All rights reserved.</p>
    </div>
  </div>
  </footer>
  <script src="scripts/script.js"></script>
</body>
</html>