<?php

// data.php

$host = "localhost";
$dbname = "bactrack";
$username = "root";
$password = "root";

$connect = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

if (isset($_POST["action"])) {
    if ($_POST["action"] == 'fetch') {
        $query = "
        SELECT user_id
        FROM users
        ";

        $result = $connect->query($query);

        $data = array();

        foreach ($result as $row) {
            $data[] = array(
                'user_id' => $row["user_id"]
            );
        }

        echo json_encode($data);
    }
}
?>
