<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bactrack";

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!-- This is how you comment out
how much you want -->
<!DOCTYPE html>
<html>
<head>
    <title>Praissy testing statistics page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="statistics_stylesheet_rough.css">
</head>

<body>
    <nav>
        <img src="logo_main.png" alt=""> <!--for the logo -->
        <ul>
            <li><a href ="home_page.php">Home</a></li>
            <li><a href ="about_page.php">About</a></li>
            <li><a href ="contact_page.php">Contact</a></li>
            <li><a href ="statistics_page.php">Statistics</a></li>
            <li><a href ="login.php">Login</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="slides slide1">
            <h1 style="font-size: 100px; color: #fff">Statistics page</h1>
        </div>
    </div>

    <div class="container">
        <div class="slides slide2">
            <!--<h2 style="font-size: 30px; color:black">Services we offer</h2>-->
            <section class="course">
                <h3>Here is a fun way to visualize results</h3>
                <!--<p>blah blah blah</p>-->
                <div class="row">

                    <div class="course-col">
                        <h3>pie-charts</h3>
                        <p>Over a population range</p>
                        <button id="open">
                            read more
                        </button>
                    </div>

                    <div class="course-col">
                        <h3>line-graphs</h3>
                        <p>Over a period of several years</p>
                        <button id="open">
                            read more
                        </button>
                    </div>

                    <div class="course-col">
                        <h3>heatmaps</h3>
                        <p>Over a geographical area</p>
                        <button id="open">
                            read more
                        </button>
                    </div>

                </div>      
            </section>
         </div>
    </div>

    <div class="container">
        <div class="slides slide2">
            <!--<h2 style="font-size: 30px; color:black">Services we offer</h2>-->
            <section class="info">
                <h4> Information about visualization provided </h4>
                <!--<p>blah blah blah</p>-->
                <div class="info-row">

                    <div class="info-col">
                        <h4>pie-charts</h4>
                        <p>Pie charts are a good visualization tool</p>
                        <button id="open">
                            read more
                        </button>
                    </div>

                    <div class="info-col">
                        <h4>line-graphs</h4>
                        <p>These are a good way to look for trends</p>
                        <button id="open">
                            read more
                        </button>
                    </div>

                    <div class="info-col">
                        <h4>heatmaps</h4>
                        <p>One among the best tools to identify trends over a large geographical location</p>
                        <button id="open">
                            read more
                        </button>
                    </div>

                </div>      
            </section>
         </div>
    </div>


</body>
</html>
