<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Pie Chart with Data from SQL Database</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-4">Pie Chart with Data from SQL Database</h2>
<<<<<<< Updated upstream
        <div class="chart-container" style="position: relative; height:50px; width:50vw;">
=======
        <div class="chart-container" style="position: relative; height:400px; width:400px;">
>>>>>>> Stashed changes
            <canvas id="pie_chart"></canvas>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('pie_chart').getContext('2d');

        // Fetch data from SQL database using PHP
        <?php
        $host = "localhost";
        $dbname = "bactrack";
        $username = "root";
        $password = "root";

        $connect = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

<<<<<<< Updated upstream
        $query = "SELECT user_id FROM users"; // Replace 'users' with your table name
=======
        $query = "SELECT strain_id, COUNT(*) as count FROM sample GROUP BY strain_id"; // Aggregate data by strain_id
>>>>>>> Stashed changes
        $result = $connect->query($query);

        $labels = [];
        $data = [];

        foreach ($result as $row) {
<<<<<<< Updated upstream
            $labels[] = $row["user_id"];
            $data[] = 1; // You can set the data to 1 if you only want to count the occurrences
=======
            $labels[] = $row["strain_id"];
            $data[] = $row["count"];
>>>>>>> Stashed changes
        }
        ?>

        var data = {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                data: <?php echo json_encode($data); ?>,
<<<<<<< Updated upstream
                backgroundColor: ['#FF5733', '#3498DB']
=======
                backgroundColor: ['#FF5733', '#3498DB', '#3498DD']
>>>>>>> Stashed changes
            }]
        };
        var options = {
            responsive: true
        };

        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });
    </script>
</body>
</html>
