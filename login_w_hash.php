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

if(isset($_POST["submit"])) {
    
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];
    $user_database_password = $link->execute_query("SELECT hashed_password FROM users WHERE user_id = ?", [$input_username]);
    $user_database_password_hashed = mysqli_fetch_array($user_database_password); // IMPORTANT: Convert sqli results to array //

    if (password_verify($input_password, $user_database_password_hashed['hashed_password'])) { // IMPORTANT: Index array //
        
        // Added a simple redirect to the README.txt file just to test //
        
        echo "Password is correct. You're in!";
        sleep(1);
        header("Location: README.txt");
        exit();
    } 
    else {
        echo "Login is incorrect. Try again.";
    }

}
?>

</body>
</html>