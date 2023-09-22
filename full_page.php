<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Tahoma, sans-serif;
            background-color: LightCyan;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* This ensures the container is centered vertically. */
        }

        .login-container {
            background-color: MintCream;
            border-radius: 5px;
            box-shadow: 5px 5px 10px 5px rgba(0,0,0,0.2);
            width: 250px; /* Adjusted container width */
            height: 80vh;

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
    <div class="login-container">
        <img src="bacteria.jpg" alt="Desktop Image" width="120" height="120">
        <h1 style="color: LightCyan; text-shadow: -1px -1px 2px #000, 1px -1px 2px #000, -1px 1px 2px #000, 1px 1px 2px #000; font-family: Arial, sans-serif; font-weight: bold;">BacTrac</h1>
        <h2 style="font-family: Arial, sans-serif;">Sign In</h2> <!-- Removed the unnecessary <label> tags -->
        
        <form method="post">
            <input type="text" name="username" id="username" placeholder="Enter your username" required><br><br>

            <!-- <label for="password">Password:</label> -->
            <input type="password" name="password" id="password" placeholder="Enter your password" required><br><br>

            <input type="submit" name="submit" value="Submit">
            <!-- Form elements... -->
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
    </div>
</body>
</html>
