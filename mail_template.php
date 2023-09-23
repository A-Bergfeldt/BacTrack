<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $recipient = $_POST["recipient"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Create an instance of PHPMailer
    $mail = new PHPMailer(true);

    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF; // Disable debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'bactrack2023@gmail.com';
    $mail->Password = 'amky jgok axgt hqun';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    $mail->setFrom('bactrack2023@gmail.com', 'Bac');
    $mail->addAddress($recipient);

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    try {
        $mail->send();
        // Display success message
        echo "Message sent successfully<br><br>";

        // Provide an option to send a new email
        echo '<form method="post" action="sender.html">
            <input type="submit" name="submit" value="Homepage"/>
            </form>';


        // Redirect back to the sender.html page
        exit(); // Ensure that no other code is executed after the redirect
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
