<?php
session_start();

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
        echo "Data inserted successfully! </br>Your sample id is: " . $lastInsertedID;
        echo "<br><a href='sample_form.php'>Enter another sample</a>";
    } else {
        echo "Error: " . $stmt->error;
        echo "<br><a href='sample_form.php'>Back to sample input form</a>";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    echo "<br><a href='sample_form.php'>Back to sample input form</a>";
}
$link->close();

?>