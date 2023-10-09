<?php
session_start();

if ($_SESSION['role_id'] != 1 && $_SESSION['role_id'] != 3) {
    header("Location: ../home_page.php");
    exit();
}

$user_name = str_replace("_", " ", $_SESSION['user_id']);
?>

<!-- This is how you comment out
how much you want
-->


<!DOCTYPE html>
<html>
<head>
    <title>Mina testing doctor page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="doctor_style.css">
    <style>
        /* Your existing CSS styles here */

        /* Style the button container */
        .button-container {
            text-align: center;
            margin-top: 30px; /* Adjust the margin as needed */
        }

        /* Style the buttons */
        .button-container .button {
            display: inline-block;
            padding: 15px 30px; /* Increase padding for a larger button */
            background-color: #5072A7;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            margin: 0 10px; /* Add spacing between buttons */
        }

        .button-container .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php require_once "../nav_bar.php"; ?> 
    <div class="container">
        <div class="slides slide1">
            <h1 style="font-size: 100px; color: #fff;">Hello <?php echo $user_name; ?>!</h1>
        </div>
    </div>
    <!-- Button container for both buttons -->
    <div class="button-container">
        <a href="sample_form.php" class="button">Insert new sample</a>
        <a href="data_view/search_all_samples_test.php" class="button">Search all samples</a>
    </div>
</body>
</html>

