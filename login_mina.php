<!DOCTYPE html>
<html>
<head>
    <title>Mina Login Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="style_sheet.css">
    <style>
        .login-container {
            background-color: MintCream;
            border-radius: 5px;
            box-shadow: 5px 5px 10px 5px rgba(0,0,0,0.2);
            width: 250px; /* Adjusted container width */
            height: 70vh;

            padding: 50px 20px; /* Adjusted padding */
            justify-content: flex-end;
            text-align: center; /* Center-align text within the container */
            
        }
        .login-image {
            margin-top: 0px; /* Adjust this margin to move the image higher */
        }
        h2 {
            margin-top: 30px; /* Add top margin to move the text down */
        }
        label {
            display: block; /* Display labels as blocks */
            margin-bottom: 10px; /* Add some space between labels */
            text-align: bottom; /* Left-align label text */
        }

        /* Rest of your styles... */
    </style>
</head>

<body>
    <nav>
        <div class="logo">Logo here</div>
        <ul>
            <li><a href ="home_page.php">Home</a></li>
            <li><a href ="about_page.php">About</a></li>
            <li><a href ="contact_page.php">Contact</a></li>
            <li><a href ="statistics_page.php">Statistics</a></li>
            <li><a href ="login.php">Login</a></li>
        </ul>
    </nav> 

    <div class="slides slide1">
        <div class="login-container">
            <img src="login_logo.jpg" alt="Desktop Image" width="120" height="120">
            <h1 style="color: LightCyan; text-shadow: -1px -1px 2px #000, 1px -1px 2px #000, -1px 1px 2px #000, 1px 1px 2px #000; font-family: Arial, sans-serif; font-weight: bold;">BacTrac</h1>
            <h2 style="font-family: Arial, sans-serif;">Sign In</h2> <!-- Removed the unnecessary <label> tags -->
        
            <form method="post">
                <input type='text' name="username" placeholder="Enter username"/><br><br>
                <input type='password' name="password" placeholder="Enter password"/><br><br>
                <input type="submit" name="submit" value="Submit"/>
                <p> <a href="forgot_password.php">Forgot your password?</a></p>
            </form>

            <?php
                session_start();
                include "db_connection.php";

                $servername = "localhost";
                $db_username = "root";
                $db_password = "root";
                $db_name = "bactrack";
                $link = mysqli_connect($servername, $db_username, $db_password, $db_name); 

                if (mysqli_connect_error()) {
                    die("Connection failed: " . mysqli_connect_error());
                }
            
                if(isset($_POST["submit"])) {
                    // Use prepared statements with parameterized queries
                    $input_username = $_POST["username"];
                    $input_password = $_POST["password"];
            
                    $stmt = $link->prepare("SELECT hashed_password FROM users WHERE user_id = ?");
                    $stmt->bind_param("s", $input_username);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $user_database_password_hashed = $result->fetch_assoc();
            
                    if ($user_database_password_hashed !== null && password_verify($input_password, $user_database_password_hashed['hashed_password'])) {
                        // Redirect before sending any content
                        $stmt = $link->prepare("SELECT role_id FROM users WHERE user_id = ?");
                        $stmt->bind_param("s", $input_username);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $user_role = $result->fetch_assoc();
                        $_SESSION["role_id"] = $user_role;
                        $_SESSION["user_id"] = $input_username;
                    
                        if ($user_role['role_id'] === 1) {
                            header("Location: doctor_page.php");
                        }
                        if ($user_role['role_id'] === 2) {
                            header("Location: labtech_page.php");
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
    </div>
</body>
</html>
