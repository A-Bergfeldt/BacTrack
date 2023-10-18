<!DOCTYPE html>
<html>
<head>
    <title>My BacTrack Web App</title>
    <!-- Add your CSS styles here -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" type="text/css" href="lab_tech_style.css">
</head>
  <body>
    <?php require_once '../nav_bar.php'; ?>

    <?php

session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1440)) {
    header("Location: ../login/logout.php");
}
$_SESSION['LAST_ACTIVITY'] = time();

if ($_SESSION['role_id'] != 2 && $_SESSION['role_id'] != 3) {
    header("Location: ../login/login.php");
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
    <link rel="stylesheet" href="/data_view/table_styles.css">
    <style>
        .button-container {
            text-align: center;
            margin-top: 30px;
        }

        .button-container .button {
            display: inline-block;
            padding: 15px 30px;
            /* Increase padding for a larger button */
            background-color: #662d91;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .button-container .button:hover {
            background-color: #800080;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 style="font-size: 100px; color: #000000; text-align: center;">Hello
            <?php echo $user_name; ?>!
        </h1>
        </div>

        <div class="button-container">
            <a href="lab_design_input_form.php" class="button">Insert new data</a>

        <main class="table">
            <section class="table_header">
                <h1 style="text-align: center;">Running samples</h1>
            </section>
            <section class="table_body">
                <table>
                    <tbody>
                        <?php
                        require_once '../data_view/view_unfinished_samples.php'
                        ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    <?php require_once "../nav_bar.php"; ?>
</body>

</html>