<?php
require_once '../nav_bar.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Password changed</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="/login/style_sheet.css">
</head>

<body>
    <div class="loginbox">
        <h1>Thank you</h1>
        <h2>Your new password has been saved</h2>
        <form action="/login/login.php" method="action">
            <input type="submit" value="Go to login">
        </form>
    </div>
</body>
</htm