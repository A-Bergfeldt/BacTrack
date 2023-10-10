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
                    <h3> Information about visualization provided </h3>
                    <div class="row">

                        <div class="course-col">
                            <h3>pie-charts</h3>
                            <p>Pie charts are a good visualization tool</p>
                            <button id="open">
                            <a href="pie_prescribed.php">Open Page</a>
                            </button>
                        </div>

                        <div class="course-col">
                            <h3>line-graphs</h3>
                            <p>These are a good way to look for trends</p>
                            <button id="open">
                                <a href="line_prescribed.php">Open Page</a>
                            </button>
                        </div>

                        <div class="course-col">
                            <h3>heatmaps</h3>
                            <p>One among the best tools to identify trends over a large geographical location</p>
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
