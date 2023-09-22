<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "things";

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Replace with your actual username and password validation logic using the database
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($link, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        // Successful login
        echo "<p>Login successful. Welcome, $username!</p>";
    } else {
        // Login failed
        echo "<p>Invalid username or password. Please try again.</p>";
    }
}

mysqli_close($link);
?>

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
        
        <form method="post" action="login.php">
            <input type="text" name="username" id="username" placeholder="Enter your username" required><br><br>

            <!-- <label for="password">Password:</label> -->
            <input type="password" name="password" id="password" placeholder="Enter your password" required><br><br>

            <input type="submit" value="Login">
            <!-- Form elements... -->
        </form>

        <!-- PHP and message elements... -->
    </div>
</body>
</html>
