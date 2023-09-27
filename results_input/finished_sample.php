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

$sample_id = (int) $_POST['sample_id'];
try {
    // Prepare and bind parameters to SQL query, then execute
    $status_id = 3;
    $sql = "UPDATE sample SET status_id = ? WHERE sample_id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("ii", $status_id, $sample_id);
    $result = $stmt->execute();

    if ($result) {
        echo "Status for sample with sample ID $sample_id has been updated to 'finished'";
    } else {
        echo "Error: " . $stmt->error;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
$link->close();

?>