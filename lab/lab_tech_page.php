<!DOCTYPE html>
<html>
<head>
    <title>My BacTrack Web App</title>
    <!-- Add your CSS styles here -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" type="text/css" href="lab_tech_style.css">
</head>
  <body>
    <?php require_once '../nav_bar.php'; ?>

    <?php

session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1440)) {
    header("Location: ../login/logout.php");
}
$_SESSION['LAST_ACTIVITY'] = time();

if ($_SESSION['role_id'] != 1 && $_SESSION['role_id'] != 3) {
    header("Location: ../login/login.php");
    exit();
}

$user_name = str_replace("_", " ", $_SESSION['user_id']);
?>

<!-- This is how you comment out
how much you want
-->


<!DOCTYPE html>
<html>
<head>
    <title>Lab tech page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="/data_view/table_styles.css">
    <style>
        .button-container {
            text-align: center;
            margin-top: 30px; 
        }

        .button-container .button {
            display: inline-block;
            padding: 15px 30px; 
            background-color: #662d91;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
            margin: 0 10px; 
        }

        .button-container .button:hover {
            background-color: #800080;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="slides slide1">
            <h1 style="font-size: 100px; color: #000000; text-align: center;">Hello <?php echo $user_name; ?>!</h1>
        </div>

        <div class="button-container">
        <a href="lab_design_input_form.php" class="button">Insert new sample</a>
        </div>

        <main class="table">
            <section class="table_header">
                <h1 style="text-align: center;">Your samples</h1>
            </section>
            <section class="table_body">
                <table>
                    <thead>
                        <tr>
                            <th>Sample ID<span class="icon-arrow">&DownArrow;</span></th>
                            <th>Date<span class="icon-arrow">&DownArrow;</span></th>
                            <th>Strain<span class="icon-arrow">&DownArrow;</span></th>
                            <th>Lab Technician<span class="icon-arrow">&DownArrow;</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
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
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    <?php require_once "../nav_bar.php"; ?> 
</body>
</html>
