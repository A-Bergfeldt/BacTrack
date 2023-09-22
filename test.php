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
        <div class="chart-container" style="position: relative; height:50px; width:50vw;">
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

        $query = "SELECT user_id FROM users"; // Replace 'users' with your table name
        $result = $connect->query($query);

        $labels = [];
        $data = [];

        foreach ($result as $row) {
            $labels[] = $row["user_id"];
            $data[] = 1; // You can set the data to 1 if you only want to count the occurrences
        }
        ?>

        var data = {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                data: <?php echo json_encode($data); ?>,
                backgroundColor: ['#FF5733', '#3498DB']
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
