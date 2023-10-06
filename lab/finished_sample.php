<?php
// Database connection parameters
require_once '../db_connection.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$sample_id = (int) $_POST['sample_id'];
try {
    // Prepare and bind parameters to SQL query, then execute
    $status_id = 3;
    $sql = "UPDATE sample SET status_id = ? WHERE sample_id = ?";
    $stmt = $db_connection->prepare($sql);
    $stmt->bind_param("ii", $status_id, $sample_id);
    $result = $stmt->execute();

    if ($result) {
        echo "Status for sample with sample ID $sample_id has been updated to 'finished'";
        echo "<br><a href='lab_design_input_form.php'>Enter more results</a>";
    } else {
        echo "Error: " . $stmt->error;
        echo "<br><a href='lab_design_input_form.php'>Back to result input form</a>";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    echo "<br><a href='lab_design_input_form.php'>Back to result input form</a>";
}
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Prepare the SQL statement to check if the email exists and retrieve user information
$check_query = "SELECT u.email as email, s.doctor_id
                FROM users u
                INNER JOIN sample s ON u.user_id = s.doctor_id
                WHERE s.sample_id = '$sample_id';";

$result = $db_connection->query($check_query); 
$row = $result->fetch_assoc();
$e_mail = $row['email'];

echo $e_mail;

// Send a notification to the doctors email using PHPMailer

$sample = "localhost"; // Replace with your domain
$subject = "Sample " . $sample_id . " finished processing ";
$message = "The analysis of your sample with sample id '" . $sample_id . "' is finished and is ready for review.";


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
$mail->addAddress($e_mail);

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
} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

$db_connection->close();

?>