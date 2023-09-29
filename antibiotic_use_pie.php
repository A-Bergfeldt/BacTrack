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
    <div id="year-selector">
        <form method="get" action="antibiotic_use_pie.php">
            <label for="year">Select a Year:</label>
            <select id="year" name="year">
                <?php
                // Define the range of years (2000-2023)
                $startYear = 2000;
                $endYear = 2023;

                // Get the currently selected year (or default to 2023)
                $selectedYear = isset($_GET['year']) ? $_GET['year'] : 2023;

                // Generate the options for the dropdown
                for ($year = $startYear; $year <= $endYear; $year++) {
                    $selected = ($year == $selectedYear) ? 'selected' : '';
                    echo "<option value='$year' $selected>$year</option>";
                }
                ?>
            </select>
            <button id="update-button" type="submit">Update Chart</button>
        </form>
    </div>
    <div id="tester" style="width:600px;height:250px;"></div>
</div>


    <?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once 'db_connection.php';

    $date = isset($_GET['year']) ? $_GET['year'] : 2023;;

    $query = 
            "SELECT
            ID,
            antibiotics.antibiotic_name,
            SUM(COUNTS) AS count 
        FROM 
            (
                SELECT
                    r1.antibiotic_id1 AS ID,
                    COUNT(*) AS COUNTS 
                FROM
                    results AS r1
                INNER JOIN
                    sample ON r1.sample_id = sample.sample_id
                WHERE
                    r1.prescribed = 1
                    AND sample.date_taken LIKE '$date%'
                GROUP BY
                    r1.antibiotic_id1
        
                UNION ALL
        
                SELECT
                    r2.antibiotic_id2 AS ID,
                    COUNT(*) AS COUNTS 
                FROM
                    results AS r2
                INNER JOIN
                    sample ON r2.sample_id = sample.sample_id
                WHERE
                    r2.prescribed = 1
                    AND sample.date_taken LIKE '$date%'
                GROUP BY
                    r2.antibiotic_id2
        
                UNION ALL
        
                SELECT
                    r3.antibiotic_id3 AS ID,
                    COUNT(*) AS COUNTS 
                FROM
                    results AS r3
                INNER JOIN
                    sample ON r3.sample_id = sample.sample_id
                WHERE
                    r3.prescribed = 1
                    AND sample.date_taken LIKE '$date%'
                GROUP BY
                    r3.antibiotic_id3
            ) AS subquery
        INNER JOIN 
            antibiotics ON antibiotics.antibiotic_id = subquery.ID
        GROUP BY
            subquery.ID,
            antibiotics.antibiotic_name";
    $result = $db_connection->query($query);

    $labels  = [];
    $data = [];

    foreach ($result as $row) {
            $labels[] = $row["antibiotic_name"];
            $data[] = $row["count"];}

    $labels = json_encode($labels);
    $data = json_encode($data);
    ?>

    <script>
	TESTER = document.getElementById('tester');
    var data = [{
        values: <?php echo $data; ?>,
        labels: <?php echo $labels; ?>,
        textinfo: "label+percent",
        textposition: "outside",
        automargin: true,
        hole: .35,
        type: 'pie'
    }];

var layout = {
    height: 400,
    width: 500,
    showlegend: false,
    annotations: [
    {
      font: {
        size: 20
      },
      showarrow: false,
      text: <?php echo $date ?>,
      x: 0.5,
      y: 0.5
    }]
};
Plotly.newPlot('tester', data, layout);
</script>
</body>
</html>
