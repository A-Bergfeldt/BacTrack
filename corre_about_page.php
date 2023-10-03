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
    <link rel="stylesheet" href="corinne_style_sheet.css">
    </head>

<body>
    <nav>
        <!--<div class="logo">Logo here</div>-->
        <a href="corre_home_page.php">
        <img src="logo_main.png" alt="Logo" width="95" height="65">
        </a>
        <ul>
        <li><a href ="corre_home_page.php">Home</a></li>
            <li><a href ="about_page.php">About</a></li>
            <li><a href ="corre_contact_page.php">Contact</a></li>
            <li><a href ="corre_statistics_page.php">Statistics</a></li>
            <li><a href ="login.php">Login</a></li>
        </ul>
    </nav>
    <div id="section1" class="section">
        <h1 style ='color: white'>About BacTrack</h1>
    </div>
    
    </body>
    </html>
