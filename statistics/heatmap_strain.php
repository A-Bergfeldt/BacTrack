<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="heatmap_stylesheet.css">
  <!-- Include Plotly.js -->
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body>
  <h1>Plotly Density Map</h1>
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
  <!-- Div element where the plot will be displayed -->
  <div id="customMapContainer"></div>

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
        width: 850,
        height: 850,
        mapbox: {
          style: 'open-street-map',
          center: { lon: 15.0226667, lat: 59.3426667 }, // Set the center coordinates
          zoom: 8 // Set the initial zoom level
        }
      };

      // Create the Plotly plot
      Plotly.newPlot('customMapContainer', data, layout);
    }
    window.onload = createDensityMap;
  </script>
</body>
</html>