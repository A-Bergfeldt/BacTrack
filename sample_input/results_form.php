<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "BacTrack";

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname);

// Check if connection is established
if (mysqli_connect_error()) {
  die("Connection failed: " . mysqli_connect_error());
}

// Select all antibiotics, synergy results and strains then close database connection
$sql_antibiotics = "SELECT * FROM Antibiotics";
$result_antibiotics = $link->query($sql_antibiotics);
$sql_synergy = "SELECT * FROM Synergy";
$result_synergy = $link->query($sql_synergy);
$sql_strain = "SELECT * FROM Strain";
$result_strain = $link->query($sql_strain);
$sql_sample = "SELECT sample_id FROM Sample WHERE status_id != 1";
$result_sample = $link->query($sql_sample);

$link->close();

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
$samples = $result_sample->fetch_all(MYSQLI_ASSOC);
?>



<p>Please enter your identification results here:</p>

<form action="" method="POST">
  Lab technician ID: <input name="lab_technician_id"><br> <!-- This should be stored automatically -->
  Sample ID:
  <select name="sample_id" required>
    <option disabled selected value> -- Select a sample ID -- </option>
    <?php foreach ($samples as $sample): ?>
      <option value=<?php echo $sample['sample_id']; ?>><?php echo $sample['sample_id']; ?></option>
    <?php endforeach ?>
  </select><br>
  Strain:
  <select name="strain" required>
    <option disabled selected value> -- Select a strain -- </option>
    <?php foreach ($strainArray as $strain_id => $strain_name): ?>
      <option value=<?php echo $strain_id; ?>><?php echo $strain_name; ?></option>
    <?php endforeach ?>
  </select><br>
  <input type="submit" value="Add">
</form>


<p>Please enter your resistance results here:</p>

<form action="" method="POST">
  Sample ID:
  <select name="sample_id" required>
    <option disabled selected value> -- Select a sample ID -- </option>
    <?php foreach ($samples as $sample): ?>
      <option value=<?php echo $sample['sample_id']; ?>><?php echo $sample['sample_id']; ?></option>
    <?php endforeach ?>
  </select><br>
  Antibiotic 1:
  <select name="antibiotic1" required>
    <option disabled selected value> -- Select an antibiotic -- </option>
    <?php foreach ($antibioticArray as $antibiotic_id => $antibiotic_name): ?>
      <option value=<?php echo $antibiotic_id; ?>><?php echo $antibiotic_name; ?></option>
    <?php endforeach ?>
  </select><br>
  Antibiotic 2:
  <select name="antibiotic2" required>
    <option disabled selected value> -- Select an antibiotic -- </option>
    <?php foreach ($antibioticArray as $antibiotic_id => $antibiotic_name): ?>
      <option value=<?php echo $antibiotic_id; ?>><?php echo $antibiotic_name; ?></option>
    <?php endforeach ?>
  </select><br>
  Antibiotic 3:
  <select name="antibiotic3" required>
    <option disabled selected value> -- Select an antibiotic -- </option>
    <?php foreach ($antibioticArray as $antibiotic_id => $antibiotic_name): ?>
      <option value=<?php echo $antibiotic_id; ?>><?php echo $antibiotic_name; ?></option>
    <?php endforeach ?>
  </select><br>
  Result:
  <select name="synergy_results" required>
    <option disabled selected value> -- Select a result -- </option>
    <?php foreach ($synergyArray as $synergy_id => $synergy_name): ?>
      <option value=<?php echo $synergy_id; ?>><?php echo $synergy_name; ?></option>
    <?php endforeach ?>
  </select><br>
  <input type="submit" value="Add">
</form>