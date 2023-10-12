<?php
session_start();

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
echo "Hurra hurra your sample has gotten the prescription";
?>