<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" type="text/css" href="linegraph_stylesheet_main.css">
    <title>Trends of usage</title>
    <script src="https://cdn.plot.ly/plotly-2.26.0.min.js" charset="utf-8"></script>
</head>
<body>
<?php require_once "../nav_bar.php"; ?>
<div class="container">
    <h1 class="text-center mt-4">Trends of the usage of antibiotics over several years</h1>
    <div id="tester" style="width:600px;height:250px;"></div>
</div>

<div id="tester"></div>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../db_connection.php';
// Modify your SQL query to retrieve data at a monthly granularity
$query = 
    "SELECT
        DATE_FORMAT(subquery.sample_date, '%Y-%m') AS date,
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
        DATE_FORMAT(subquery.sample_date, '%Y-%m'),
        subquery.ID,
        antibiotics.antibiotic_name
    ORDER BY
        DATE_FORMAT(subquery.sample_date, '%Y-%m'),
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
        width: 1400,
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
<div class="container">
    <div class="slides slide2">
        <section class="course">
            <!--<h3> Information about visualization provided </h3>-->
            <div class="row">
                <div class="course-col">
                <h2>Usage-chart description</h2>
                <p> The line-chart displays the use of different antibiotics over time. 
                    The data points in this graph are summed to compile the data for each month. 
                    This graph is updated with the newest data possible and will change as fast 
                    as new results are inputted in the BacTrack system. With this chart BacTrack 
                    can spot early trends in overuse of antibiotics or if antibiotics are being 
                    miss/underused. By hovering over different spots in the line-chart, the 
                    number of prescribed antibiotics will be displayed as well as the month 
                    and the name of the antibiotic represented by that line. You can also select 
                    and deselect what antibiotics to be shown in the graph by clicking on the 
                    names in the legend. A single click selects and deselects that antibiotic, 
                    whilst a double-click will only show the antibiotic you clicked.</p>
                </div>
            </div>
        </section>
    </div>
</div>
</div>

</body>
</html>
