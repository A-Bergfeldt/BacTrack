<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "BacTrack";

$sample_id = $_GET["sample_id"];
// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname);

// Check if connection is established
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Start the table with some basic styling
echo '<table style="width: 100%; border-collapse: collapse;">
    <thead>
    <tr>
        <th style="border: 1px solid #000; padding: 8px;">Sample ID</th>
        <th style="border: 1px solid #000; padding: 8px;">Antibiotic 1</th>
        <th style="border: 1px solid #000; padding: 8px;">Antibiotic 2</th>
        <th style="border: 1px solid #000; padding: 8px;">Antibiotic 3</th>
        <th style="border: 1px solid #000; padding: 8px;">Result</th>
    </tr>
    </thead>
    '
;

// SQL queries
$sql = "SELECT sample_id, a1.antibiotic_name AS 'Antibiotic 1', a2.antibiotic_name AS 'Antibiotic 2', a3.antibiotic_name AS 'Antibiotic 3',synergy_name, prescribed FROM 
((((results 
INNER JOIN antibiotics AS a1 ON results.antibiotic_id1 = a1.antibiotic_id)
INNER JOIN antibiotics AS a2 ON results.antibiotic_id2 = a2.antibiotic_id)
INNER JOIN antibiotics AS a3 ON results.antibiotic_id3 = a3.antibiotic_id)
INNER JOIN synergy ON results.synergy_result = synergy.synergy_id)
WHERE sample_id = $sample_id;";
$result = $link->query($sql);

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
        <td style='border: 1px solid #000; padding: 8px;'>" . $row["sample_id"] . "</td>
        <td style='border: 1px solid #000; padding: 8px;'>" . $row["Antibiotic 1"] . "</td>
        <td style='border: 1px solid #000; padding: 8px;'>" . $row["Antibiotic 2"] . "</td>
        <td style='border: 1px solid #000; padding: 8px;'>" . $row["Antibiotic 3"] . "</td>
        <td style='border: 1px solid #000; padding: 8px;'>" . $row["synergy_name"] . "</td>
        </tr>";
    }
    echo "</tbody>";
} else {
    echo "<tr><td colspan='5'>0 results</td></tr>";
}

// Close the table
echo '</table>';

// Close the database connection
$link->close();
?>