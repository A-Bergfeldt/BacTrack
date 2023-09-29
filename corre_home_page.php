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
        <div class="logo">Logo here</div>
        <ul>
            <li><a href ="home_page.php">Home</a></li>
            <li><a href ="about_page.php">About</a></li>
            <li><a href ="contact_page.php">Contact</a></li>
            <li><a href ="statistics_page.php">Statistics</a></li>
            <li><a href ="login.php">Login</a></li>
        </ul>
    </nav>

    <div id="section1" class="section">
        <h1 style ='color: white'>BacTrack</h1>
        <h2 style ='color: white'>A LIMS used to track AMR</h2>
    </div>
        
    <section id='section2'>
        <div class="section-content height: auto;" >
            <p style="margin-left: 100px; font-size: 70px; ">About BacTrack</p>
            <img src="section2.jpg" alt="Desktop Image" width="550" height="500" style="float: right; margin-left: 20px; margin-top: -200px;">
            <p style="margin-left: 100px; font-size: 22px;; ">The growing problem of antibiotic resistance (AMR) poses difficulties when it comes to treating bacterial infections. Identifying the root cause of an illness at an early stage can be crucial when it comes to treating these diseases, and can result in a more effective treatment using a tailored antibiotic therapy to the specific infection. This is made possible by a new technique called CombiANT developed by the research group RxDynamics at Uppsala Antibiotic Center (UAC).</p>
        <div>
            <div class="button-container">
            <a href="about_page.php" class="button">Learn More</a>
        <div>
</section>

    <section id='section3'>
    <div class="section-content">
        <p style="margin-left: 600px; font-size: 70px; color: white; ">About CombiANT</p>
        <p style="margin-left: 600px; font-size: 22px;color:white; ">Combinations of antimicrobial agents are invariably prescribed for certain infectious diseases, such as tuberculosis, HIV and malaria. Bacterial infections that are not readily treatable, such as those affecting cardiac valves and prostheses, and lung infections in cystic fibrosis, are also usually subjected to a combination of antibiotics.</p>
    </div>
    
</section>


    
</body>
</html>
