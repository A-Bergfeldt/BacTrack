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

// Fetch data from POST request
$date = $_POST['date'];
$prescription_id = (int) $_POST['prescription'];
$status_id = 1;
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

?>