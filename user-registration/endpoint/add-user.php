<?php
include ('../conn/conn.php');

$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$contactNumber = $_POST['contact_number'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

try {
    // Check if the user already exists
    $nameCheckQuery = "SELECT `first_name`, `last_name` FROM `tbl_user` WHERE `first_name` = '$firstName' AND `last_name` = '$lastName'";
    $result = $conn->query($nameCheckQuery);

    if ($result->num_rows == 0) {
        // Insert the new user
        $insertQuery = "INSERT INTO `tbl_user` (`tbl_user_id`, `first_name`, `last_name`, `contact_number`, `email`, `username`, `password`) 
                        VALUES (NULL, '$firstName', '$lastName', '$contactNumber', '$email', '$username', '$password')";
        if ($conn->query($insertQuery) === TRUE) {
            echo "
            <script>
                alert('Registered Successfully');
                window.location.href = 'http://localhost/user-registration/index.php';
            </script>
            ";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "
        <script>
            alert('User Already Exists');
            window.location.href = 'http://localhost/user-registration/index.php';
        </script>
        ";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
