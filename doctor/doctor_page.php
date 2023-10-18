<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1440)) {
    header("Location: ../login/logout.php");
}
$_SESSION['LAST_ACTIVITY'] = time();

if ($_SESSION['role_id'] != 1 && $_SESSION['role_id'] != 3) {
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
    <title>My page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="/data_view/table_styles.css">
    <style>
        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button-container .button {
            display: inline-block;
            padding: 15px 30px;
            /* Increase padding for a larger button */
            background-color: #662d91;
            color: #fff;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            box-shadow: 0 0 1px rgba(0, 0, 0, 0.3); 
        }

        .button-container .button:hover {
            background-color: #800080;
        }
    </style>
</head>

<body>
    <div class="container">
        <br>
        <br>
        <h1 style="font-size: 100px; color: #000000; text-align: center;">Hello
            <?php echo $user_name; ?>!
        </h1>
        </div>

        <div class="button-container">
            <a href="sample_form.php" class="button">Insert new sample</a>
            <a href="/data_view/search_all_samples.php" class="button">Search all samples</a>
        </div>

        <main class="table">
            <section class="table_header">
                <h1 style="text-align: center;">Ready for prescription</h1>
            </section>
            <section class="table_body">
                <table>
                    <tbody>
                        <?php
                        require_once '../data_view/view_finished_samples.php'
                        ?>
                    </tbody>
                </table>
            </section>
        </main>

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