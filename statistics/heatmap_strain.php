<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="heatmap_stylesheet_main.css">
  <!-- Include Plotly.js -->
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body>
  <?php require_once "../nav_bar.php"; ?>
  <h1>DENSITY MAP</h1>
  <div class="container">
    <!-- Dropdown menu to select heatmap option -->
    <form method="get" action="heatmap_strain.php">
      <label for="heatmapOption">Strain selection:</label>
      <select id="heatmapOption" name="strain">
        <?php
        require_once "../db_connection.php";
        $sql = "SELECT strain_name FROM strain";
        $result = $db_connection->query($sql);

        $strain = isset($_GET['strain']) ? $_GET['strain'] : "Escheria coli";

        while ($row = $result->fetch_assoc()) {
          $selected = ($row['strain_name'] == $strain) ? 'selected' : '';
          echo "<option value='" . $row['strain_name'] . "' $selected>" . $row['strain_name'] . "</option>";
        }
        ?>
      </select>
      <button id="update-button" type="submit" class="button-primary">Show data</button>
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

    $labels = [];
    $data = [];
    $lon = [];
    $lat = [];

    foreach ($result as $row) {
      $labels[] = $row["hospital_name"];
      $data[] = $row["count"];
      $lon[] = $row["lon"];
      $lat[] = $row["lat"];
    }

    $labels = array_values(array_unique($labels));
    $lon = array_values(array_unique($lon));
    $lat = array_values(array_unique($lat));

    ?>

    <script>
      // Function to create the bubble plot with text labels
      function createBubblePlot() {
        var selectedOption = document.getElementById('heatmapOption').value;

        // Define the coordinates, bubble sizes, and text labels
        var lon = <?php echo json_encode($lon); ?>;
        var lat = <?php echo json_encode($lat); ?>;
        var bubbleSizes = <?php echo json_encode($data); ?>;
        var labels = <?php echo json_encode($labels); ?>;

        // Define a color scale for the bubble plot (Viridis in this example)
        var colorScale = 'Jet';
        var hoverText = [];
        var scale = 1;


        for ( var i = 0 ; i < bubbleSizes.length; i++) {
          var currentSize = bubbleSizes[i] / scale;
          var currentText = labels[i] + " : " + bubbleSizes[i];
          bubbleSizes.push(currentSize);
          hoverText.push(currentText);
    }

        var data = [{
          type: 'scattermapbox',
          lon: lon,
          lat: lat,
          mode: 'markers',
          text: labels, // Display text labels when hovering
          textposition: 'top center', // Adjust the position of the labels
          marker: {
            size: bubbleSizes,
            color: bubbleSizes, // Use bubble size as the color scale
            colorscale: colorScale, // Set the color scale
            colorbar: {
              title: 'Count', // Label for the color scale
            },
          }
        }];

        var layout = {
          width: 700,
          height: 500,
          margin: { l: 50, r: 10, t: 20, b: 20 },
          mapbox: {
            style: 'open-street-map',
            center: { lon: 15.0226667, lat: 59.3426667 },
            zoom: 4
          }
        };

        // Create the Plotly plot
        Plotly.newPlot('myDiv', data, layout);
      }

      window.onload = createBubblePlot;
    </script>

    <div class="container">
      <div class="slides slide2">
        <section class="course">
          <div class="row">
            <div class="course-col">
              <h3>BUBBLE PLOT</h3>
              <p>The bubble plot shows what hospital your selected strain was reported in. The size and color of the bubbles indicate the number of reports in each hospital, with darker colors representing higher values. When hovering over the bubbles, you can see the actual number of reports for each hospital. The data used are the reported strains for the last 365 days. Explore where different strains are found on a global scale right at this moment with BacTracks bubble plot.</p>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</body>
</html>
