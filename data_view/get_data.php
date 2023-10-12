<?php
// Your database connection code here
// Database connection parameters

session_start();

if ($_SESSION['role_id'] != 1 && $_SESSION['role_id'] != 3) {
    header("Location: ../login/login.php");
    exit();
}

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

$sql = "SELECT * FROM sample";
$stmt = $link->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
echo json_encode($data);
?>