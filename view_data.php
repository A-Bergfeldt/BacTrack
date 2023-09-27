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


// Start the table with some basic styling
echo '<table style="width: 100%; border-collapse: collapse;">
    <thead>
    <tr>
        <th style="border: 1px solid #000; padding: 8px;">Sample ID</th>
        <th style="border: 1px solid #000; padding: 8px;">Date</th>
        <th style="border: 1px solid #000; padding: 8px;">Status</th>
        <th style="border: 1px solid #000; padding: 8px;">Hospital</th>
        <th style="border: 1px solid #000; padding: 8px;">Strain</th>
        <th style="border: 1px solid #000; padding: 8px;">Lab Technician</th>
    </tr>
    </thead>
    '
;

// SQL queries
$sql = "SELECT sample_id, date_taken, status_name, hospital_name, strain_name, lab_technician_id FROM (((sample 
INNER JOIN tracking ON sample.status_id = tracking.status_id) 
INNER JOIN hospital ON sample.hospital_id = hospital.hospital_id)
LEFT JOIN strain ON sample.strain_id = strain.strain_id)
WHERE doctor_id = 'Simon_Oscarson';"; // TODO: Remove hard-coding of doctor_id
$result = $link->query($sql);

// Fill table
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tbody>
                <tr>
                <td style='border: 1px solid #000; padding: 8px;'>" . $row["sample_id"] . "</td>
                <td style='border: 1px solid #000; padding: 8px;'>" . $row["date_taken"] . "</td>
                <td style='border: 1px solid #000; padding: 8px;'>" . $row["status_name"] . "</td>
                <td style='border: 1px solid #000; padding: 8px;'>" . $row["hospital_name"] . "</td>
                <td style='border: 1px solid #000; padding: 8px;'>" . $row["strain_name"] . "</td>
                <td style='border: 1px solid #000; padding: 8px;'>" . $row["lab_technician_id"] . "</td>
            </tr>
            </tbody>";
    }
} else {
    echo "<tr><td colspan='5'>0 results</td></tr>";
}

// Close the table
echo '</table>';

// Close the database connection
$link->close();
?>