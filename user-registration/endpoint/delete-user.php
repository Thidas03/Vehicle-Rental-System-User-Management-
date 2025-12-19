<?php
include ('../conn/conn.php');

if (isset($_GET['user'])) {
    $user = $_GET['user'];

    // Use query() to execute the DELETE statement
    $query = "DELETE FROM `tbl_user` WHERE `tbl_user_id` = '$user'";

    if ($conn->query($query) === TRUE) {
        echo "
        <script>
            alert('User Deleted Successfully');
            window.location.href = 'http://localhost/user-registration/home.php';
        </script>
        ";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
