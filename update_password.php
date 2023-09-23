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

        // Use a prepared statement with placeholders
        $update_query = "UPDATE users SET hashed_password = ? WHERE user_id = ?";
        $stmt = $db_connection->prepare($update_query);

        if ($stmt) {
            $stmt->bind_param("si", $hashed_new_password, $user_id);

            if ($stmt->execute()) {
                echo "Password updated successfully!";
                echo '<form method="post" action="login.php">
                <input type="submit" name="submit" value="Go to login"/>
                </form>';
            } else {
                echo "Error updating password: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing update statement: " . $db_connection->error;
        }
    }
} else {
    echo "Invalid request.";
}
?>
