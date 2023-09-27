<?php
include '../db_connection.php';

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

// Start the table with some basic styling
echo '
    <p>Results for Sample ID: ' . $sample_id . ' </p>
    <table style="width: 100%; border-collapse: collapse;">
    <thead>
    <tr>
        <th style="border: 1px solid #000; padding: 8px;">Antibiotic 1</th>
        <th style="border: 1px solid #000; padding: 8px;">Antibiotic 2</th>
        <th style="border: 1px solid #000; padding: 8px;">Antibiotic 3</th>
        <th style="border: 1px solid #000; padding: 8px;">Result</th>
        ';
if ($status_id == 3) {
    echo '<th style="border: 1px solid #000; padding: 8px;">Prescribe</th>';

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
        <td style='border: 1px solid #000; padding: 8px;'>" . $row["Antibiotic 1"] . "</td>
        <td style='border: 1px solid #000; padding: 8px;'>" . $row["Antibiotic 2"] . "</td>
        <td style='border: 1px solid #000; padding: 8px;'>" . $row["Antibiotic 3"] . "</td>
        <td style='border: 1px solid #000; padding: 8px;'>" . $row["synergy_name"] . "</td>
        ";
        if ($status_id == 3) {
            echo "<td style='border: 1px solid #000; padding: 8px;'>
                    <a href='update_prescription.php?sample_id=" . $row["sample_id"] . "&antibiotic1=" . $row["Antibiotic 1"] . "&antibiotic2=" . $row["Antibiotic 2"] . "&antibiotic3=" . $row["Antibiotic 3"] . "'>
                        <button>Prescribe this combination</button>
                    </a>
                </td>";
        }
        echo "
        </tr>";
    }
    echo "</tbody>";
} else {
    echo "<tr><td colspan='5'>0 results</td></tr>";
}

// Close the table
echo '</table>';

// Close the database connection
$db_connection->close();
?>