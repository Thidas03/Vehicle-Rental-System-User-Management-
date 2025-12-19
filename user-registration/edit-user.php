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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand ml-5" href="home.php">User Registration and Login System</a>
    </nav>

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
                <button type="submit" class="btn btn-primary">Update User</button>
                <a href="home.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>

    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
