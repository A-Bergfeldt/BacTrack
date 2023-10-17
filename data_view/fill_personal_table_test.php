<!-- This PHP file is used to fill the table for a doctor viewing samples they are responsible for -->
<link rel="stylesheet" href="table_styles.css">

<?php
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1440)) {
    header("Location: ../login/logout.php");
}
$_SESSION['LAST_ACTIVITY'] = time();

if ($_SESSION['role_id'] != 1 && $_SESSION['role_id'] != 3) {
    header("Location: ../login/login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Search all samples</title>
  <script src="multiselect-dropdown.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
  <link rel="stylesheet" href="/data_view/table_styles.css">

</head>
<body>
    <main class="table">
        <section class="table_header">
            <h1>Samples</h1>
        </section>
        <section class="table_body">
            <table>
                <thead>
                    <tr>
                        <th>Sample ID<span class="icon-arrow">&DownArrow;</span></th>
                        <th>Date<span class="icon-arrow">&DownArrow;</span></th>
                        <th>Status<span class="icon-arrow">&DownArrow;</span></th>
                        <th>Hospital<span class="icon-arrow">&DownArrow;</span></th>
                        <th>Strain<span class="icon-arrow">&DownArrow;</span></th>
                        <th>Doctor<span class="icon-arrow">&DownArrow;</span></th>
                        <th>Lab Technician<span class="icon-arrow">&DownArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($_GET) != 0) {
                        $sql = "SELECT sample_id, date_taken, status_name, hospital_name, strain_name, doctor_id, lab_technician_id FROM (((sample 
                        INNER JOIN tracking ON sample.status_id = tracking.status_id) 
                        INNER JOIN hospital ON sample.hospital_id = hospital.hospital_id)
                        LEFT JOIN strain ON sample.strain_id = strain.strain_id) "
                            . $whereStatements .
                            " ORDER BY sample_id ASC;";
                        $result = $db_connection->query($sql);

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                            <td>
                                <a href='sample_results.php?sample_id=" . $row["sample_id"] . "'>" . $row["sample_id"] . "</a>
                            </td>
                            <td>" . $row["date_taken"] . "</td>
                            <td>" . $row["status_name"] . "</td>
                            <td>" . $row["hospital_name"] . "</td>
                            <td>" . $row["strain_name"] . "</td>
                            <td>" . $row["doctor_id"] . "</td>
                            <td>" . $row["lab_technician_id"] . "</td>
                            </tr>";
                        }

                        $result->free_result();
                        $db_connection->close();
                    } 
                        
                    else {
                        echo "<tr><td colspan='7'>0 results</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    <?php> require_once "../nav_bar.php"; ?>
</body>
</html>

