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

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "BacTrack";

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname);

// Check if connection is established
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from POST request
$lab_technician_id = $_SESSION['user_id'];
$sample_id = (int) $_POST['sample_id'];
$strain_id = (int) $_POST['strain'];
$status_id = 2;
try {
    // Prepare and bind parameters to SQL query, then execute
    $sql = "UPDATE sample SET strain_id = ?, lab_technician_id = ?, status_id = ? WHERE sample_id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("isii", $strain_id, $lab_technician_id, $status_id, $sample_id);
    $result = $stmt->execute();

    if ($result) {
        $message = "Values inserted successfully for sample_id: $sample_id";
    } else {
        $message = "Error: ";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    echo "<br><a href='lab_design_input_form.php'>Back to result input form</a>";
}
$link->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>My BacTrack Web App</title>
    <!-- Add your CSS styles here -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" type="text/css" href="lab_tech_style.css">
</head>
<body>
</br></br></br></br></br></br></br></br>
    <?php require_once '../nav_bar.php'; ?>
    <div class="box">
        <p style="text-align: center;"> 
            <?php if (isset($message)) {echo $message . $stmt->error;} ?>
        </p>
        <div>
            <div class="button-container" style="text-align: center;">
                <a href='lab_design_input_form.php' class="button">Enter more results</a>
    </div>
</body>