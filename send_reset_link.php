<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once('db_connection.php'); 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["recipent"];

    // Check if the email exists in your database
    $query = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($db_connection, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // Generate a unique token for password reset
            $reset_token = bin2hex(random_bytes(32)); // Generate a 64-character token (128 bytes)

            // Store the token and expiration timestamp in the database
            $expiration_timestamp = date('Y-m-d H:i:s', strtotime('+1 hour')); // Set the expiration time (e.g., 1 hour from now)

            $insert_query = "INSERT INTO password_reset_tokens (user_email, token, expiration_timestamp) VALUES ('$email', '$reset_token', '$expiration_timestamp')";
            if (mysqli_query($db_connection, $insert_query)) {
                // Send the reset password link to the user's email using PHPMailer
                $reset_link = "https://example.com/reset_password.php?token=" . $reset_token; // Replace with your domain
                $subject = "Password Reset";
                $message = "To reset your password, click on the following link: $reset_link";

                // Initialize PHPMailer
                $mail = new PHPMailer\PHPMailer\PHPMailer();
                // Configure PHPMailer as before (SMTP settings, sender, recipient, subject, body, etc.)

                // Send the email
                if ($mail->send()) {
                    echo "A password reset link has been sent to your email address.";
                } else {
                    echo "Error sending email: " . $mail->ErrorInfo;
                }
            } else {
                echo "Error storing reset token: " . mysqli_error($db_connection);
            }
        } else {
            echo "Email address not found in our records.";
        }
    } else {
        echo "Error querying the database: " . mysqli_error($db_connection);
    }
} else {
    echo "Invalid request.";
}












if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["recipient"];

    // Check if the email exists in your database
    $query = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($db_connection, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // Generate a unique token for password reset
            $reset_token = bin2hex(random_bytes(32)); // Generate a 64-character token (128 bytes)

            // Store the token and expiration timestamp in the database
            $user_id = $row['id'];
            $expiration_timestamp = date('Y-m-d H:i:s', strtotime('+1 hour')); // Set the expiration time (e.g., 1 hour from now)

            $insert_query = "INSERT INTO password_reset_tokens (user_id, token, expiration_timestamp) VALUES ($user_id, '$reset_token', '$expiration_timestamp')";
        if (mysqli_query($db_connection, $insert_query)) {
            // Send the reset password link to the user's email using PHPMailer
            $reset_link = "localhost/reset_password.php?token=" . $reset_token; 
            $subject = "Password Reset";
            $message = "To reset your password, click on the following link: $reset_link";

            // Initialize PHPMailer
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com'; // Replace with your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'bactrack2023@gmail.com';
            $mail->Password = 'amky jgok axgt hqun';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
            $mail->SMTPSecure = "ssl";

            // Set sender and recipient information
            $mail->setFrom('bactrack2023@gmail.com', 'BacTrack password reset');
            $mail->addAddress($email);

            // Set email subject and message
            $mail->Subject = $subject;
            $mail->Body = $message;

            // Send the email
            if ($mail->send()) {
                echo "A password reset link has been sent to your email address.";
            } else {
                echo "Error sending email: " . $mail->ErrorInfo;
            }
        } else {
            echo "Error storing reset token: " . mysqli_error($db_connection);
        }
    } else {
        echo "Email address not found in our records.";
        echo '<form method="post" action="forgot_passwrd.php">
        <input type="submit" name="submit" value="Go back"/>
        </form>';
    }
} else {
    echo "Invalid request.";
}
?>
