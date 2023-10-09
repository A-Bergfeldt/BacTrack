require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $description = $_POST["description"];
    
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
        header("Location: Thanksyouforcontacting.html");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>


