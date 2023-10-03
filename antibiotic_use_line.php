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

    $query = 
            "SELECT
            subquery.sample_year AS years,
            subquery.ID,
            antibiotics.antibiotic_name,
            SUM(subquery.COUNTS) AS count 
        FROM 
            (
                SELECT
                    r1.antibiotic_id1 AS ID,
                    COUNT(*) AS COUNTS,
                    YEAR(sample.date_taken) AS sample_year
                FROM
                    results AS r1
                INNER JOIN
                    sample ON r1.sample_id = sample.sample_id
                WHERE
                    r1.prescribed = 1
                GROUP BY
                    r1.antibiotic_id1, YEAR(sample.date_taken)
        
                UNION ALL
        
                SELECT
                    r2.antibiotic_id2 AS ID,
                    COUNT(*) AS COUNTS,
                    YEAR(sample.date_taken) AS sample_year
                FROM
                    results AS r2
                INNER JOIN
                    sample ON r2.sample_id = sample.sample_id
                WHERE
                    r2.prescribed = 1
                GROUP BY
                    r2.antibiotic_id2, YEAR(sample.date_taken)
        
                UNION ALL
        
                SELECT
                    r3.antibiotic_id3 AS ID,
                    COUNT(*) AS COUNTS,
                    YEAR(sample.date_taken) AS sample_year
                FROM
                    results AS r3
                INNER JOIN
                    sample ON r3.sample_id = sample.sample_id
                WHERE
                    r3.prescribed = 1
                GROUP BY
                    r3.antibiotic_id3, YEAR(sample.date_taken)
            ) AS subquery
        INNER JOIN 
            antibiotics ON antibiotics.antibiotic_id = subquery.ID
        GROUP BY
            sample_year,
            subquery.ID,
            antibiotics.antibiotic_name
        ORDER BY
            antibiotics.antibiotic_name
            DESC, sample_year;";
            
    $result = $db_connection->query($query);

    $labels  = [];
    $data = [];
    $years = [];

    foreach ($result as $row) {
            $labels[] = $row["antibiotic_name"];
            $data[] = $row["count"];
            $years[] = $row["years"];}


    $n_years = (int)end($years) - (int)$years[0] + 1;

    $year_chunks = array_chunk($years, $n_years);
    $data_chunks = array_chunk($data, $n_years);

    $year_chunks = json_encode($year_chunks);
    $data_chunks = json_encode($data_chunks);

    $labels = array_unique($labels);
    $labels = json_encode($labels);

    echo $year_chunks;
    echo $data_chunks;
    echo $labels;

    ?>

    <script>
	TESTER = document.getElementById('tester');
    var xData = <?php echo $year_chunks; ?>;
    var yData = <?php echo $data_chunks; ?>;

    var data = [];

    for ( var i = 0 ; i < xData.length ; i++ ) {
    var result = {
        x: xData[i],
        y: yData[i],
        type: 'scatter',
        mode: 'lines',
    };
    data.push(result);
};

var layout = {
  height: 400,
  width: 500,
  showlegend: false
};
Plotly.newPlot('tester', data, layout);
</script>
</body>
</html>
