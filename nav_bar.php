<nav>
    <a href="/home/home_page.php">
        <img src="/logo_main.png" alt="Logo" width="95" height="65">
    </a>
    <ul>
        <li><a href="/home/home_page.php">Home</a></li>
        <li class="dropdown">
            <a href="/about_contact/about_page.php" class="dropbtn">About</a>
            <div class="dropdown-content">
                <a href="service1.php">About BacTrack</a>
                <a href="service2.php">About CombiANT</a>
                <a href="service3.php">About us</a>
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

        if(isset($_SESSION['role_id']) && ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2 || $_SESSION['role_id'] == 3)) {
            echo '<li><a href="/user/my_page.php">My Page</a></li>';
            echo '<li><a href="/logout/logout.php">Logout</a></li>';
        } else {
            echo '<li><a href="/login/login.php">Login</a></li>';
        }
        ?>

    </ul>
</nav>
