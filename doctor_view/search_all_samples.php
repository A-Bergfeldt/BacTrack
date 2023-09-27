<!-- Create search form -->
<form method="GET" action="search_all_samples.php">
  <label for="search">Search for samples: </label>
  <input type="text" id="search" name="search">
  <input type="submit" value="Search">
</form>

<?php
include '../db_connection.php';

// SQL query
$search = null;
if (count($_GET) != 0) {
  $search = $_GET['search'];
  $sql = "SELECT sample_id, date_taken, status_name, hospital_name, strain_name, doctor_id,lab_technician_id FROM (((sample 
  INNER JOIN tracking ON sample.status_id = tracking.status_id) 
  INNER JOIN hospital ON sample.hospital_id = hospital.hospital_id)
  LEFT JOIN strain ON sample.strain_id = strain.strain_id)
  WHERE sample_id LIKE '%$search%' or date_taken LIKE '%$search%' or status_name LIKE '%$search%' or hospital_name LIKE '%$search%' or strain_name LIKE '%$search%' or doctor_id LIKE '%$search%' or lab_technician_id LIKE '%$search%'
  ORDER BY sample_id ASC;";
  $result = $db_connection->query($sql);
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
        <th style="border: 1px solid #000; padding: 8px;">Doctor</th>
        <th style="border: 1px solid #000; padding: 8px;">Lab Technician</th>
    </tr>
    </thead>
    ';
// Fill table
if ($search && $result->num_rows > 0) {
  echo "<tbody>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td style='border: 1px solid #000; padding: 8px;'>
            <a href='sample_results.php?sample_id=" . $row["sample_id"] . "'>" . $row["sample_id"] . "</a>
        </td>
        <td style='border: 1px solid #000; padding: 8px;'>" . $row["date_taken"] . "</td>
        <td style='border: 1px solid #000; padding: 8px;'>" . $row["status_name"] . "</td>
        <td style='border: 1px solid #000; padding: 8px;'>" . $row["hospital_name"] . "</td>
        <td style='border: 1px solid #000; padding: 8px;'>" . $row["strain_name"] . "</td>
        <td style='border: 1px solid #000; padding: 8px;'>" . $row["doctor_id"] . "</td>
        <td style='border: 1px solid #000; padding: 8px;'>" . $row["lab_technician_id"] . "</td>
        </tr>";
  }
  echo "</tbody>";
} else {
  echo "<tr>
    <td colspan='5'>0 results</td>
</tr>";
}

// Close the table
echo '</table>';
$db_connection->close();
?>