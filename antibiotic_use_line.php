<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Line-plot with Data from SQL Database</title>
    <script src="https://cdn.plot.ly/plotly-2.26.0.min.js" charset="utf-8"></script>
</head>
<body>
<div class="container">
    <h2 class="text-center mt-4">Line diagram with Data from SQL Database</h2>
    <div id="tester" style="width:600px;height:250px;"></div>
</div>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db_connection.php';
// Modify your SQL query to retrieve data at a monthly granularity
$query = 
    "SELECT
        subquery.sample_date AS date,
        subquery.ID,
        antibiotics.antibiotic_name,
        COUNT(*) AS count
    FROM 
        (
            SELECT
                r1.antibiotic_id1 AS ID,
                sample.date_taken AS sample_date
            FROM
                results AS r1
            INNER JOIN
                sample ON r1.sample_id = sample.sample_id
            WHERE
                r1.prescribed = 1
                AND NOT r1.antibiotic_id1 = 1
        
            UNION ALL
        
            SELECT
                r2.antibiotic_id2 AS ID,
                sample.date_taken AS sample_date
            FROM
                results AS r2
            INNER JOIN
                sample ON r2.sample_id = sample.sample_id
            WHERE
                r2.prescribed = 1
                AND NOT r2.antibiotic_id2 = 1
        
            UNION ALL
        
            SELECT
                r3.antibiotic_id3 AS ID,
                sample.date_taken AS sample_date
            FROM
                results AS r3
            INNER JOIN
                sample ON r3.sample_id = sample.sample_id
            WHERE
                r3.prescribed = 1
                AND NOT r3.antibiotic_id3 = 1
        ) AS subquery
    INNER JOIN 
        antibiotics ON antibiotics.antibiotic_id = subquery.ID
    GROUP BY
        subquery.sample_date,
        subquery.ID,
        antibiotics.antibiotic_name
    ORDER BY
        subquery.sample_date,
        antibiotics.antibiotic_name";

$result = $db_connection->query($query);

$labels = [];
$data = [];
$dates = [];

foreach ($result as $row) {
    $labels[] = $row["antibiotic_name"];
    $data[] = $row["count"];
    $dates[] = $row["date"];
}

// Organize the data for plotting
$dataForPlot = [];
$uniqueLabels = array_unique($labels);

foreach ($uniqueLabels as $label) {
    $dataForLabel = [];
    
    foreach ($dates as $index => $date) {
        if ($label === $labels[$index]) {
            $dataForLabel[] = [
                'x' => $date,
                'y' => $data[$index]
            ];
        }
    }
    
    $dataForPlot[] = [
        'x' => array_column($dataForLabel, 'x'),
        'y' => array_column($dataForLabel, 'y'),
        'type' => 'scatter',
        'mode' => 'lines',
        'name' => $label,
    ];
}


$labels = json_encode(array_unique($labels));
?>

<script>
    TESTER = document.getElementById('tester');
    var data = <?php echo json_encode($dataForPlot); ?>;

    var layout = {
        height: 400,
        width: 500,
        showlegend: true,
        xaxis: {
            title: 'Date'
        },
        yaxis: {
            title: 'Count'
        }
    };

    Plotly.newPlot('tester', data, layout);
</script>
</body>
</html>
