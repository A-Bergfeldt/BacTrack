<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contactus.css">
    <title>Contact Information - BacTrack</title>
</head>

<body>
    <?php require_once "../nav_bar.php"; ?> 
    <h1>Connect With Us</h1>
    <p class="centered-paragraph">Contact us at BacTrack for expert guidance on antibiotic combination therapies and improved healthcare outcomes</p>


    <form action="send_contact_email.php" method="POST" target="_blank">
        <label for="name">Full name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required autocomplete="name"><br><br>

        <label for="email">Email ID</label>
        <input type="email" id="email" name="email" placeholder="firstname@gmail.com" required autocomplete="email"><br><br>

        <label for="description">How may we help you?</label><br>
        <textarea id="description" name="description" rows="4" cols="50" placeholder="A detailed description" required autocomplete="description"></textarea><br><br>

        <input type="submit" value="Submit">
    </form>

    <div class="contact-info">
        <h2>General Contact Information</h2>
        <p>Company Name: BacTrack</p>
        <p>Physical Address: Lägerhyddsvägen 1, 752 37 Uppsala</p>
    </div>

    <div class="email-IDS">
        <h2>Email Addresses</h2>
        <ul>
            <li>General Contact Email: <a href="mailto:bactrack2023@gmail.com">bactrack2023@gmail.com</a></li>
        </ul>
    </div>

    <div class="social-media-links">
        <h2>Social media links</h2>
        <p><a href="https://www.linkedin.com/company/bactrack" target="_blank">LinkedIn</a></p>
        <p><a href="https://twitter.com/bactrack" target="_blank">Twitter</a></p>
        <p><a href="https://www.facebook.com/bactrack" target="_blank">Facebook</a></p>
    </div>

    <div class="Location">
        <h2>Our Location</h2>
        <p>Physical Address: Lägerhyddsvägen 1, 752 37 Uppsala</p>
        <a href="https://maps.app.goo.gl/u6PB1xFwVHq3BgyBA" target="_blank">View on Google Maps</a>
    </div>

    <div class="open-hours">
        <h2>Business Hours</h2>
        <p><b>Mon-Fri:</b> 9:00 AM - 6:00 PM</p>
        <p><b>Sat-Sun:</b> Closed</p>
    </div>


</body>