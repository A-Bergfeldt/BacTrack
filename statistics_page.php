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
        <img src="img11.png" alt="">
        <ul>
            <li><a href ="corinne_home_page.php">Home</a></li>
            <li><a href ="about_page.php">About</a></li>
            <li><a href ="contact_page.php">Contact</a></li>
            <li><a href ="statistics_page.php">Statistics</a></li>
            <li><a href ="login.php">Login</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="slides slide1">
            <h1 style="font-size: 100px; color: #fff">Statistics page</h1>
        </div>
    </div>
    
    </body>
    </html>
