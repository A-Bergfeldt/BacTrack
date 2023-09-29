<!-- Create search form -->
<script src="multiselect-dropdown.js"></script>

<?php
include '../db_connection.php';

$sqlDoctors = "SELECT user_id FROM users;";
$resultDoctors = $db_connection->query($sqlDoctors);
$doctors = $resultDoctors->fetch_all(MYSQLI_ASSOC);

$sqlLabTechnicians = "SELECT user_id FROM users WHERE users.role_id = 2;";
$resultLabTechnicians = $db_connection->query($sqlLabTechnicians);
$labTechnicians = $resultLabTechnicians->fetch_all(MYSQLI_ASSOC);

$sqlSample = "SELECT sample_id from sample;";
$resultSample = $db_connection->query($sqlSample);
$sample = $resultSample->fetch_all(MYSQLI_ASSOC);

$sqlStatus = "SELECT status_name from tracking;";
$resultStatus = $db_connection->query($sqlStatus);
$status = $resultStatus->fetch_all(MYSQLI_ASSOC);

$sqlHospital = "SELECT hospital_name from hospital;";
$resultHospital = $db_connection->query($sqlHospital);
$hospital = $resultHospital->fetch_all(MYSQLI_ASSOC);

$sqlStrain = "SELECT strain_name from strain;";
$resultStrain = $db_connection->query($sqlStrain);
$strain = $resultStrain->fetch_all(MYSQLI_ASSOC);
?>

<p>Enter your search</p>
<form method="GET" action="search_all_samples.php">

  <label for="search">Sample ID: </label>
  <select name="search_sample" multiple multiselect-search="true" multiselect-select-all="true"
    multiselect-max-items="1" style="width: 100px;">
    <?php foreach ($sample as $row): ?>
      <option value=<?php echo $row['sample_id']; ?>><?php echo $row['sample_id']; ?></option>
    <?php endforeach ?>
  </select>
  <br>

  <label for="search">Date: </label>
  <input type="date">
  <br>

  <label for="search">Status: </label>
  <select name="search_sample" multiple multiselect-search="true" multiselect-select-all="true"
    multiselect-max-items="1" style="width: 100px;">
    <?php foreach ($status as $row): ?>
      <option value=<?php echo $row['status_name']; ?>><?php echo $row['status_name']; ?></option>
    <?php endforeach ?>
  </select>
  <br>

  <label for="search">Hospital: </label>
  <select name="search_sample" multiple multiselect-search="true" multiselect-select-all="true"
    multiselect-max-items="1" style="width: 150px;">
    <?php foreach ($hospital as $row): ?>
      <option value=<?php echo $row['hospital_name']; ?>><?php echo $row['hospital_name']; ?></option>
    <?php endforeach ?>
  </select>

  <br>

  <label for="search">Strain: </label>
  <select name="search_sample" multiple multiselect-search="true" multiselect-select-all="true"
    multiselect-max-items="1" style="width: 100px;">
    <?php foreach ($strain as $row): ?>
      <option value=<?php echo $row['strain_name']; ?>><?php echo $row['strain_name']; ?></option>
    <?php endforeach ?>
  </select>
  <br>

  <label for="search">Doctor: </label>
  <select name="search_sample" multiple multiselect-search="true" multiselect-select-all="true"
    multiselect-max-items="1" style="width: 200px;">
    <?php foreach ($doctors as $row): ?>
      <option value=<?php echo $row['user_id']; ?>><?php echo $row['user_id']; ?></option>
    <?php endforeach ?>
  </select>
  <br>

  <label for="search">Lab Technician: </label>
  <select name="search_sample" multiple multiselect-search="true" multiselect-select-all="true"
    multiselect-max-items="1" style="width: 200px;">
    <?php foreach ($labTechnicians as $row): ?>
      <option value=<?php echo $row['user_id']; ?>><?php echo $row['user_id']; ?></option>
    <?php endforeach ?>
  </select>

  <br>
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