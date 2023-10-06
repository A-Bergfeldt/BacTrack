<!DOCTYPE html>
<html>
<head>
    <title>My BacTrack Web App</title>
    <!-- Add your CSS styles here -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" type="text/css" href="lab_tech_style.css">
</head>
  <body>
    <?php require_once '../nav_bar.php'; ?>
  </body>
</html>


<?php
require_once "../db_connection.php";

// Select all antibiotics, synergy results and strains then close database connection
$sql_antibiotics = "SELECT * FROM Antibiotics";
$result_antibiotics = $db_connection->query($sql_antibiotics);
$sql_synergy = "SELECT * FROM Synergy";
$result_synergy = $db_connection->query($sql_synergy);
$sql_strain = "SELECT * FROM Strain";
$result_strain = $db_connection->query($sql_strain);
$sql_sample_strain = "SELECT sample_id FROM Sample WHERE status_id = 1";
$result_sample_strain = $db_connection->query($sql_sample_strain);
$sql_sample_antibiotics = "SELECT sample_id FROM Sample WHERE status_id = 2";
$result_sample_antibiotics = $db_connection->query($sql_sample_antibiotics);



// Store the antibiotics, synergy results and strains in associative arrays
$antibioticArray = array();
while ($row = $result_antibiotics->fetch_assoc())
  $antibioticArray[$row['antibiotic_id']] = $row['antibiotic_name'];
$synergyArray = array();
while ($row = $result_synergy->fetch_assoc())
  $synergyArray[$row['synergy_id']] = $row['synergy_name'];
$strainArray = array();
while ($row = $result_strain->fetch_assoc())
  $strainArray[$row['strain_id']] = $row['strain_name'];
$sample_strain = $result_sample_strain->fetch_all(MYSQLI_ASSOC);
$sample_antibiotics = $result_sample_antibiotics->fetch_all(MYSQLI_ASSOC);
?>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Import function to disable options -->
<script src="disable_options.js"></script>
<br>
<br>
<br>

<form action="insert_results_strain.php" method="POST">
<p class="center-text">Enter your identification results here</p> <!-- This should be stored automatically -->
  Sample ID:
  
  <select name="sample_id" id="sample_id_strain" required class="center-text">
    <option disabled selected value> --- </option>
    <?php foreach ($sample_strain as $sample): ?>
      <option value=<?php echo $sample['sample_id']; ?>><?php echo $sample['sample_id']; ?></option>
    <?php endforeach ?>
  </select><br>
  Strain:
  <select name="strain" id="strain" required>
    <option disabled selected value> --- </option>
    <?php foreach ($strainArray as $strain_id => $strain_name): ?>
      <option value=<?php echo $strain_id; ?>><?php echo $strain_name; ?></option>
    <?php endforeach ?>
  </select><br>
  <input type="submit" value="Add">
</form>


<form action="insert_results_antibiotics.php" method="POST">
<p class="center-text">Enter your resistance results here</p>
  Sample ID:
  <select name="sample_id" id="sample_id_antibiotic" required>
    <option disabled selected value> --- </option>
    <?php foreach ($sample_antibiotics as $sample): ?>
      <option value=<?php echo $sample['sample_id']; ?>><?php echo $sample['sample_id']; ?></option>
    <?php endforeach ?>
  </select><br>
  Antibiotic 1:
  <select name="antibiotic1" id="antibiotic1" class="antibiotic-dropdown" required onchange=disable_options(this)>
    <option disabled selected value> --- </option>
    <?php foreach ($antibioticArray as $antibiotic_id => $antibiotic_name): ?>
      <option value=<?php echo $antibiotic_id; ?>><?php echo $antibiotic_name; ?></option>
    <?php endforeach ?>
  </select><br>
  Antibiotic 2:
  <select name="antibiotic2" id="antibiotic2" class="antibiotic-dropdown" required onchange=disable_options(this)>
    <option disabled selected value> --- </option>
    <?php foreach ($antibioticArray as $antibiotic_id => $antibiotic_name): ?>
      <option value=<?php echo $antibiotic_id; ?>><?php echo $antibiotic_name; ?></option>
    <?php endforeach ?>
  </select><br>
  Antibiotic 3:
  <select name="antibiotic3" id="antibiotic3" class="antibiotic-dropdown" required onchange=disable_options(this)>
    <option disabled selected value> --- </option>
    <?php foreach ($antibioticArray as $antibiotic_id => $antibiotic_name): ?>
      <option value=<?php echo $antibiotic_id; ?>><?php echo $antibiotic_name; ?></option>
    <?php endforeach ?>
  </select><br>
  Result:
  <select name="synergy_results" id="synergy_results" required>
    <option disabled selected value> --- </option>
    <?php foreach ($synergyArray as $synergy_id => $synergy_name): ?>
      <option value=<?php echo $synergy_id; ?>><?php echo $synergy_name; ?></option>
    <?php endforeach ?>
  </select><br>
  <input type="submit" value="Add">
</form>


<form action="finished_sample.php" method="POST">
<p class="center-text">Are you done working with a sample?:</p>
  Sample ID:
  <select name="sample_id" id="sample_id_finished" required>
    <option disabled selected value> --- </option>
    <?php foreach ($sample_antibiotics as $sample): ?>
      <option value=<?php echo $sample['sample_id']; ?>><?php echo $sample['sample_id']; ?></option>
    <?php endforeach ?>
  </select><br>
  <input type="submit" value="Analytics finished">
</form>

<!-- JavaScript to initialize Select2 -->
<script>
  $(document).ready(function () {
    // Initialize Select2 on the prescription and hospital select elements
    $('#sample_id_strain').select2();
    $('#strain').select2();
    $('#sample_id_antibiotic').select2();
    $('#antibiotic1').select2();
    $('#antibiotic2').select2();
    $('#antibiotic3').select2();
    $('#synergy_results').select2();
    $('#sample_id_finished').select2();
  });
</script>

