<?php 
include ('./conn/conn.php'); // Ensure this path is correct based on your project structure

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Prepare the statement using mysqli
    $stmt = $conn->prepare("SELECT * FROM `tbl_user` WHERE `tbl_user_id` = ?");
    $stmt->bind_param("i", $userId); // Bind the parameter as an integer
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc(); // Fetch the user data as an associative array

    if (!$user) {
        die("User not found");
    }

    $stmt->close(); // Close the statement
} else {
    die("No user ID provided");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
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
    <div class="main">
        <div class="content">
            <h4>Edit User</h4>
            <hr>
            <form action="./endpoint/update-user.php" method="POST">
                <input type="hidden" name="tbl_user_id" value="<?php echo $user['tbl_user_id']; ?>">
                <div class="form-group row">
                    <div class="col-6">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>" required>
                    </div>
                    <div class="col-6">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <label for="contact_number">Contact Number:</label>
                        <input type="tel" class="form-control" id="contact_number" name="contact_number" value="<?php echo $user['contact_number']; ?>" required>
                    </div>
                    <div class="col-6">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">New Password (leave blank to keep current password):</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="">Update User</button>
                <center><a href="home.php" class="">Cancel</a> </center>
            </form>
        </div>
    </div>

    <!-- Bootstrap Js -->
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
