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
$sample_id = (int) $_POST['sample_id'];
$antibiotic1 = (int) $_POST['antibiotic1'];
$antibiotic2 = (int) $_POST['antibiotic2'];
$antibiotic3 = (int) $_POST['antibiotic3'];
$synergy_results = (int) $_POST['synergy_results'];

try {
    // Prepare and bind parameters to SQL query, then execute
    $sql = "INSERT INTO results (sample_id, antibiotic_id1, antibiotic_id2, antibiotic_id3, synergy_result) VALUES (?, ?, ?, ?, ?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("iiiii", $sample_id, $antibiotic1, $antibiotic2, $antibiotic3, $synergy_results);
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