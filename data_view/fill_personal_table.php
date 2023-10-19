<!-- This PHP file is used to fill the table for a doctor viewing samples they are responsible for -->
<link rel="stylesheet" href="harry_styles.css">

<?php
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1440)) {
    header("Location: ../login/logout.php");
}
$_SESSION['LAST_ACTIVITY'] = time();

if ($_SESSION['role_id'] != 2 && $_SESSION['role_id'] != 3) {
    header("Location: ../login/login.php");
    exit();
}

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
            <a href='/data_view/sample_results.php?sample_id=" . $row["sample_id"] . "'>" . $row["sample_id"] . "</a>
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