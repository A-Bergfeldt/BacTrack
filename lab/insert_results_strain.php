<?php
session_start();
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
$lab_technician_id = $_SESSION['user_id'];
$sample_id = (int) $_POST['sample_id'];
$strain_id = (int) $_POST['strain'];
$status_id = 2;
try {
    // Prepare and bind parameters to SQL query, then execute
    $sql = "UPDATE sample SET strain_id = ?, lab_technician_id = ?, status_id = ? WHERE sample_id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("isii", $strain_id, $lab_technician_id, $status_id, $sample_id);
    $result = $stmt->execute();

    if ($result) {
        echo "Values inserted successfully for sample_id: $sample_id";
        echo "<br><a href='lab_design_input_form.php'>Enter more results</a>";
    } else {
        echo "Error: " . $stmt->error;
        echo "<br><a href='lab_design_input_form.php'>Back to result input form</a>";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    echo "<br><a href='lab_design_input_form.php'>Back to result input form</a>";
}
$link->close();

?>