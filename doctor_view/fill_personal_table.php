<?php
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
    ';
// Fill table
if ($result->num_rows > 0) {
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
?>