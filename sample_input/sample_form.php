<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bactrack";

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname);

// Check if connection is established
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select all antibiotics and hospitals then close database connection
$sql_antibiotics = "SELECT * FROM Antibiotics";
$result_antibiotics = $link->query($sql_antibiotics);
$sql_hospital = "SELECT * FROM Hospital";
$result_hospital = $link->query($sql_hospital);
$link->close();

// Store the antibiotics and hospitals in associative arrays
$antibioticArray = array();
while ($row = $result_antibiotics->fetch_assoc())
    $antibioticArray[$row['antibiotic_id']] = $row['antibiotic_name'];
$hospitalArray = array();
while ($row = $result_hospital->fetch_assoc())
  $hospitalArray[$row['hospital_id']] = $row['hospital_name'];
?>


<p>Please enter your sample information here:</p>

<form action="" method="POST">
    Date:<input name="date" type="date" required><br>
    Doctor ID:<input name="user_id"><br> <!-- This should be stored automatically -->
    Prescription: 
    <select name="prescription" required>
        <option disabled selected value> -- Select an antibiotic -- </option>
        <?php foreach ($antibioticArray as $antibiotic_id => $antibiotic_name): ?>
            <option value=<?php echo $antibiotic_id; ?>><?php echo $antibiotic_name; ?></option>
        <?php endforeach ?>
    </select><br>
    Hospital:
    <select name="hospital" required>
        <option disabled selected value> -- Select a hosptal -- </option>
        <?php foreach ($hospitalArray as $hospital_id => $hospital_name): ?>
            <option value=<?php echo $hospital_id; ?>><?php echo $hospital_name; ?></option>
        <?php endforeach ?>
    </select><br>
    <input type="submit" value="Add">
</form>