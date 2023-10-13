<!DOCTYPE html>
<html>
<head>
    <title>BacTrack Login Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="style_sheet.css">
</head>

<body>
        
    <div class="form">
        <div class="loginbox">
        <h1>Login</h1>
        <form method="post">
            <div class="txt_field">
                <input type="text" name="username"required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="pass">
                <li><a href="forgot_password.php">Forgot password?</a></li>
            </div>
            <input type="submit" name="submit" value="Login">
            <div class="contact_link">
                Do not have an account? <li><a href ="/about_contact/contactus.php">Contact us</a></li>
            </div>
        </form>
    </div>

    <?php require_once "../nav_bar.php"; ?> 

        <?php
            //Set the max lifetime of the session
            ini_set( "session.gc_maxlifetime", 1440);

            //Set the cookie lifetime of the session
            ini_set( "session.cookie_lifetime", 1440);

            session_start();
            
            require_once "../nav_bar.php";
            require_once "../db_connection.php";

            if(isset($_POST["submit"])) {
                // Use prepared statements with parameterized queries
                $input_username = htmlspecialchars($_POST["username"]);
                $input_password = htmlspecialchars($_POST["password"]);
        
                $stmt = $db_connection->prepare("SELECT hashed_password FROM users WHERE user_id = ?");
                $stmt->bind_param("s", $input_username);
                $stmt->execute();
                $result = $stmt->get_result();
                $user_database_password_hashed = $result->fetch_assoc();
        
                if ($user_database_password_hashed !== null && password_verify($input_password, $user_database_password_hashed['hashed_password'])) {
                    // Redirect before sending any content
                    $stmt = $db_connection->prepare("SELECT role_id FROM users WHERE user_id = ?");
                    $stmt->bind_param("s", $input_username);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $user_role = $result->fetch_assoc();
                    $role_id = $user_role['role_id'];
                    $_SESSION["role_id"] = $role_id;
                    $_SESSION["user_id"] = $input_username;

                    if ($_SESSION['role_id'] == 1) {
                        header("Location: ../doctor/doctor_page.php");
                    }
                    if ($_SESSION['role_id'] == 2) {
                        header("Location: ../lab/lab_design_input_form.php");
                    }
                    if ($_SESSION['role_id'] == 3) {
                        header("Location: ../home/home_page.php");
                    }
                    exit();
                } 
                else {
                    // Output error message after the header call
                    echo "Login failed. Try again.";
                    exit();
                }
            }
        ?>

    </div>
</body>
</html>
