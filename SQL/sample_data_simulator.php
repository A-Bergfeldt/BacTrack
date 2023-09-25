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

for ($x = 0; $x <= 100; $x++) {
    $year = random_int(1998, 2022);
    $month = random_int(1,12);
    $day = random_int(1,28);
    $date = sprintf("%04d-%02d-%02d", $year, $month, $day);
    $prescription_id = random_int(1, 3);
    $status_id = random_int(1, 3);
    $hospital_id = random_int(1, 3);
    $strain_id = random_int(1, 3);
    try {
        // Prepare and bind parameters to SQL query, then execute
        $sql = "INSERT INTO sample (date_taken, prescription_id, status_id, hospital_id, strain_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("siiii", $date, $prescription_id, $status_id, $hospital_id, $strain_id);
        $result = $stmt->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
$link->close();

?>