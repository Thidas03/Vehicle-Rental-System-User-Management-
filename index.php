<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - User System</title>
    <link rel="stylesheet" href="./assets/style.css">
    <nav>
        <img src="images/swiftlogo2.png" class="navbar-brand toplogo" alt="img" />
        <a href="home.html" class="nav">
            <h1>Swift<b class="accent">  Wheels</b></h1>
        </a>
        <div class="menu">
            <div class="btn">
                <i class="fas fa-times close-btn"></i>
            </div>
            <a href="home.html">Home</a>
            <a href="vehicles.html">Vehicles</a>
            <a href="add_payment.php">Add Payment</a>
            <a href="about.html">About Us</a>
            <a href="#">Contact Us</a>
        </div>
        <button class="btn-1" onclick="window.location.href='signup.html'">Sign-Up</button>
        <button class="btn-2" onclick="window.location.href='login.html'">Login</button>
        <div class="btn">
            <i class="fas fa-bars menu-btn"></i>
        </div>
    </nav>
    
    <br><br><br>
</head>
<body>
<div class="main">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="login" id="loginForm">
            <h1 class="text-center">Login</h1>
            <form action="./endpoint/login.php" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="text-center">
                    <button type="submit" class="">Login</button>
                    <p class="mt-3"><a href="register.php">No Account? Register Here.</a></p>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

</body>

   <!-- Footer from index.html -->
   <footer class="footer">
      <div class="footer-container">
          <div class="footer-column">
              <h3>Privacy Policy</h3>
              <a href="#">Terms of Service</a>
              <a href="#">FAQs</a>
          </div>
          <div class="footer-column">
              <h3>Branches</h3>
              <p>Colombo 5</p>
              <p>Nugegoda</p>
              <p>Kandy</p>
              <p>Matara</p>
              <p>Welisara</p>
          </div>
          <div class="footer-column">
              <h3>Contact Us</h3>
              <a href="tel:+94770409409">Product Advice: +94770409409</a>
              <a href="tel:+94776588001">Delivery Information: +94776588001</a>
              <a href="tel:+94777042913">Feedback/Complaints: +94777042913</a>
          </div>

          <div class="xyz">
            <div class="footer-logo">
              <img src="images/swiftlogo2.png" alt="SWIFT WHEELS Logo">
             </div>
             <div class="footer-icons">
              <a href="#"><img src="images/facebook.png" alt="Facebook"></a>
              <a href="#"><img src="images/instagram.png" alt="Instagram"></a>
              <a href="#"><img src="images/x.png" alt="twitter"></a>
              <a href="#"><img src="images/linkedin(1).png" alt="Linkedln"></a>
          </div>
          </div>
      </div>
      <div class="footer-bottom">
          <p>&copy; 2024 Swift Wheels All Rights Reserved</p>
          <div class="payment-methods">
              <img src="images/visa(1).png" alt="Visa">
              <img src="images/mastercard(1).png" alt="MasterCard">
              <img src="images/paypal(2).png" alt="PayPal">
              <img src="images/amex.png" alt="American Express">
              <img src="images/discover(1).png" alt="Discover">
          </div>
      </div>
  </footer>
</html>
