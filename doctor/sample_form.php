<?php
session_start();
require_once '../db_connection.php';

if ($_SESSION['role_id'] != 1 && $_SESSION['role_id'] != 3) {
    header("Location: ../home_page.php");
    exit();
}

// Select all hospitals then close database connection
$sql_hospital = "SELECT * FROM Hospital";
$result_hospital = $db_connection->query($sql_hospital);
$db_connection->close();

// Store the hospitals in an associative array
$hospitalArray = array();
while ($row = $result_hospital->fetch_assoc())
  $hospitalArray[$row['hospital_id']] = $row['hospital_name'];
?>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<p>Please enter your sample information here:</p>

<form action="insert_sample_data.php" method="POST">
    Date:<input name="date" type="date" value="<?php echo date('Y-m-d'); ?>" required><br>
    Hospital:
    <select name="hospital" id="hospital" required>
        <option disabled selected value>---</option>
        <?php foreach ($hospitalArray as $hospital_id => $hospital_name): ?>
            <option value=<?php echo $hospital_id; ?>><?php echo $hospital_name; ?></option>
        <?php endforeach ?>
    </select><br>
    <input type="submit" value="Add">
</form>

<!-- JavaScript to initialize Select2 -->
<script>
    $(document).ready(function () {
        $('#hospital').select2();
    });
</script>