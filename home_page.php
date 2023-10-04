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
    <title>BacTrack</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="home_style_sheet.css">
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
        <li><a href="login.php">Login</a></li>
    </ul>
</nav>


    <div id="cookie-popup" class="cookie-popup">
    <p>This website uses cookies to ensure you get the best experience on our website.</p>
    <button id="accept-cookies" class="accept-cookies">Accept</button>
    </div>

    <div id="section1" class="section">
        <h1 style ='color: white'>BacTrack</h1>
        <h2 style ='color: white'>A LIMS used to track AMR</h2>
    </div>
        
    <section id='section2'>
        <div class="section-content height: auto;" >
            <p style="margin-left: 100px; font-size: 70px; ">About BacTrack</p>
            <img src="section2.jpg" alt="Desktop Image" width="550" height="500" style="float: right; margin-left: 20px; margin-top: -200px;">
            <p style="margin-left: 100px; font-size: 22px;; ">The growing problem of antibiotic resistance (AMR) poses difficulties when it comes to treating bacterial infections. Identifying the root cause of an illness at an early stage can be crucial when it comes to treating these diseases, and can result in a more effective treatment using a tailored antibiotic therapy to the specific infection.</p>
        <div>
            <div class="button-container" style="text-align: center;">
            <a href="about_page.php" class="button">Learn More</a>
        <div>
</section>

    <section id='section3'>
    <div class="section-content">
        <p style="margin-left: 600px; font-size: 70px; color: white; ">About CombiANT</p>
        <p style="margin-left: 600px; font-size: 22px;color:white; ">Combinations of antimicrobial agents are invariably prescribed for certain infectious diseases, such as tuberculosis, HIV and malaria. Bacterial infections that are not readily treatable, such as those affecting cardiac valves and prostheses, and lung infections in cystic fibrosis, are also usually subjected to a combination of antibiotics.</p>
    </div>
            <div class="button-container" style="margin-left: 800px;">
            <a href="about_page.php" class="button">Learn More</a>
        <div>
        </section>

        <section id='section4'>
    <div class="section-content">
        <p style="margin-left: 100px; font-size: 70px; color: black; ">Contact us</p>
        <p style="margin-left: 100px; font-size: 22px;color:black; ">Do you want to contact us? Click on the button below</p>
        <p style="margin-left: 100px; font-size: 22px;color:black; ">and we will try to answer as soon as possible</p>
        <img src="logo_main.png" alt="Logo" width="520" height="400" style="float: right; margin-top: -270px;">
    </div>
    <div class="button-container" style="text-align: center;">
        <a href="corre_contact_page.php" class="button">Contact us</a>
    </div>
</section>

    


        <script>
    // Function to check if user has accepted cookies
    function checkCookiesAccepted() {
        return localStorage.getItem('cookiesAccepted');
    }

    // Function to display the cookie popup
    function displayCookiePopup() {
        const cookiePopup = document.getElementById('cookie-popup');
        cookiePopup.style.display = 'block';
    }

    // Function to hide the cookie popup
    function hideCookiePopup() {
        const cookiePopup = document.getElementById('cookie-popup');
        cookiePopup.style.display = 'none';
    }

    // Function to handle cookie acceptance
    function acceptCookies() {
        localStorage.setItem('cookiesAccepted', 'true');
        hideCookiePopup();
    }

    // Check if user has already accepted cookies
    if (!checkCookiesAccepted()) {
        displayCookiePopup();
    }

    // Add an event listener to the "Accept" button
    document.getElementById('accept-cookies').addEventListener('click', acceptCookies);
</script>

</body>
</html>
