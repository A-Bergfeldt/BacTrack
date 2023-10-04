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
    <title>Mina testing doctor page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="doctor_style.css">
</head>

<body>
<nav>
    <a href="home_page.php">
        <img src="logo_main.png" alt="Logo" width="95" height="65">
    </a>
    <ul>
        <li><a href="home_page.php">Home</a></li>
        <li class="dropdown">
            <a href="about_page.php" class="dropbtn">About</a>
            <div class="dropdown-content">
                <a href="service1.php">About BacTrack</a>
                <a href="service2.php">About CombiANT</a>
                <a href="service3.php">About us</a>
            </div>
        <li class="dropdown">
        <a href ="contact_page.php" class="dropbtn">Contact</a>
        <div class="dropdown-content">
                <a href="service1.php">Contact us</a>
                <a href="service2.php">FAQ</a>
            </div>
            </li>
        <li><a href="statistics_page.php">Statistics</a></li>
        <li><a href="doctor_page.php">My Page</a></li>
    </ul>
</nav>

    <div class="container">
        <div class="slides slide1">
            <h1 style="font-size: 100px; color: #fff">Doctor's home page</h1>
        </div>
    </div>
</body>
</html>