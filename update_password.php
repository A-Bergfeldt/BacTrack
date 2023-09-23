<?php
session_start();
require_once('db_connection.php'); // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if new password and confirm password match
    if ($new_password != $confirm_password) {
        echo "New password and confirm password do not match.";
    } else {
        // Update the password without checking the old password
        $user_id = $_SESSION['user_id']; // You might use session or another method to identify the user
        $hashed_new_password = password_hash($new_password, PASSWORD_BCRYPT);
        $update_query = "UPDATE users SET hashed_password = '$hashed_new_password' WHERE id = $user_id";
        
        if (mysqli_query($db_connection, $update_query)) {
            echo "Password updated successfully!";
            
        } else {
            echo "Error updating password: " . mysqli_error($db_connection);
        }
    }
} else {
    echo "Invalid request.";
}
?>
