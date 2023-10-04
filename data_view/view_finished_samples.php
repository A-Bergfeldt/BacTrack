<?php
include '../db_connection.php';

// SQL queries
$sql = "SELECT sample_id, date_taken, status_name, hospital_name, strain_name, lab_technician_id FROM (((sample 
INNER JOIN tracking ON sample.status_id = tracking.status_id) 
INNER JOIN hospital ON sample.hospital_id = hospital.hospital_id)
LEFT JOIN strain ON sample.strain_id = strain.strain_id)
WHERE doctor_id = 'Simon_Oscarson' AND sample.status_id = 4
ORDER BY sample_id ASC;"; // TODO: Remove hard-coding of doctor_id
$result = $db_connection->query($sql);

include 'fill_personal_table.php';

// Close the database connection
$db_connection->close();
?>