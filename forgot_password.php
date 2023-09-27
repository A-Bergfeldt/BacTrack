




<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
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
        <img src="login_logo.jpg" alt="Desktop Image" width="120" height="120">
        <h1 style="color: LightCyan; text-shadow: -1px -1px 2px #000, 1px -1px 2px #000, -1px 1px 2px #000, 1px 1px 2px #000; font-family: Arial, sans-serif; font-weight: bold;">BacTrac</h1>
        <h2 style="font-family: Arial, sans-serif;">Forgot Password?</h2> <!-- Removed the unnecessary <label> tags -->
            <form action="send_reset_link.php" method="POST">
                <input type="text" name="recipient" placeholder="Your Email"><br><br>
                <input type="hidden" name="subject" value="Password Reset">
                <input type="hidden" name="message" value="You have requested a password reset. Here is your passwrod:<br>">
                <input type="submit" value="Send Password">
            </form>
    </div>
</body>
</html>
