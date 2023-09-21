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
    $input = $_POST["password"];
    $hashedPwdInDb = password_hash("test123", PASSWORD_DEFAULT);

    if (password_verify($input, $hashedPwdInDb)) {
        echo "Password is correct. You're in!";
        echo $hashedPwdInDb;
    } else {
        echo "Password is incorrect. Try again.";
    }
}
?>

</body>
</html>