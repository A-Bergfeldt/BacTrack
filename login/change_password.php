<!DOCTYPE html>
<html>
<head>
    <title>Mina Forgot password</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="style_sheet.css">
</head>

<body>
    <?php require_once "../nav_bar.php"; ?> 

    <div class="loginbox">
        <h1>Create a new password</h1>
        <form action="update_password.php" method="POST">
        <div class="txt_field">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
            <input type="password" name="new_password" placeholder="New Password"><br><br>
            <span></span>
            <input type="password" name="confirm_password" placeholder="Confirm New Password"><br><br>
            <span></span>
            </div>
            <input type="submit" name="submit" value="Change Password">
            
            
        </form>
    </div>
</body>
</html>


