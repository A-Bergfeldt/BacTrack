<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bactrack";

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!-- This is how you comment out
how much you want
-->


<!DOCTYPE html>
<html>
<head>
    <title>Mina testing home page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="doctor_style.css">
</head>

<body>
    <?php require_once "../nav_bar.php"; ?> 
    <div class="container">
        <div class="slides slide1">
            <h1 style="font-size: 100px; color: #fff;">Hello Doctor!</h1>
        </div>
    </div>
</body>
</html>

<form action="sample_form.php" method="POST">
    <input type="submit" value="Insert new sample">
</form>

<form action="/data_view/search_all_samples_test.php" method="POST">
    <input type="submit" value="Search all samples">
</form>
