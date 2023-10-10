<nav>
    <a href="/home/home_page.php">
        <img src="/logo_main.png" alt="Logo" width="95" height="65">
    </a>
    <ul>
        <li><a href="/home/home_page.php">Home</a></li>
        <li class="dropdown">
            <a href="#" class="dropbtn">About</a>
            <div class="dropdown-content">
                <a href="/about_contact/about_bactrack.php">BacTrack</a>
                <a href="/about_contact/about_combiant.php">CombiANT</a>
                <a href="/about_contact/GDPR.php">Privacy policy</a>
                <a href="/about_contact/the_team.php">The team</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="/about_contact/contactus.php" class="dropbtn">Contact</a>
            <div class="dropdown-content">
                <a href="/about_contact/contactus.php">Contact us</a>
                <a href="/about_contact/contactus.php">FAQ</a>
            </div>
        </li>
        <li><a href="/statistics/statisitcspage_rough.php">Statistics</a></li>
        <?php
        session_start();

        if(isset($_SESSION['role_id'])){
            echo '<li class="dropdown">';
            echo '<a href="#" class="dropbtn">My Page</a>';
            echo '<div class="dropdown-content">';
            if($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 3){
                echo '<a href="/doctor/doctor_page.php">My Samples</a>';
            }
            if($_SESSION['role_id'] == 2 || $_SESSION['role_id'] == 3){
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
