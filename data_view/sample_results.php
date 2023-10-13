<link rel="stylesheet" href="table_styles.css">
<?php require_once "../nav_bar.php"; ?>
<?php
session_start();
include '../db_connection.php';

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1440)) {
    header("Location: ../login/logout.php");
}
$_SESSION['LAST_ACTIVITY'] = time();

if ($_SESSION['role_id'] != 1 && $_SESSION['role_id'] != 3) {
    header("Location: ../login/login.php");
    exit();
}

$sample_id = $_GET["sample_id"];
// SQL queries
$sql = "SELECT sample_id, a1.antibiotic_name AS 'Antibiotic 1', a2.antibiotic_name AS 'Antibiotic 2', a3.antibiotic_name AS 'Antibiotic 3',synergy_name, prescribed FROM 
((((results 
INNER JOIN antibiotics AS a1 ON results.antibiotic_id1 = a1.antibiotic_id)
INNER JOIN antibiotics AS a2 ON results.antibiotic_id2 = a2.antibiotic_id)
INNER JOIN antibiotics AS a3 ON results.antibiotic_id3 = a3.antibiotic_id)
INNER JOIN synergy ON results.synergy_result = synergy.synergy_id)
WHERE sample_id = $sample_id;";

$result = $db_connection->query($sql);

$sqlStatus = "SELECT status_id FROM sample WHERE sample.sample_id = $sample_id;";
$resultStatus = $db_connection->query($sqlStatus);
if ($resultStatus->num_rows > 0) {
    // Fetch the row from the result set
    $row = $resultStatus->fetch_assoc();

    // Access the 'status_id' value from the row
    $status_id = $row['status_id'];
}

$sqlDoctor = "SELECT doctor_id FROM sample WHERE sample.sample_id = $sample_id;";
$resultDoctor = $db_connection->query($sqlDoctor);
if ($resultDoctor->num_rows > 0) {
    // Fetch the row from the result set
    $row = $resultDoctor->fetch_assoc();

    // Access the 'status_id' value from the row
    $doctor_id = $row['doctor_id'];
}

$show_button = ($status_id == 3 and $doctor_id == $_SESSION['user_id']); 

// Start the table with some basic styling
echo '
    <p>Results for Sample ID: ' . $sample_id . ' </p>
    <table>
    <thead>
    <tr>
        <th>Antibiotic 1</th>
        <th>Antibiotic 2</th>
        <th>Antibiotic 3</th>
        <th>Result</th>
        ';
if ($show_button) {
    echo '<th>Prescribe</th>';

}
echo '
    </tr>
    </thead>
    ';


// Fill table
if ($result->num_rows > 0) {
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        // TODO: Add specific styling for the prescribed row
        if ($row["prescribed"]) {
            echo "<tr class='prescribed'>";
        } else {
            echo "<tr>";
        }
        echo "
        <td>" . $row["Antibiotic 1"] . "</td>
        <td>" . $row["Antibiotic 2"] . "</td>
        <td>" . $row["Antibiotic 3"] . "</td>
        <td>" . $row["synergy_name"] . "</td>
        ";
        if ($show_button) {
            // Pass antibiotic values to the showConfirmation function
            echo "<td>
                    <button onclick='showConfirmation(" . $row["sample_id"] . ", \"" . $row["Antibiotic 1"] . "\", \"" . $row["Antibiotic 2"] . "\", \"" . $row["Antibiotic 3"] . "\")'>Prescribe this combination</button>
                </td>";
        }
        echo "
        </tr>";
    }
    echo "</tbody>";

    // Add a JavaScript function to show the confirmation popup
    echo "
    <script>
    function showConfirmation(sampleId, antibiotic1, antibiotic2, antibiotic3) {
        if (window.confirm('Are you sure you want to prescribe this combination?')) {
            // If the user confirms, navigate to update_prescription.php with all values
            window.location.href = 'update_prescription.php?sample_id=' + sampleId + '&antibiotic1=' + encodeURIComponent(antibiotic1) + '&antibiotic2=' + encodeURIComponent(antibiotic2) + '&antibiotic3=' + encodeURIComponent(antibiotic3);
        } else {
            // If the user cancels, do nothing or provide feedback as needed
        }
    }
    </script>";

} else {
    echo "<p>>0 results</p>";
}

// Close the table
echo '</table>';

// Close the database connection
$db_connection->close();
?>