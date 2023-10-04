<!DOCTYPE html>
<html>
<head>
    <title>Mina Forgot password</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="login_style.css">
</head>

<body>
<nav>
        <a href="home_page.php">
            <img src="logo_main.png" alt="Logo" width="95" height="65">
        </a>
        <ul>
            <li><a href="home_page.php">Home</a></li>
            <li class="dropdown">
                <a href="about_page.php" class="dropbtn">About</a>
                <div class="dropdown-content">
                    <a href="service1.php">About BacTrack</a>
                    <a href="service2.php">About CombiANT</a>
                    <a href="service3.php">About us</a>
                </div>
            <li class="dropdown">
            <a href ="contact_page.php" class="dropbtn">Contact</a>
            <div class="dropdown-content">
                    <a href="service1.php">Contact us</a>
                    <a href="service2.php">FAQ</a>
                </div>
                </li>
            <li><a href="statistics_page.php">Statistics</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav> 

    <div class="loginbox">
        <h1>Forgot password?</h1>
        <form action="send_reset_link.php" method="POST">
            <div class="txt_field">
                <input type="text" name="recipient" required>
                <span></span>
                <label>Your e-mail</label>
            </div>
            <input type="hidden" name="subject" value="Password Reset">
                <input type="hidden" name="message" value="You have requested a password reset. Here is your passwrod:<br>">
            <input type="submit" name="submit" value="Send password">
        </form>
    </div>
</body>
</html>