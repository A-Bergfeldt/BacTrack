<!DOCTYPE html>
<html>
<head>
    <title>Statistics page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="statistics_stylesheet_rough.css">
</head>

<body>
    <?php require_once "../nav_bar.php"; ?>

        <div class="container">
            <!--<div class="slide1">-->
                <!--<h2 style="font-size: 30px; color:black">Services we offer</h2>-->
                <section class="course">
                    <h3>Analytics from the BacTrack Database</h3>
                    <p>BacTrack collects multiple daily entries containing data on prescribed antibiotics for various strains of bacteria. Below, you'll 
                    <br>find a selection of visualization tools showcasing different types of data. 
                    <br>Click on any box to explore further data.</p>
                    <div class="row">

                        <a class="course-col" href="pie_prescribed.php">
                            <h3>USAGE</h3>
                            <p>Pie chart of the antibiotics used on a yearly basis</p>
                        </a>

                        <a class="course-col" href="line_prescribed.php">
                            <h3>TRENDS</h3>
                            <p>Line chart showing the probable use of antibiotics over several years</p>
                        </a>

                        <a class="course-col" href="heatmap_strain.php">
                            <h3>OUTBREAKS</h3>
                            <p>Bubble plot of the strains of bacteria present in different areas globally</p>
                        </a>
                    </div>      
                </section>
            </div>

</body>
</html>
