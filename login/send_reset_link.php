<?php
require_once('db_connection.php');
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
date_default_timezone_set('Europe/Stockholm');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["recipient"];

    // Prepare the SQL statement to check if the email exists and retrieve user information
    $check_query = "SELECT user_id, email FROM users WHERE email = ?";
    $stmt_check = $db_connection->prepare($check_query);

    if ($stmt_check) {
        $stmt_check->bind_param("s", $email);
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
            // Email exists, generate a unique token for password reset
            $reset_token = bin2hex(random_bytes(32)); // Generate a 64-character token (128 bytes)
            
            // Encode the token for better user-friendliness in the URL
            $encoded_token = base64_encode($reset_token);

            // Bind the result columns to variables
            $stmt_check->bind_result($user_id, $user_email);
            $stmt_check->fetch();
            $stmt_check->reset(); // Reset the statement for later use

            // Store the token and expiration timestamp in the database
            
            $expiration_timestamp = date('Y-m-d H:i:s', strtotime('+1 hour')); // Set the expiration time (e.g., 1 hour from now)

            // Prepare the SQL statement to insert the reset token

            $delete_query = "DELETE FROM password_reset_tokens WHERE user_id = ?";
            $stmt_delete = $db_connection->prepare($delete_query);
            $stmt_delete->bind_param("s", $user_id);
            $stmt_delete->execute();

            $insert_query = "INSERT INTO password_reset_tokens (user_id, token, expiration_timestamp) VALUES (?, ?, ?)";
            $stmt_insert = $db_connection->prepare($insert_query);

            if ($stmt_insert) {
                $stmt_insert->bind_param("sss", $user_id, $encoded_token, $expiration_timestamp);
                  
                if ($stmt_insert->execute()) {
                    // Send the reset password link to the user's email using PHPMailer

                    $domain = "localhost"; // Replace with your domain
                    $reset_link = $domain . "/change_password.php?token=" . urlencode($encoded_token);
                    $subject = "Password Reset";
                    $message = "To reset your password, click on the following link: ";
                    

                    // Create an instance of PHPMailer
                    $mail = new PHPMailer(true);

                    // Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_OFF;
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'bactrack2023@gmail.com';
                    $mail->Password = 'amky jgok axgt hqun';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port = 465;

                    $mail->setFrom('bactrack2023@gmail.com', 'BacTrack');
                    $mail->addAddress($user_email);

                    // Set email subject and message
                    $mail->isHTML(true);  
                    $mail->Subject = $subject;
                    $mail->Body = '
                    <html>
                    <head>
                        <title>Password reset</title>
                    </head>
                    <body>
                        <p>' . $message . '</p>
                        <a href="' . $reset_link . '">' . $reset_link . '</a>
                    </body>
                    </html>';
                    try {
                        $mail->send();
                        header("Location: password_sent.php");
                        exit();
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                } else {
                    echo "Error storing reset token: " . $stmt_insert->error;
                }
            } else {
                echo "Error preparing insert statement: " . $db_connection->error;
            }
        } else {
            echo "Email address not found in our records.";
        }

        $stmt_check->close(); // Close the check statement
    } else {
        echo "Error preparing check statement: " . $db_connection->error;
    }
} else {
    echo "Invalid request.";
}

?>
