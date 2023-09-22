<?php
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
/*
// Fetch data from POST request
$lab_technician_id = (int) $_POST['lab_technician_id'];
$sample_id = (int) $_POST['sample_id'];
$strain = (int) $_POST['strain'];
$doctor_id = $_POST['user_id'];
$hospital_id = (int) $_POST['hospital'];
try {
    // Prepare and bind parameters to SQL query, then execute
    $sql = "INSERT INTO sample (date_taken, prescription_id, status_id, hospital_id, doctor_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("siiis", $date, $prescription_id, $status_id, $hospital_id, $doctor_id);
    $result = $stmt->execute();

    if ($result) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
$link->close();
*/
?>