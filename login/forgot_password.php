<!DOCTYPE html>
<html>
<head>
    <title>Mina Forgot password</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="login_style.css">
</head>

<body>
    <?php require_once "../nav_bar.php"; ?> 

    <div class="loginbox">
        <h1>Forgot password?</h1>
        <form action="send_reset_link.php" method="POST">
            <div class="txt_field">
                <input type="text" name="recipient" required>
                <span></span>
                <label>Your e-mail</label>
            </div>
            <input type="hidden" name="subject" value="Password Reset">
                <input type="hidden" name="message" value="You have requested a password reset. Here is your passwrod:<br>">
            <input type="submit" name="submit" value="Send password">
        </form>
    </div>
</body>
</html>