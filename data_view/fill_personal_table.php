<!-- This PHP file is used to fill the table for a doctor viewing samples they are responsible for -->
<link rel="stylesheet" href="table_styles.css">

<?php
// Start the table with some basic styling
echo '
    <div class="scrollable">
    <table>
    <thead>
    <tr>
        <th>Sample ID</th>
        <th>Date</th>
        <th>Status</th>
        <th>Hospital</th>
        <th>Strain</th>
        <th>Lab Technician</th>
    </tr>
    </thead>';
// Fill table
if ($result->num_rows > 0) {
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>
            <a href='sample_results.php?sample_id=" . $row["sample_id"] . "'>" . $row["sample_id"] . "</a>
        </td>
        <td>" . $row["date_taken"] . "</td>
        <td>" . $row["status_name"] . "</td>
        <td>" . $row["hospital_name"] . "</td>
        <td>" . $row["strain_name"] . "</td>
        <td>" . $row["lab_technician_id"] . "</td>
    </tr>";
    }
    echo "</tbody>";
} else {
    echo "<p>
    0 results
</p>";
}

// Close the table
echo '
</table>
</div>';
?>