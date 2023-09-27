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
    <link rel="stylesheet" href="style_mina.css">
    </head>

<body>
    <nav>
        <div class="logo">Logo here</div>
        <ul>
            <li><a href ="home_mina.php">Home</a></li>
            <li><a href ="about_mina.php">About</a></li>
            <li><a href ="contact_mina.php">Contact</a></li>
            <li><a href ="statistics_mina.php">Statistics</a></li>
            <li><a href ="login.php">Login</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="slides slide_home">
            <h1 style="font-size: 100px; color: #fff">Bactrack</h1>
        </div>
        <div class="slides slide2">
            <h1 style="font-size: 50px">About BacTrack</h1>
        </div>
        <div class="slides slide2">
            <h1 style="font-size: 50px">About CombiANT</h1>
        </div>
    </div>
    
</body>
</html>
