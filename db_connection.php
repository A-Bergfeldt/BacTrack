<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "root";
$db_name = "bactrack";

$db_connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$db_connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
