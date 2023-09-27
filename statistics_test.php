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

    $query1 = 
            "SELECT
            ID,
            antibiotics.antibiotic_name,
            SUM(COUNTS) AS count 
        FROM 
            (
                SELECT results.antibiotic_id1 AS ID, COUNT(*) AS COUNTS FROM results WHERE results.prescribed = 1 GROUP BY results.antibiotic_id1
                UNION ALL
                SELECT results.antibiotic_id2 AS ID, COUNT(*) AS COUNTS FROM results WHERE results.prescribed = 1 GROUP BY results.antibiotic_id2
                UNION ALL
                SELECT results.antibiotic_id3 AS ID, COUNT(*) AS COUNTS FROM results WHERE results.prescribed = 1 GROUP BY results.antibiotic_id3
            ) AS subquery
        INNER JOIN 
            antibiotics ON antibiotics.antibiotic_id = subquery.ID
        GROUP BY
            subquery.ID,
            antibiotics.antibiotic_name";
    $result_1 = $db_connection->query($query1);

    $labels  = [];
    $data = [];

    foreach ($result_1 as $row) {
            $labels[] = $row["antibiotic_name"];
            $data[] = $row["count"];}

    $labels = json_encode($labels);
    $data = json_encode($data);

    echo $labels;
    echo $data;
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
