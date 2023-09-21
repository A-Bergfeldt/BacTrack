<!DOCTYPE html>
<html>
<head>
    <title>Password Verification</title>
</head>
<body>

<form method="post">
    <input type='password' name="password" placeholder="Enter password" />
    <input type="submit" name="submit" value="Submit" />
</form>


<?php
if(isset($_POST["submit"])) {
    $input_username = $_POST["username"];
    $user_database_password = "SELECT `hashed_password` FROM `users` WHERE `user_id`=$input_username;";
    $input_password = $_POST["password"];

    if (password_verify($input_password, $user_database_password)) {
        echo "Password is correct. You're in!";
        echo $hashedPwdInDb;
    } else {
        echo "Login is incorrect. Try again.";
    }
}
?>

</body>
</html>