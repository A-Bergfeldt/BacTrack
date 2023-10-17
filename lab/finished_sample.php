
<?php
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1440)) {
    header("Location: ../login/logout.php");
}
$_SESSION['LAST_ACTIVITY'] = time();

if ($_SESSION['role_id'] != 2 && $_SESSION['role_id'] != 3) {
    header("Location: ../login/login.php");
    exit();
}

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

// Database connection parameters
require_once '../db_connection.php';

$sample_id = (int) $_POST['sample_id'];
try {
    // Prepare and bind parameters to SQL query, then execute
    $status_id = 3;
    $sql = "UPDATE sample SET status_id = ? WHERE sample_id = ?";
    $stmt = $db_connection->prepare($sql);
    $stmt->bind_param("ii", $status_id, $sample_id);
    $result = $stmt->execute();

    if ($result) {
        $message1 = "Status for sample with sample ID $sample_id has been updated to 'finished'";
    } else {
        $message1 = "Error: ";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    echo "<br><a href='lab_design_input_form.php'>Back to result input form</a>";
}

// Prepare the SQL statement to check if the email exists and retrieve user information
$check_query = "SELECT u.email as email, s.doctor_id
                FROM users u
                INNER JOIN sample s ON u.user_id = s.doctor_id
                WHERE s.sample_id = '$sample_id';";

$result = $db_connection->query($check_query); 
$row = $result->fetch_assoc();
$e_mail = $row['email'];


// Send a notification to the doctors email using PHPMailer

$sample = "localhost"; // Replace with your domain
$subject = "Sample " . $sample_id . " finished processing ";
$message = "The analysis of your sample with sample id '" . $sample_id . "' is finished and is ready for review.";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

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

<!DOCTYPE html>
<html>
<head>
    <title>My BacTrack Web App</title>
    <!-- Add your CSS styles here -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" type="text/css" href="lab_tech_style.css">
</head>
  <body>
  </br></br></br></br></br></br></br></br>
    <?php require_once '../nav_bar.php'; ?>
    <div class="box">
        <p style="text-align: center;"> 
            <?php if (isset($message1)) {echo $message1 . $stmt->error;} ?>
        </p>
        <div>
            <div class="button-container" style="text-align: center;">
                <a href='lab_design_input_form.php' class="button">Enter more results</a>
    </div>
</body>
