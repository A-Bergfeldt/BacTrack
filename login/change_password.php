<!DOCTYPE html>
<html>
<head>
    <title>Mina Forgot Password</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="style_sheet.css">

</head>

<body>
    <?php require_once "../nav_bar.php"; ?> 

    <div class="loginbox">
        <h1>Reset Your Password</h1>
        <form action="update_password.php" method="POST">
            <div class="txt_field">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
                <input type="password" name="new_password" id="new_password" required>
                <label for="new_password">New Password</label>
            </div>
            <div class="txt_field">
                <input type="password" name="confirm_password" id="confirm_password" required>
                <label for="confirm_password">Confirm New Password</label>
            </div>
            <input type="submit" name="submit" value="Change Password">
        </form>
    </div>
</body>
</html>
