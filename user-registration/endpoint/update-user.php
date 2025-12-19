<?php
include ('../conn/conn.php');

// Retrieve form data
$updateUserID = $_POST['tbl_user_id'];
$updateFirstName = $_POST['first_name'];
$updateLastName = $_POST['last_name'];
$updateContactNumber = $_POST['contact_number'];
$updateEmail = $_POST['email'];
$updateUsername = $_POST['username'];
$updatePassword = $_POST['password'];

// Check if a user with the same first name and last name exists, excluding the current user
$checkQuery = "SELECT `first_name`, `last_name` FROM `tbl_user` 
               WHERE `first_name` = '$updateFirstName' AND `last_name` = '$updateLastName' 
               AND `tbl_user_id` != '$updateUserID'";
$result = $conn->query($checkQuery);

if ($result && $result->num_rows > 0) {
    echo "
    <script>
        alert('User with the same name already exists');
        window.location.href = 'http://localhost/user-registration/index.php';
    </script>
    ";
} else {
    // Proceed to update the user details
    if (!empty($updatePassword)) {
        // If a new password is provided, update it
        $updateQuery = "UPDATE `tbl_user` SET 
                        `first_name` = '$updateFirstName', 
                        `last_name` = '$updateLastName', 
                        `contact_number` = '$updateContactNumber', 
                        `email` = '$updateEmail', 
                        `username` = '$updateUsername', 
                        `password` = '$updatePassword' 
                        WHERE `tbl_user_id` = '$updateUserID'";
    } else {
        // If no new password is provided, do not update the password
        $updateQuery = "UPDATE `tbl_user` SET 
                        `first_name` = '$updateFirstName', 
                        `last_name` = '$updateLastName', 
                        `contact_number` = '$updateContactNumber', 
                        `email` = '$updateEmail', 
                        `username` = '$updateUsername'
                        WHERE `tbl_user_id` = '$updateUserID'";
    }

    if ($conn->query($updateQuery) === TRUE) {
        echo "
        <script>
            alert('User updated successfully');
            window.location.href = 'http://localhost/user-registration/home.php';
        </script>
        ";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
