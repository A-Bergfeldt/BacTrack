<!DOCTYPE html>
<html>
<head>
    <title>Mina Login Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="style_sheet.css">
</head>

<body>
    <?php require_once "../nav_bar.php"; ?> 

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
                Do not have an account? <li><a href ="../about_contact/contactus.php">Contact us</a></li>
            </div>
        </form>

        <?php
            session_start();
            require_once "db_connection.php";

            $db_connection = mysqli_connect($servername, $db_username, $db_password, $db_name); 

            if (mysqli_connect_error()) {
                die("Connection failed: " . mysqli_connect_error());
            }
        
            if(isset($_POST["submit"])) {
                // Use prepared statements with parameterized queries
                $input_username = $_POST["username"];
                $input_password = $_POST["password"];
        
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
                    $_SESSION["role_id"] = $user_role;
                    $_SESSION["user_id"] = $input_username;
                
                    if ($user_role['role_id'] === 1) {
                        header("Location: ../doctor/doctor_page.php");
                    }
                    if ($user_role['role_id'] === 2) {
                        header("Location: ..lab/lab_design_input_form.php");
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
