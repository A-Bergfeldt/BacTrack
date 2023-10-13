<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="heatmap_stylesheet_main.css">
  <!-- Include Plotly.js -->
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body>
  <?php require_once "../nav_bar.php"; ?>
  <h1>DENSITY MAP plotly</h1> 
  <div class="container"> <!--grouping the dropdown and search together-->
  <!-- Dropdown menu to select heatmap option -->
  <form method="get" action="heatmap_strain.php">
    <label for="heatmapOption">Select Heatmap Option:</label> <!--older existing-->
    <select id="heatmapOption" name="strain"><!--older existing-->
      <?php
      require_once "../db_connection.php";
      $sql = "SELECT strain_name FROM strain";
      $result = $db_connection->query($sql);

      $strain = isset($_GET['strain']) ? $_GET['strain'] : "Escheria coli";

      while($row = $result->fetch_assoc()) {
          $selected = ($row['strain_name'] == $strain) ? 'selected' : '';
          echo "<option value='" . $row['strain_name'] . "' $selected>" . $row['strain_name'] . "</option>";
          }
      ?>
    </select>
    <button id="update-button" type="submit" class="button-primary">Show data for selected strain</button>
  </form>
  </div>
  <div class="sidebyside">
  <!-- Div element where the plot will be displayed -->
  <div id="myDiv"></div>

  

  <?php

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

    $query = "SELECT
                hospital.longitude AS lon,
                hospital.latitude AS lat,
                hospital.hospital_name,
                sample.strain_id,
                COUNT(*) AS count
              FROM
                sample
              INNER JOIN
                hospital ON hospital.hospital_id = sample.hospital_id
              INNER JOIN
                strain ON strain.strain_id = sample.strain_id
              WHERE 
                strain.strain_name LIKE '$strain%'
                AND sample.date_taken >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
              GROUP BY
                hospital.longitude, hospital.latitude, hospital.hospital_name, sample.strain_id;";


    $result = $db_connection->query($query);

    $labels  = [];
    $data = [];
    $lon = [];
    $lat = [];

    foreach ($result as $row) {
            $labels[] = $row["hospital_name"];
            $data[] = $row["count"];
            $lon[] = $row["lon"];
            $lat[] = $row["lat"];}

    $labels = array_values(array_unique($labels));
    $lon = array_values(array_unique($lon));
    $lat = array_values(array_unique($lat));

  ?>

  <script>
    // Function to create the density map
    function createDensityMap() {
      var selectedOption = document.getElementById('heatmapOption').value;
      
      // Define the coordinates
      var lon = <?php echo json_encode($lon); ?>;
      var lat = <?php echo json_encode($lat); ?>;


      var data = [{
        type: 'densitymapbox',
        lon: lon,
        lat: lat,
        z: <?php echo json_encode($data); ?>, 
        zauto: true,
        colorscale: 'jet'
      }];

      var layout = {
        width: 700,
        height: 500,
        margin: { l: 50, r: 10, t: 20, b: 20 },
        mapbox: {
          style: 'open-street-map',
          center: { lon: 15.0226667, lat: 59.3426667 }, // Set the center coordinates
          zoom: 4 // Set the initial zoom level
        }
      };

      // Create the Plotly plot
      Plotly.newPlot('myDiv', data, layout);
    }
    window.onload = createDensityMap;
  </script>

  <
<!--
    <div class="content">
      <div class="box">
        <div class="icon"><i class="fa fa-search" aria-hidden="true">
        </i></div>
        <div class="info">
          <h3> search </h3>
          <p> blashhhh </p>
        </div>
      </div>
    </div>-->
  
    <div class="container">
      <div class="slides slide2">
          <section class="course">
              <!--<h3> Information about visualization provided </h3>-->
              <div class="row">
                <div class="course-col">
                  <h3>HEAT MAPS</h3>
                  <p>The heatmap shows what hospital in which your selected strain 
                    was reported in. The data used are the reported strains for the last 
                    365 days. This makes the graph a real-time updated tracking tool for the 
                    latest information about bacterial outbreaks. Only one strain is displayed 
                    at a time so feel free to explore where different strains are found 
                    on a global scale right at this moment with BacTracks heatmap graph. </p>
                </div>
              </div>
          </section>
      </div>
    </div>
  </div>
</body>
</html>