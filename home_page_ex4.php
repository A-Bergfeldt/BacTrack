<!DOCTYPE html>
<html>
<head>
    <title>Home page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            
        }
        #section1 {
            background: url('background_ex3.jpg') right bottom no-repeat;
            background-size: cover, auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #section2 {

            background-color: white;
            color: black;
            margin-top: 0;
            height: 100vh;
            align-items: center;
            justify-content: center;
            font-family: Garamond, Courier, monospace;

        }

        #section3 {

            background-color: white;
            color: black;
            margin-top: 0;
            height: 100vh;
            align-items: center;
            justify-content: center;
            font-family: Garamond, Courier, monospace;

}

        h1 {
            font-size: 125px;
            font-family: Garamond, Courier, monospace;
            color: white;
            text-shadow: -2px -2px 2px black;
            text-align: center;
            margin-bottom: 100px;
        }

        h2 {
            font-size: 50px;
            font-family: Garamond, Courier, monospace;
            color: white;
            text-shadow: -2px -2px 2px black;
            text-align: center;
            margin-top: 0;
        }

        /* Style for the navigation menu */
        header {
            background-color: rgba(0, 0, 0, 0) !important;;
            padding: 50px 50px; /* Add some padding for spacing */
        }

        ul {
            list-style-type: none; /* Remove bullet points from the list */
            margin: 0;
            padding: 0;
            text-align: center; /* Center-align the menu items */
        }

        li {
            display: inline; /* Display menu items in a row */
            margin-right: 100px; /* Add spacing between menu items */
        }

        a {
            text-decoration: none; /* Remove underlines from links */
            color: black; /* Text color for menu items */
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        
        <ul>

            <li><a href="#">HOME</a></li>
            <li><a href="#">ABOUT</a></li>
            <li><a href="#">CONTACT</a></li>
            <li><a href="#">STATISTICS</a></li>
            <li><a href="#">LOG IN</a></li>
        </ul>
    </header>
    <div id="section1" class="section">
        <h1>BacTrack</h1>
        <h2>A LIMS used to track AMR</h2>
    </div>
    <section id='section2'>
        <div class="section-content" style="text-align: left; padding-right: 20px;">
            <p style="margin-left: 100px; font-size: 70px; ">About BacTrack</p>
            <img src="section2.jpg" alt="Desktop Image" width="550" height="550" style="float: right; margin-left: 20px; margin-top: -100px;">
            <p style="margin-left: 100px; font-size: 22px;; ">The growing problem of antibiotic resistance (AMR) poses difficulties when it comes to treating bacterial infections. Identifying the root cause of an illness at an early stage can be crucial when it comes to treating these diseases, and can result in a more effective treatment using a tailored antibiotic therapy to the specific infection. This is made possible by a new technique called CombiANT developed by the research group RxDynamics at Uppsala Antibiotic Center (UAC). BacTrack can be used with CombiANT to track bacterial infections, from collecting patient samples to diagnosis and treatment, as well as generating valuable statistical insights of trends in antibiotic resistance. Hopefully with the potential to improve the way we fight bacterial infections.
</p>
        </div>
        <section id='section3'>
        <div class="section-content" style="text-align: left; padding-right: 20px;">
            <p style="margin-left: 100px; font-size: 70px; ">Contact us</p>
    <section>

</body>
</html>
