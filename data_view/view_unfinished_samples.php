<?php
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1440)) {
    header("Location: ../login/logout.php");
}
$_SESSION['LAST_ACTIVITY'] = time();

if ($_SESSION['role_id'] != 1 && $_SESSION['role_id'] != 2 && $_SESSION['role_id'] != 3) {
    header("Location: ../login/login.php");
    exit();
}

include '../db_connection.php';

// SQL queries
$sql = "SELECT sample_id, date_taken, status_name, hospital_name, strain_name, lab_technician_id FROM (((sample 
INNER JOIN tracking ON sample.status_id = tracking.status_id) 
INNER JOIN hospital ON sample.hospital_id = hospital.hospital_id)
LEFT JOIN strain ON sample.strain_id = strain.strain_id)
WHERE doctor_id = '" . $_SESSION['user_id'] . "' AND sample.status_id < 3 
ORDER BY sample_id ASC;;"; 
$result = $db_connection->query($sql);

include '../data_view/fill_personal_table.php';

// Close the database connection
$db_connection->close();
?>