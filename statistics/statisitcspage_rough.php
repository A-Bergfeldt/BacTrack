<!DOCTYPE html>
<html>
<head>
    <title>Praissy testing statistics page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="statistics_stylesheet_rough.css">
</head>

<body>
    <?php require_once "../nav_bar.php"; ?>

        <div class="container">
            <div class="slides slide2">
                <!--<h2 style="font-size: 30px; color:black">Services we offer</h2>-->
                <section class="course">
                    <h3> Analytics from the BacTrack Database </h3>
                    <p style="font-size: 20px;">BacTrack collects multiple daily entries containing data on prescribed antibiotics for various strains of bacteria. 
                        Below, you'll find a selection of visualization tools showcasing different types of data. Click on any box to explore further details.</p>

                    <div class="row">

                        <div class="course-col">
                            <h3>Usage</h3>
                            <p>Pie chart of the antibiotic use on a yearly basis</p>
                            <button id="open">
                            <a href="pie_prescribed.php">Open Page</a>
                            </button>
                        </div>

                        <div class="course-col">
                            <h3>Trends</h3>
                            <p>Line chart showing the monthly use of antibiotics over multiple years</p>
                            <button id="open">
                                <a href="line_prescribed.php">Open Page</a>
                            </button>
                        </div>

                        <div class="course-col">
                            <h3>Outbreaks</h3>
                            <p>Heatmap of where strains of bacteria were found to spot spread and outbreaks</p>
                            <button id="open">
                                <a href="heatmap_strain.php">Open Page</a>
                            </button>
                        </div>

                    </div>      
                </section>
            </div>
        </div>

</body>
</html>
