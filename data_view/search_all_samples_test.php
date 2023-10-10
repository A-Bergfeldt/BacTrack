<?php
include '../db_connection.php';

$sqlDoctors = "SELECT user_id FROM users WHERE users.role_id = 1;";
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

<br>
<br>
<br>

<!DOCTYPE html>
<html>
<head>
  <title>Search all samples</title>
  <script src="multiselect-dropdown.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
  <link rel="stylesheet" href="/data_view/table_styles.css">

</head>

<body>
  <?php require_once "../nav_bar.php"; ?> 
  <div class="container">
    <div class="alter_box">
      <p>Enter your search</p>
      <form method="GET" action="search_all_samples.php">

        <label for="search">Sample ID: </label>
        <select name="search_sample[]" multiple multiselect-search="true" multiselect-select-all="true"
          multiselect-max-items="1" style="width: 100px;">
          <?php foreach ($sample as $row): ?>
            <option value=<?php echo $row['sample_id']; ?>><?php echo $row['sample_id']; ?></option>
          <?php endforeach ?>
        </select>
        <br>

        <label for="search">Status: </label>
        <select name="search_status[]" multiple multiselect-search="true" multiselect-select-all="true"
          multiselect-max-items="1" style="width: 100px;">
          <?php foreach ($status as $row): ?>
            <option value=<?php echo $row['status_name']; ?>><?php echo $row['status_name']; ?></option>
          <?php endforeach ?>
        </select>
        <br>

        <label for="search">Hospital: </label>
        <select name="search_hospital[]" multiple multiselect-search="true" multiselect-select-all="true"
          multiselect-max-items="1" style="width: 150px;">
          <?php foreach ($hospital as $row): ?>
            <option value=<?php echo str_replace(" ", "_", $row['hospital_name']); ?>><?php echo $row['hospital_name']; ?>
            </option>
          <?php endforeach ?>
        </select>

        <br>

        <label for="search">Strain: </label>
        <select name="search_strain[]" multiple multiselect-search="true" multiselect-select-all="true"
          multiselect-max-items="1" style="width: 100px;">
          <?php foreach ($strain as $row): ?>
            <option value=<?php echo str_replace(" ", "_", $row['strain_name']); ?>><?php echo $row['strain_name']; ?></option>
          <?php endforeach ?>
        </select>
        <br>

        <label for="search">Doctor: </label>
        <select name="search_doctor[]" multiple multiselect-search="true" multiselect-select-all="true"
          multiselect-max-items="1" style="width: 200px;">
          <?php foreach ($doctors as $row): ?>
            <option value=<?php echo str_replace(" ", "_", $row['user_id']); ?>><?php echo $row['user_id']; ?></option>
          <?php endforeach ?>
        </select>
        <br>

        <label for="search">Lab Technician: </label>
        <select name="search_lab_technician[]" multiple multiselect-search="true" multiselect-select-all="true"
          multiselect-max-items="1" style="width: 200px;">
          <?php foreach ($labTechnicians as $row): ?>
            <option value=<?php echo str_replace(" ", "_", $row['user_id']); ?>><?php echo $row['user_id']; ?></option>
          <?php endforeach ?>
        </select>

        <br>
        <input type="submit" value="Search">
    </form>
    </div>
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
            $dropdownNames = array(
              "search_sample" => "sample_id",
              "search_status" => "status_name",
              "search_hospital" => "hospital_name",
              "search_strain" => "strain_name",
              "search_doctor" => "doctor_id",
              "search_lab_technician" => "lab_technician_id"
            );

            $whereStatements = "WHERE ";
            foreach ($dropdownNames as $searchName => $sqlName) {
              if (isset($_GET[$searchName])) {
                if ($whereStatements != "WHERE ") {
                  $whereStatements .= " and ";
                }
                if ($searchName == "search_strain" or $searchName == "search_hospital") {
                  $_GET[$searchName] = str_replace("_", " ", $_GET[$searchName]);
                }
                $whereStatements .= $sqlName . " IN ('" . implode("', '", $_GET[$searchName]) . "')";
              }
            }

            if ($whereStatements == "WHERE ") {
              $whereStatements = "";
            }

            $statusSearch = implode("', '", array('Hospital', 'Analyzed')); // Enclose each status name in single quotes

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
            } else {
              echo "<tr><td colspan='7'>0 results</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </section>
    </main>
  </div>

</body>
</html>


