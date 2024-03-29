<?php
require_once '../nav_bar.php';
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1440)) {
    header("Location: ../login/logout.php");
}
$_SESSION['LAST_ACTIVITY'] = time();

if ($_SESSION['role_id'] != 1 && $_SESSION['role_id'] != 3) {
    header("Location: ../login/login.php");
    exit();
}

$sample_id = $_GET["sample_id"];
$antibiotic1 = $_GET["antibiotic1"];
$antibiotic2 = $_GET["antibiotic2"];
$antibiotic3 = $_GET["antibiotic3"];

include '../db_connection.php';
$sqlUpdatePrescribed = "UPDATE results SET prescribed=true WHERE sample_id = $sample_id;";
$sqlUpdateStatus = "UPDATE sample SET status_id=4 WHERE sample_id = $sample_id;";

$db_connection->query($sqlUpdatePrescribed);
$db_connection->query($sqlUpdateStatus);
echo "Sample ID: " . $sample_id . ", has been prescribed: " . $antibiotic1 . ", " . $antibiotic2 . ", " . $antibiotic3;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgot password</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="/login/style_sheet.css">
</head>

<body>
    <div class="loginbox">
        <h1>Sample <?php echo $_GET['sample_id'] ?> prescribed </h1>
        <h2 style="font-size: 16px;">The precribed antibiotics were:</br>
        <?php echo $_GET['antibiotic1'] ?></br>
        <?php echo $_GET['antibiotic2'] ?></br>
        <?php echo $_GET['antibiotic3'] ?></br>
        </h2>
        <form action="/doctor/doctor_page.php" method="action">
            <input type="submit" value="My page">
        </form>
    </div>
</body>
</htm