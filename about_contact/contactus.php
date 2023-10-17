<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap">
    <link rel="stylesheet" href="contactus.css">
    <style>
        #description {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <title>Contact Information - BacTrack</title>
</head>

<body>
    <?php require_once "../nav_bar.php"; ?> 
    </br></br></br>
    <h1 class="centered-paragraph">Contact us at BacTrack</h1>

    <form action="send_contact_email.php" method="POST" target="_self">
        <label for="name" style="font-weight: bold; font-size: 70%;">Full Name or Company Name</label>
        <input type="text" id="name" name="name" placeholder="Enter name" required autocomplete="name"><br>

        <label for="email" style="font-weight: bold; font-size: 70%;">Email</label>
        <input type="email" id="email" name="email" placeholder="example@mail.com" required autocomplete="email"><br>

        <label for="description" style="font-weight: bold; font-size: 70%;">How may we help you?</label>
        <textarea id="description" name="description" rows="4" cols="50" placeholder="Reason for contacting us" required autocomplete="description"></textarea><br>

        <input type="submit" class="submit-button" value="Submit">
    </form>

    <br><br><br><br><br><br><br><br>

    <?php require_once "../footer/footer.php"; ?>
</body>
</html>