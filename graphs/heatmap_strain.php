<!DOCTYPE html>
<html>
<head>
  <!-- Include Plotly.js -->
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body>
  <h1>Plotly Density Map</h1>

  <!-- Dropdown menu to select heatmap option -->
  <label for="heatmapOption">Select Heatmap Option:</label>
  <select id="heatmapOption">
    <option value="option1">Heatmap Option 1</option> <!-- change name to correct strain --> 
    <option value="option2">Heatmap Option 2</option> <!-- change name to correct strain --> 
    <option value="option3">Heatmap Option 3</option> <!-- change name to correct strain --> 
  </select>
  
  <!-- Button to create the Plotly plot -->
  <button onclick="createDensityMap()">Create Density Map</button>
  
  <!-- Div element where the plot will be displayed -->
  <div id="myDiv" style="width: 600px; height: 400px;"></div>




  <?php

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  require_once "../db_connection.php";

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
              GROUP BY
                hospital.longitude, hospital.latitude, hospital.hospital_name, sample.strain_id;";


  $result = $db_connection->query($query);

    $labels  = [];
    $data = [];
    $lon = [];
    $lat = [];

    foreach ($result as $row) {
            $labels[] = $row["hospiatal_name"];
            $data[] = $row["count"];
            $lon[] = $row["lon"];
            $lat[] = $row["lat"];}

      echo $labels . $data . $lon . $lat;

  ?>




  <script>
    // Function to create the density map
    function createDensityMap() {
      var selectedOption = document.getElementById('heatmapOption').value;
      
      // Define the coordinates
      var lon = [18.0226667, 11.9549972, 17.640241];
      var lat = [59.3426667, 57.6833306, 59.849838];

      // Define "z" values based on the selected option
      var z;
      if (selectedOption === 'option1') {
        z = [1, 10, 5]; // Option 1
      } else if (selectedOption === 'option2') {
        z = [6, 3, 5]; // Option 2
      } else if (selectedOption === 'option3') {
        z = [3, 8, 2]; // Option 3 (New Option)
      }

      var data = [{
        type: 'densitymapbox',
        lon: lon,
        lat: lat,
        z: z, // Use the selected "z" values
        zauto: false, // Automatically scale the dot size based on "z" values
        zmin: 1,
        zmax: 10,
        colorscale: 'jet'
      }];

      var layout = {
        width: 850,
        height: 850,
        mapbox: {
          style: 'open-street-map',
          center: { lon: 15.0226667, lat: 59.3426667 }, // Set the center coordinates
          zoom: 5 // Set the initial zoom level
        }
      };

      // Create the Plotly plot
      Plotly.newPlot('myDiv', data, layout);
    }
    window.onload = createDensityMap;
  </script>
</body>
</html>
