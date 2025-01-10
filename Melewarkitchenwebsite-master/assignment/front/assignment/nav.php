
<nav>
        <div class="container nav-container">
            <a href="home.php">
                <img src="./res/logo.jpg"  alt="melewarkitchenlogo" width="100px">
            </a>
            <ul class="nav-menu">
                <li><a href="home.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>

                <?php
                if (isset($_SESSION["userID"]))
                {
                    ?>
                    <li><a href="reservation.php">Reservation</a></li>
                    <li><a href="logout.php">logout</a></li>
                    <li><a href="profile.php">Profile</a></li>
                <?php }else{
                    ?>
                    <li><a href="loginmain.php">Login / Register</a></li>
                       <?php
                }
                ?>
            </ul>
            <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
            <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>