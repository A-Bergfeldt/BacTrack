

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

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "BacTrack";

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname);

// Check if connection is established
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from POST request
$date = $_POST['date'];
$status_id = 1;
$doctor_id = $_SESSION['user_id'];
$hospital_id = (int) $_POST['hospital'];

try {
    // Prepare and bind parameters to SQL query, then execute
    $sql = "INSERT INTO sample (date_taken, status_id, hospital_id, doctor_id) VALUES (?, ?, ?, ?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("siis", $date, $status_id, $hospital_id, $doctor_id);
    $result = $stmt->execute();

    if ($result) {
        // Retrieve the last inserted ID
        $lastInsertedID = mysqli_insert_id($link);
        $message = "Data inserted successfully! </br>Your sample id is: " . $lastInsertedID;
    } else {
        $message = "Error: " . $stmt->error;
    }
} catch (Exception $e) {
    $message = "Error: " . $e->getMessage();
}
$link->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>My BacTrack Web App</title>
    <!-- Add your CSS styles here -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" type="text/css" href="doctor_style.css">
</head>
  <body>
  </br></br></br></br></br></br></br></br>
    <?php require_once '../nav_bar.php'; ?>
    <div class="box">
        <p style="text-align: center;"> 
            <?php if (isset($message)) {echo $message . $stmt->error;} ?>
        </p>
        <div>
            <div class="button-container" style="text-align: center;">
                <a href='sample_form.php' class="button">Input sample</a>
    </div>
  </body>
</html>