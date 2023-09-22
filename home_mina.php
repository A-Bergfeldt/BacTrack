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
    <link rel="stylesheet" href="style_mina.css">
    </head>

<body>
    <nav>
        <div class="logo">Web Bignner</div>
        <ul>
            <li><a href ="#">Home</a></li>
            <li><a href ="#">About</a></li>
            <li><a href ="#">Contact</a></li>
            <li><a href ="#">Statistics</a></li>
            <li><a href ="#">Login</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="slides">
        <p>
        <font size="10">
        BacTrack
        </font>
        </p>

        </div>
        <div class="slides">
            <h1>About BacTrack</h1>
        </div>
        <div class="slides">
            <h1>About CombiANT</h1>
        </div>
    </div>
    
    </body>
    </html>
