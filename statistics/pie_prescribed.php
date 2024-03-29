<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="piechart_stylesheet_main.css">
    <title>Antibiotics through a year</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <script src="https://cdn.plot.ly/plotly-2.26.0.min.js" charset="utf-8"></script>
</head>
<body>
    <?php require_once "../nav_bar.php"; ?>
    <div class="container">
        <h1>General use of Antibiotics in a year</h1>
        <div id="year-selector">
            <form method="get" action="pie_prescribed.php">
                <label for="year" style="margin-left:130x"></label>
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
                <button id="update-button" type="submit" class="button-primary">Select year</button>
            </form>
        </div>
        <div id="tester" style="width:400px;height:250px;margin-left:10%"></div>
    <div class="sidebyside">
    <!--</div>-->

    <?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once '../db_connection.php';

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
            antibiotics.antibiotic_name
        ORDER BY
            antibiotics.antibiotic_name";

    $result = $db_connection->query($query);

    $labels  = [];
    $data = [];

    foreach ($result as $row) {
            $labels[] = $row["antibiotic_name"];
            $data[] = $row["count"];}

    $dictionary = array_combine($labels, $data);
    unset($dictionary['No antibiotic']);

    $labels = array_keys($dictionary);
    $data = array_values($dictionary);
    ?>

    <script>

	TESTER = document.getElementById('tester');
    var data = [{
        values: <?php echo json_encode($data); ?>,
        labels: <?php echo json_encode($labels); ?>,
        textinfo: "label+percent",
        textposition: "outside",
        automargin: true,
        hole: .35,
        textfont:40,
        type: 'pie',
        sort: false
    }];

var layout = {
    height: 600,
    width: 500,
    showlegend: false,
    font: {
        family: 'Poppins, sans seriff',
        size:18},

    annotations: [
    {
      font: {
        family: 'Poppins, sans seriff',
      },
      showarrow: false,
      text: <?php echo $date ?>,
      x: 0.5,
      y: 0.5
    }]
};
Plotly.newPlot('tester', data, layout);
</script>

<div class="container">
    <!--<div class="slides slide2">-->
            <section class="course">
              <!--<h3> Information about visualization provided </h3>-->
            <div class="row">
                <div class="course-col">
                  <h3> Prescription-chart description</h3>
                  <p>The pie-chart displays the share for all prescribed antibiotics for 
                    your selected year. The default year is the current year, but user can
                    explore previous years as well. By hovering over the different 
                    slices of the pie-chart, the number of times a particular antibiotic has been 
                    prescribed globally will be displayed, as well as the percentage and the 
                    name of the antibiotic represented by that slice.</p>
                </div>
            </div>
            </section>
    </div>
</div>
</div>
</body>
</html>
