<!DOCTYPE html>
<html>
<head>
    <title>BacTrack</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="home_style_sheet.css">
    </head>

<body>
<?php 
require_once "../nav_bar.php";
?>

    <div id="cookie-popup" class="cookie-popup">
    <p>This website uses cookies to ensure you get the best experience on our website.</p>
    <button id="accept-cookies" class="accept-cookies">Accept</button>
    </div>

    <div id="section1" class="section">
        <p style="font-size: 50px; color: black; margin-left: 600px; margin-top: -100px;">Tracking antibiotic combination therapies for better healthcare</h1>
        <div class="button-container" style="margin-left:150px; margin-top: -30px;">
        <a href="/about_contact/contactus.php" class="button">Contact us</a>
    </div>
    </div>
        
    <section id='section2'>
        <div class="section-content height: auto;" >
            <p style="margin-left: 100px; font-size: 70px; ">About BacTrack</p>
            <img src="home_sec2.jpg" alt="Desktop Image" width="550" height="500" style="float: right; margin-left: 20px; margin-top: -200px;">
            <p style="margin-left: 100px; font-size: 22px;; ">The growing problem of antibiotic resistance (AMR) poses difficulties when it comes to treating bacterial infections. Identifying the root cause of an illness at an early stage can be crucial when it comes to treating these diseases, and can result in a more effective treatment using a tailored antibiotic therapy to the specific infection.</p>
        <div>
            <div class="button-container" style="text-align: center;">
            <a href="/about_contact/about_bactrack.php" class="button">Learn More</a>
        <div>
</section>

<section id='section3' class="section">
    <div class="section-content">
        <p style="font-size: 70px; color: black; margin-left: 600px;">About CombiANT</p>
        <div style="float: left; margin-right: 20px; margin-top: -200px;">
            <img src="doctor.jpg" alt="Desktop Image" width="600" height="600">
        </div>
        <div style="margin-left: 650px; font-size: 22px; color: black;">
            Combinations of antimicrobial agents are invariably prescribed for certain infectious diseases, such as tuberculosis, HIV and malaria. Bacterial infections that are not readily treatable, such as those affecting cardiac valves and prostheses, and lung infections in cystic fibrosis, are also usually subjected to a combination of antibiotics.
        </div>
    </div>
    <div class="button-container" style="margin-left: 825px;">
        <a href="/about_contact/about_combiant.php" class="button">Learn More</a>
    </div>
</section>


        <section id='section4'>
    <div class="section-content">
        <p style="margin-left: 100px; font-size: 70px; color: black; ">Contact us</p>
        <p style="margin-left: 100px; font-size: 22px;color:black; margin-bottom: -15px; ">Do you want to contact us? Click on the button below</p>
        <p style="margin-left: 100px; font-size: 22px;color:black; ">and we will try to answer as soon as possible</p>
        <img src="angstrom.jpg" alt="Desktop Image" width="520" height="400" style="float: right; margin-top: -270px;">
    </div>
    <div class="button-container" style="text-align: center;">
        <a href="/about_contact/contactus.php" class="button">Contact us</a>
    </div>
</section>

<footer>
        <div class="contact-bar">
            <div class="contact-info">
                <p>Email: contact@example.com</p>
                <p>Phone: (123) 456-7890</p>
            </div>
        </div>
    </footer>

    


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
