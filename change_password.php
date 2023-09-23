<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
</head>
<body>
    <h1>Change Password</h1>
    <form action="update_password.php" method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
        <input type="password" name="new_password" placeholder="New Password"><br><br>
        <input type="password" name="confirm_password" placeholder="Confirm New Password"><br><br>
        <input type="submit" value="Change Password">
    </form>
</body>
</html>
