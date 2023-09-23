<!DOCTYPE html>
<html>
<head>
    <title>Forgot Your Password?</title>
</head>
<body>
    <h1>Forgot Your Password?</h1>
    <form action="send_reset_link.php" method="POST">
        <input type="text" name="recipient" placeholder="Your Email"><br><br>
        <input type="hidden" name="subject" value="Password Reset">
        <input type="hidden" name="message" value="You have requested a password reset. Here is your passwrod:<br>">
        <input type="submit" value="Send Password">
    </form>
</body>
</html>
