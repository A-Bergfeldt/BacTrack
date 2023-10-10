<?php
require_once('../db_connection.php');
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["recipient"];

    // Prepare the SQL statement to check if the email exists and retrieve user information
    $check_query = "SELECT users.email
                        FROM users
                        INNER JOIN sample ON users.user_id = sample.doctor_id
                        WHERE sample.sample_id = <your_sample_id>";
    
                  
                if ($stmt_insert->execute()) {
                    // Send a notification to the doctors email using PHPMailer

                    $sample = "localhost"; // Replace with your domain
                    $subject = "Sample " . $sample . " finished processing ";
                    $message = "Sample: " . $sample . " is finished and is ready for review.";
                    

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
                        <title>Sample finished</title>
                    </head>
                    <body>
                        <p>' . $message . '</p>
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
                echo "Error preparing insert statement: " . $db_connection->error;
            }
        } else {
            echo "Email address not found in our records.";
        }

        $stmt_check->close(); // Close the check statement

?>
