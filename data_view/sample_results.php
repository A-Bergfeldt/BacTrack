<!DOCTYPE html>
<html>

<head>
    <title>Sample Results</title>
    <script src="multiselect-dropdown.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="table_styles.css">
</head>


<body>
    <?php
    session_start();
    include '../db_connection.php';

    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1440)) {
        header("Location: ../login/logout.php");
    }
    $_SESSION['LAST_ACTIVITY'] = time();

    if ($_SESSION['role_id'] != 1 && $_SESSION['role_id'] != 3) {
        header("Location: ../login/login.php");
        exit();
    }

    $sample_id = $_GET["sample_id"];
    // SQL queries
    $sql = "SELECT sample_id, a1.antibiotic_name AS 'Antibiotic 1', a2.antibiotic_name AS 'Antibiotic 2', a3.antibiotic_name AS 'Antibiotic 3',synergy_name, prescribed FROM 
    ((((results 
    INNER JOIN antibiotics AS a1 ON results.antibiotic_id1 = a1.antibiotic_id)
    INNER JOIN antibiotics AS a2 ON results.antibiotic_id2 = a2.antibiotic_id)
    INNER JOIN antibiotics AS a3 ON results.antibiotic_id3 = a3.antibiotic_id)
    INNER JOIN synergy ON results.synergy_result = synergy.synergy_id)
    WHERE sample_id = $sample_id;";

    $result = $db_connection->query($sql);

    $sqlStatus = "SELECT status_id FROM sample WHERE sample.sample_id = $sample_id;";
    $resultStatus = $db_connection->query($sqlStatus);
    if ($resultStatus->num_rows > 0) {
        // Fetch the row from the result set
        $row = $resultStatus->fetch_assoc();

        // Access the 'status_id' value from the row
        $status_id = $row['status_id'];
    }

    $sqlDoctor = "SELECT doctor_id FROM sample WHERE sample.sample_id = $sample_id;";
    $resultDoctor = $db_connection->query($sqlDoctor);
    if ($resultDoctor->num_rows > 0) {
        // Fetch the row from the result set
        $row = $resultDoctor->fetch_assoc();

        // Access the 'status_id' value from the row
        $doctor_id = $row['doctor_id'];
    }
    $db_connection->close();

    $show_button = ($status_id == 3 and $doctor_id == $_SESSION['user_id']);
    $show_chosen = ($status_id == 4 and $doctor_id == $_SESSION['user_id']);
    ?>

    <br>
    <br>
    <br>
    <br>
    <br>


    <!-- Start the table with some basic styling -->
    <div class="container">
        <main class="table">
            <section class="table_header">
                <h1>Results for Sample ID: <?= $sample_id ?></h1>
            </section>

            <section class="table_body">
                <?php if ($result->num_rows > 0): ?>

                    <table>
                        <thead>
                            <tr>
                                <th>Antibiotic 1</th>
                                <th>Antibiotic 2</th>
                                <th>Antibiotic 3</th>
                                <th>Result</th>
                                <?php if ($show_button): ?>
                                    <th>Prescribe</th>
                                <?php endif; ?>
                                <?php if ($show_chosen): ?>
                                    <th>Prescribed</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <?php if ($row["prescribed"]): ?>
                                    <tr class="prescribed">
                                <?php else: ?>
                                    <tr>
                                <?php endif; ?>
                                <td>
                                    <?= $row["Antibiotic 1"] ?>
                                </td>
                                <td>
                                    <?= $row["Antibiotic 2"] ?>
                                </td>
                                <td>
                                    <?= $row["Antibiotic 3"] ?>
                                </td>
                                <td>
                                    <?= $row["synergy_name"] ?>
                                </td>
                                <?php if ($show_button): ?>
                                    <td>
                                        <a
                                            href="update_prescription.php?sample_id=<?= $row['sample_id'] ?> <?= '&antibiotic1=' . $row['Antibiotic 1'] ?> <?= '&antibiotic2=' . $row['Antibiotic 2'] ?> <?= '&antibiotic3=' . $row['Antibiotic 3'] ?>">Prescribe</a>
                                        <!-- <button
                                        onclick="showConfirmation(<?= $row['sample_id'] ?>, '<?= $row['Antibiotic 1'] ?>', '<?= $row['Antibiotic 2'] ?>', '<?= $row['Antibiotic 3'] ?>')">Prescribe
                                        this combination</button> -->
                                    </td> 
                                <?php endif; ?>
                                <?php if ($show_chosen): ?>
                                    <td>
                                        <p class="status prescribed">Yes</p>
                                    </td>
                                <?php else: ?>
                                    <tr>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>>0 results</p>
                <?php endif; ?>
            </section>
        </main>
    </div>
    <?php require_once "../nav_bar.php"; ?>
</body>
</html>