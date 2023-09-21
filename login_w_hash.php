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

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bactrack";

if(isset($_POST["submit"])) {
    $link = mysqli_connect($servername, $username, $password, $dbname); 

    $input_username = $_POST["username"];
    $user_database_password_query = "SELECT `hashed_password` FROM `users` WHERE `user_id`=$input_username;";
    $input_password = $_POST["password"];
    $user_database_password = $link->query($user_database_password_query);

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