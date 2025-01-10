<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="./headerfooterstyle.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap">
    
    <style>
    .hidden {
    display: none;
    }
    </style>    

    <title>Menu | Melewar Kitchen</title>
</head>
<body>
<header>
    <?php
    session_start();
    include_once 'nav.php';
?>
</header>
    <!---------------------------------------------------- END OF NAVBAR ---------------------------------------->

    <!----------------------------------------------- PAGE CONTENT START HERE ----------------------------------->
    <main class="bg-image">
        <div class="row animate" style="max-height: 1000px;">
            <div class="col"><br>
                <h1 class="text-center-topic">Welcome to Melewar Kitchen's</h1>
                <h4 class="text-center">Menu</h4><br>
                <span style="color: black;">
                <?php include_once 'config.php';
                $query = "SELECT * FROM food";
                $result = $mysqli->query($query);
                
                ?></span>
                <div class="tab">
                    <button class="btn tablinks" onclick="openMenu(event, 'Food')" id="myLink">Food</button>
                    <button class="btn tablinks" onclick="openMenu(event, 'Drinks')">Drinks</button>
                    <button class="btn tablinks" onclick="openMenu(event, 'Dessert')">Dessert</button>                    
                </div>

                <div id="Food" class="wrapper tabcontent">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                               
                        <h1 id="foodId" class="hidden"><?php echo $row['foodID'];?></h1>
                        <h1 id="name"><b><?php echo $row['foodName']; ?></b><span class="box">RM<?php echo $row['foodPrice']; ?></span></h1>
                        <img src="./res/<?php echo $row['foodLoc'];?>" height="100px" width="100px">
                        <p id="description"><?php echo $row['foodDesc']; ?></p>
                        <hr>
          
                    <?php } ?>  
                                                         
                </div>
                <div id="Drinks" class="wrapper tabcontent">
                    <?php $query = "SELECT * FROM drink";
                        $result = $mysqli->query($query)?>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                               
                        <h1 id="drinkId" class="hidden"><?php echo $row['drinkID'];?></h1>
                        <h1 id="name"><b><?php echo $row['drinkName']; ?></b><span class="box">RM<?php echo $row['drinkPrice']; ?></span></h1>
                        <img src="./res/<?php echo $row['drinkLoc'];?>" height="100px" width="100px">
                        <p id="description"><?php echo $row['drinkDesc']; ?></p>
                        <hr>
                 
                    <?php } ?>  

                </div> 
                <div id="Dessert" class="wrapper tabcontent">
                    <?php $query = "SELECT * FROM dessert";
                        $result = $mysqli->query($query)?>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                               
                        <h1 id="dessertId" class="hidden"><?php echo $row['dessertID'];?></h1>
                        <h1 id="name"><b><?php echo $row['dessertName']; ?></b><span class="box">RM<?php echo $row['dessertPrice']; ?></span></h1>
                        <img src="./res/<?php echo $row['dessertLoc'];?>" height="100px" width="100px">
                        <p id="description"><?php echo $row['dessertDesc']; ?></p>
                        <hr>
                 
                    <?php } ?>  

                </div>                 
                <br>
            </div>
        </div>
    </main>
    <!------------------------------------------------- END OF PAGE CONTENT ------------------------------------->

    <footer class="footer">
        <div class="container footer-container">
            <div class="footer-1">
                <a href="home.html" class="footer-logo"><h4>Melewar Kitchen</h4></a>
                <p>
                    Your Favourite Delicacies,<br> Truly Nogori!
                </p>
            </div>

            <div class="footer-2">
                <h4>Permalinks</h4>
                <ul class="permalinks">
                    <li><a href="home.html">Home</a></li>
                    <li><a href="menu.html">Menu</a></li>
                    <li><a href="reservation.html">Reservation</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="profile.html">Profile</a></li>
                </ul>
            </div>

            <div class="footer-3">
                <h4>Privacy</h4>
                <ul class="privacy">
                    <li><a href="privacy policy.html">Privacy Policy</a></li>
                    <li><a href="terms&condition.html">Terms & Conditions</a></li>
                    <li><a href="return policy.html">Refund Policy</a></li>
                </ul>
            </div>

            <div class="footer-4">
                <h4>Contact Us</h4>
                <div>
                    <p>+(01)234567898</p>
                    <p>melewarkitchen@gmail.com</p>
                </div>

                <ul class="footer-socials">
                    <li>
                        <a href="#"><i class="uil uil-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="uil uil-instagram-alt"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="uil uil-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="uil uil-linkedin-alt"></i></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-copyright">
            <small>All Right Reserved &copy; 2023 - Melewar Kitchen</small>
        </div>
    </footer>
    <!------------------------------------------------ End Of Footer ---------------------------------------------->

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="./navmenu.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            //when window width is >= 600px
            breakpoints: {
                600: {
                    slidesPerView: 2
                }
            }
        });
    </script>
</body>
</html>

