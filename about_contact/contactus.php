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
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
    <?php require_once "../footer/footer.php"; ?>
</body>