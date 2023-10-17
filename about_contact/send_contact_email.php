<?php

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $description = htmlspecialchars($_POST["description"]);
    
    $mail = new PHPMailer(true);

    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'bactrack2023@gmail.com';
    $mail->Password = 'amky jgok axgt hqun';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('bactrack2023@gmail.com', 'BacTrack');
    $mail->addAddress('bactrack2023@gmail.com');

    $mail->isHTML(true);  
    $mail->Subject = "Contact Form Submission";
    $mail->Body = "Name: $name\nEmail: $email\n\nDescription:\n$description"; 

    try {
        $mail->send();
        header("Location: thanksforcontact.php");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>


