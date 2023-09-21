<!DOCTYPE html>
<html>
<head>
    <title>Password Verification</title>
</head>
<body>

<form method="post">
    <input type='username' name="username" placeholder="Enter username" />
    <input type='password' name="password" placeholder="Enter password" />
    <input type="submit" name="submit" value="Submit" />
</form>


<?php

$servername = "localhost";
$db_username = "root";
$db_password = "root";
$db_name = "bactrack";
$link = mysqli_connect($servername, $db_username, $db_password, $db_name); 

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
    echo "bjhdghsfhkdgshrdhgs";
  }

if(isset($_POST["submit"])) {

    $input_username = $_POST["username"];
    $user_database_password_query = "SELECT hashed_password FROM users WHERE user_id = $input_username";
    $input_password = $_POST["password"];
    $user_database_password = $link->query($user_database_password_query);

    //echo $input_password;//
    echo $user_database_password_query;
    echo $user_database_password;
    echo password_verify($input_password, $user_database_password);

    if (password_verify($input_password, $user_database_password)) {
        echo "Password is correct. You're in!";
    } 
    else {
        echo "Login is incorrect. Try again.";
    }

}
?>

</body>
</html>