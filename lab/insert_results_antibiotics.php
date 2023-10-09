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

$sorted_antibiotics = array($antibiotic1, $antibiotic2, $antibiotic3);
sort($sorted_antibiotics);

$antibiotic1 = $sorted_antibiotics[0];
$antibiotic2 = $sorted_antibiotics[1];
$antibiotic3 = $sorted_antibiotics[2];

// Update tracking id
if (isset($_POST['finished']) && $_POST['finished'] === 'on') {
    // The checkbox is checked
    $status_id = 3;
    $sql = "UPDATE sample SET status_id = ? WHERE sample_id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("ii", $status_id, $sample_id);
    $result = $stmt->execute();
}

$sql = "SELECT * FROM results WHERE sample_id = ? AND antibiotic_id1 = ? AND antibiotic_id2 = ? AND antibiotic_id3 = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("iiii", $sample_id, $antibiotic1, $antibiotic2, $antibiotic3);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Combination already exists, display an error message
    echo "Error: This combination already exists in the database.";
} else {

    try {
        // Prepare and bind parameters to SQL query, then execute
        $sql = "INSERT INTO results (sample_id, antibiotic_id1, antibiotic_id2, antibiotic_id3, synergy_result) VALUES (?, ?, ?, ?, ?)";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("iiiii", $sample_id, $antibiotic1, $antibiotic2, $antibiotic3, $synergy_results);
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
}

$link->close();

?>