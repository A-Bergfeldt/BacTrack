<?php
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
    <?php require_once "../nav_bar.php"; ?>
    <div class="container">
        <div class="slides slide1">
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
                <h1 style="text-align: center;">Finished</h1>
            </section>
            <section class="table_body">
                <table>
                    <tbody>
                    <?php
                        session_start();

                        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1440)) {
                            header("Location: ../login/logout.php");
                        }
                        $_SESSION['LAST_ACTIVITY'] = time();

                        if ($_SESSION['role_id'] != 1 && $_SESSION['role_id'] != 3) {
                            header("Location: ../login/login.php");
                            exit();
                        }

                        include '../db_connection.php';

                        // SQL queries
                        $sql = "SELECT sample_id, date_taken, status_name, hospital_name, strain_name, lab_technician_id FROM (((sample 
                        INNER JOIN tracking ON sample.status_id = tracking.status_id) 
                        INNER JOIN hospital ON sample.hospital_id = hospital.hospital_id)
                        LEFT JOIN strain ON sample.strain_id = strain.strain_id)
                        WHERE doctor_id = '" . $_SESSION['user_id'] . "' AND sample.status_id = 4
                        ORDER BY sample_id ASC;";
                        $result = $db_connection->query($sql);

                        include '../data_view/fill_personal_table.php';

                        // Close the database connection
                        $db_connection->close();
                        ?>
                    </tbody>
                </table>
            </section>
        </main>

        <main class="table">
            <section class="table_header">
                <h1 style="text-align: center;">Unfinished</h1>
            </section>
            <section class="table_body">
                <table>
                    <tbody>
                    <?php
                    session_start();

                    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1440)) {
                        header("Location: ../login/logout.php");
                    }
                    $_SESSION['LAST_ACTIVITY'] = time();

                    if ($_SESSION['role_id'] != 1 && $_SESSION['role_id'] != 3) {
                        header("Location: ../login/login.php");
                        exit();
                    }

                    include '../db_connection.php';

                    // SQL queries
                    $sql = "SELECT sample_id, date_taken, status_name, hospital_name, strain_name, lab_technician_id FROM (((sample 
                    INNER JOIN tracking ON sample.status_id = tracking.status_id) 
                    INNER JOIN hospital ON sample.hospital_id = hospital.hospital_id)
                    LEFT JOIN strain ON sample.strain_id = strain.strain_id)
                    WHERE doctor_id = '" . $_SESSION['user_id'] . "' AND sample.status_id != 4
                    ORDER BY sample_id ASC;;"; 
                    $result = $db_connection->query($sql);

                    include '/data_view/fill_personal_table.php';

                    // Close the database connection
                    $db_connection->close();
                    ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    <?php require_once "../nav_bar.php"; ?>
</body>

</html>