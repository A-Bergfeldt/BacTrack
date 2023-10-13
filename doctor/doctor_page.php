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
            color: white;
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
            <h1 style="font-size: 100px; color: #fff; text-align: center;">Hello <?php echo $user_name; ?>!</h1>
        </div>

        <div class="button-container">
        <a href="sample_form.php" class="button">Insert new sample</a>
        <a href="/data_view/search_all_samples_test.php" class="button">Search all samples</a>
        </div>

        <main class="table">
            <section class="table_header">
                <h1></h1>
            </section>
            <section class="table_body">
                <table>
                    <thead>
                        <tr>
                            <th>Sample ID<span class="icon-arrow">&DownArrow;</span></th>
                            <th>Date<span class="icon-arrow">&DownArrow;</span></th>
                            <th>Status<span class="icon-arrow">&DownArrow;</span></th>
                            <th>Hospital<span class="icon-arrow">&DownArrow;</span></th>
                            <th>Strain<span class="icon-arrow">&DownArrow;</span></th>
                            <th>Doctor<span class="icon-arrow">&DownArrow;</span></th>
                            <th>Lab Technician<span class="icon-arrow">&DownArrow;</span></th>
                        </tr>
                    </thead>
                <tbody>
            <?php
            $dropdownNames = array(
              "search_sample" => "sample_id",
              "search_status" => "status_name",
              "search_hospital" => "hospital_name",
              "search_strain" => "strain_name",
              "search_doctor" => "doctor_id",
              "search_lab_technician" => "lab_technician_id"
            );

            $whereStatements = "WHERE ";
            foreach ($dropdownNames as $searchName => $sqlName) {
                if (isset($_GET[$searchName])) {
                    if ($whereStatements != "WHERE ") {
                        $whereStatements .= " and ";
                    }
                    if ($searchName == "search_strain" or $searchName == "search_hospital") {
                        $_GET[$searchName] = str_replace("_", " ", $_GET[$searchName]);
                    }
                    $whereStatements .= $sqlName . " IN ('" . implode("', '", $_GET[$searchName]) . "')";
                }
            }

            if ($whereStatements == "WHERE ") {
                $whereStatements = "";
            }

            $statusSearch = implode("', '", array('Hospital', 'Analyzed')); // Enclose each status name in single quotes

            if (count($_GET) != 0) {
                $sql = "SELECT sample_id, date_taken, status_name, hospital_name, strain_name, doctor_id, lab_technician_id FROM (((sample 
                INNER JOIN tracking ON sample.status_id = tracking.status_id) 
                INNER JOIN hospital ON sample.hospital_id = hospital.hospital_id)
                LEFT JOIN strain ON sample.strain_id = strain.strain_id) "
                    . $whereStatements .
                    " ORDER BY sample_id ASC;";
                $result = $db_connection->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>
                            <a href='sample_results.php?sample_id=" . $row["sample_id"] . "'>" . $row["sample_id"] . "</a>
                        </td>
                        <td>" . $row["date_taken"] . "</td>
                        <td>" . $row["status_name"] . "</td>
                        <td>" . $row["hospital_name"] . "</td>
                        <td>" . $row["strain_name"] . "</td>
                        <td>" . $row["doctor_id"] . "</td>
                        <td>" . $row["lab_technician_id"] . "</td>
                    </tr>";
                }

                $result->free_result();
                $db_connection->close();
            } 
            
            else {
                echo "<tr><td colspan='7'>0 results</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </section>
    </main>


    </div>
    <!-- Button container for both buttons -->

</body>
</html>

