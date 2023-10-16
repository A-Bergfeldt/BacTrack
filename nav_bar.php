<nav>
    <a href="/home/home_page.php">
        <img src="/logo_main1.png" alt="Logo" width="250" height="55">
    </a>
    <ul>
        <li><a href="/home/home_page.php">Home</a></li>
        <li class="dropdown">
            <a href="/about_contact/about_bactrack.php" class="dropbtn">About</a>
            <div class="dropdown-content">
                <a href="/about_contact/about_bactrack.php">BacTrack</a>
                <a href="/about_contact/about_combiant.php">CombiANT</a>
                <a href="/about_contact/privacy_policy.php">Privacy policy</a>
                <a href="/about_contact/the_team.php">The team</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="/about_contact/contactus.php" class="dropbtn">Contact</a>
            <div class="dropdown-content">
                <a href="/about_contact/contactus.php">Contact us</a>
                <a href="/about_contact/FAQs.php">FAQ</a>
            </div>
        </li>
        <li class="dropdown"> 
            <a href="/statistics/statisitcspage_rough.php">Statistics</a>
            <div class="dropdown-content">
                <a href="/statistics/pie_prescribed.php">Usage</a>
                <a href="/statistics/line_prescribed.php">Trends</a>
                <a href="/statistics/heatmap_strain.php">Outbreaks</a>
            </div>
        </li>
        <?php
        session_start();

        if(isset($_SESSION['role_id'])){
            echo '<li class="dropdown">';
            if($_SESSION['role_id'] == 1){
                echo '<a href="/doctor/doctor_page.php" class="dropbtn">My Page</a>';
                echo '<div class="dropdown-content">';
                echo '<a href="/doctor/doctor_page.php">My Samples</a>';
                echo '<a href="/doctor/sample_form.php">Insert new sample</a>';
                echo '<a href="/data_view/search_all_samples.php">Search samples</a>';
            }
            if($_SESSION['role_id'] == 2){
                echo '<a href="/lab/lab_design_input_form.php" class="dropbtn">My Page</a>';
                echo '<div class="dropdown-content">';
                echo '<a href="/lab/lab_design_input_form.php">Sample Input</a>';
            }
            if($_SESSION['role_id'] == 3){
                echo '<a href="/doctor/doctor_page.php" class="dropbtn">My Page</a>';
                echo '<div class="dropdown-content">';
                echo '<a href="/doctor/doctor_page.php">My Samples</a>';
                echo '<a href="/doctor/sample_form.php">Insert new sample</a>';
                echo '<a href="/data_view/search_all_samples.php">Search samples</a>';
                echo '<a href="/lab/lab_design_input_form.php">Sample Input</a>';
            }
            echo '<a href="/login/logout.php">Logout</a>';
            echo '</div>';
            echo '</li>';
        } else {
            echo '<li><a href="/login/login.php">Login</a></li>';
        }
        ?>
    </ul>
</nav>
