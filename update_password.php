<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('db_connection.php'); // Include your database connection script
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

date_default_timezone_set('Europe/Stockholm');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];
    $token = $_POST["token"];

    // Check if new password and confirm password match
    if ($new_password != $confirm_password) {
        echo "New password and confirm password do not match.";
    } else {
        // Check if the token is valid and get the user_id associated with it
        $check_query = "SELECT user_id, expiration_timestamp FROM password_reset_tokens WHERE token = ?";
        $stmt_check = $db_connection->prepare($check_query);

        if ($stmt_check) {
            $stmt_check->bind_param("s", $token);
            $stmt_check->execute();
            $stmt_check->store_result();

            if ($stmt_check->num_rows > 0) {
                $stmt_check->bind_result($user_id, $expiration_timestamp);
                $stmt_check->fetch();

                // Check if the token has expired
                $current_timestamp = date('Y-m-d H:i:s');
                if ($current_timestamp > $expiration_timestamp) {
                    echo "Token has expired. Please request a new password reset link.";
                } else {
                    // Token is valid, update the user's password
                    $hashed_new_password = password_hash($new_password, PASSWORD_BCRYPT);
                    $update_query = "UPDATE users SET hashed_password = ? WHERE user_id = ?";
                    $stmt_update = $db_connection->prepare($update_query);

                    if ($stmt_update) {
                        $stmt_update->bind_param("ss", $hashed_new_password, $user_id);
                        if ($stmt_update->execute()) {
                            echo "Password updated successfully!";
                            $delete_query = "DELETE FROM password_reset_tokens WHERE user_id = ?";
                            $stmt_delete = $db_connection->prepare($delete_query);

                            if ($stmt_delete) {
                                $stmt_delete->bind_param("s", $user_id);
                                if ($stmt_delete->execute()) {
                                    // Tokens related to the user have been deleted successfully
                                } else {
                                    echo "Error deleting tokens: " . $stmt_delete->error;
                                }
                            } else {
                                echo "Error preparing delete statement: " . $db_connection->error;
                            }
                            echo '<form method="post" action="login.php">
                            <input type="submit" name="submit" value="Go to login"/>
                            </form>';
                        } else {
                            echo "Error updating password: " . mysqli_error($db_connection);
                        }
                    } else {
                        echo "Error preparing update statement: " . $db_connection->error;
                    }
                }
            } else {
                echo "Invalid token.";
            }

            $stmt_check->close(); // Close the check statement
        } else {
            echo "Error preparing check statement: " . $db_connection->error;
        }
    }
} else {
    echo "Invalid request.";
}
?>
