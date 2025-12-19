<?php include ('./conn/conn.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration and Login System</title>
    <!-- Style CSS -->
    <link rel="stylesheet" href="./assets/style.css">
</head>

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
<body>
 

    <div class="main">
        <div class="content">
            <h4>List of users</h4>
            <hr>
            <table class="table table-hover table-collapse">
                <thead>
                    <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    
                       // Execute the query to fetch all users
$query = "SELECT * FROM `tbl_user`";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    // Fetch all rows as an associative array
    while ($row = $result->fetch_assoc()) {
        // Access data using $row['column_name']
        echo "<tr>";
        echo "<td>" . $row['tbl_user_id'] . "</td>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['contact_number'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>
                <a href='edit-user.php?id=" . $row['tbl_user_id'] . " '>Edit</a> | 
                <a href='endpoint/delete-user.php?user=" . $row['tbl_user_id'] . "'>Delete</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No users found</td></tr>";
}

// Close the database connection
$conn->close();
?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Delete user
        function delete_user(id) {
            if (confirm("Do you want to delete this user?")) {
                window.location = "./endpoint/delete-user.php?user=" + id;
            }
        }
    </script>
    
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