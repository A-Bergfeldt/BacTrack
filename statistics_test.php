<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Pie Chart with Data from SQL Database</title>
    <script src="https://cdn.plot.ly/plotly-2.26.0.min.js" charset="utf-8"></script>
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-4">Pie Chart with Data from SQL Database</h2>
        <div id="tester" style="width:600px;height:250px;"></div>
        </div>
    </div>

    <?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once 'db_connection.php';

    $query = "SELECT strain.strain_id, strain.strain_name, COUNT(*) AS count FROM sample INNER JOIN strain ON strain.strain_id = sample.strain_id GROUP BY sample.strain_id, strain.strain_name;" ; // Aggregate data by strain_id
    $result = $db_connection->query($query);

    $labels  = [];
    $data = [];

    foreach ($result as $row) {
            $labels[] = $row["strain_name"];
            $data[] = $row["count"];}

    $labels = json_encode($labels);
    $data = json_encode($data);
    ?>

    <script>
	TESTER = document.getElementById('tester');
    var data = [{
        values: <?php echo $data; ?>,
        labels: <?php echo $labels; ?>,
        type: 'pie'
    }];

var layout = {
  height: 400,
  width: 500
};
Plotly.newPlot('tester', data, layout);
</script>
</body>
</html>
