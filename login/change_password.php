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
                <input type="password" name="password" required>
                <span></span>
                <label>New password</label>
            </div>


            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Confirm new password</label>
            </div>
            <input type="submit" name="submit" value="Change Password">
            
            
        </form>
    </div>
</body>
</html>


