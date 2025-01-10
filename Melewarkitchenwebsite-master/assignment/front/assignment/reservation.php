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

    <title>Home | Melewar Kitchen</title>
</head>
<body>
<header>
    <?php
    session_start();
    include_once 'nav.php';

    include_once 'config.php';
    $user=[];

    $query = "select * from user where userID ='".$_SESSION["userID"]."'";
    $result = $mysqli->query($query);
    if($result->num_rows > 0){
        $data=[];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
        }
        $user=$data[0];
    }
?>
</header>
    <!---------------------------------------------------- END OF NAVBAR ---------------------------------------->

    <!----------------------------------------------- PAGE CONTENT START HERE ----------------------------------->

    <main class="bg-image">
        <div class="reservation_row" style="max-height: 1500px;">
            <div class="col" style="background-image:url('res/background.jpeg');"><br>
                    <h1 class="text-center-topic" style="margin-top: -20px;">Menu it here!</h1>
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
    
                    <div id="Food" class="wrapper tabcontent ex1">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                               
                               <h1 id="foodId" class="hidden"><?php echo $row['foodID'];?></h1>
                               <h1 id="name"><b><?php echo $row['foodName']; ?></b><span class="box">RM<?php echo $row['foodPrice']; ?></span></h1>
                               <img src="./res/<?php echo $row['foodLoc'];?>" height="100px" width="100px">
                               <p id="description"><?php echo $row['foodDesc']; ?></p>
                               <hr>
                 
                           <?php } ?>  
                                          
                    </div>
                    <div id="Drinks" class="wrapper tabcontent ex1">
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
                    <div id="Dessert" class="wrapper tabcontent ex1">
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
            
            <div class="col" style="height: 600px;">
                <div class="container-reservation animate">
                    <h1>Book a Table</h1>
                    <form action="details_entry.php" method="post">
                        <div class="form-group">
                            <label class="reservation" for="name" style="display: inline-block; margin-right: 100px; text-align: left;">Name:</label>
                            <input type="text" id="name" name="name" required value="<?php echo $user['userName']?>">
                        </div>

                        <div class="form-group">
                            <label class="reservation" for="email" style="display: inline-block; margin-right: 100px; text-align: left;">Email:</label>
                            <input type="email" id="email" name="email" required value="<?php echo $user['email']?>">
                        </div>
        
                        <div class="form-group">
                            <label class="reservation" for="phone" style="display: inline-block; margin-right: 100px; text-align: left;">Phone:</label>
                            <input type="tel" id="phone" name="phone" required value="<?php echo $user['phoneNumber']?>">
                        </div>
                        <div class="form-group" >
                            <div style="display: inline-block;">
                                <label class="reservation" for="date"style="text-align: left;" >Date:</label>
                                <input type="date" id="date" name="date" required style="margin-right: 20px;">
                            </div>
                        </div>
                        <div class="form-group">
                            
                                <label class="reservation" for="time" >Time (in system 24h):</label>
                                <select id="time" name="time" required>
                                <option value="">Select a time</option>
                                <option value="1">09:00 - 11:00</option>
                                <option value="2">11:00 - 13:00</option>
                                <option value="3">13:00 - 15:00</option>
                                <option value="4">15:00 - 17:00</option>
                                </select>
                            
                        </div>
            
                        
                        <div class="form-group">
                            <label class="reservation" for="guests" style="display: inline-block; margin-right: 10px; text-align: left;margin-bottom: 13px; ">Number of Guests:</label>
                            <input type="number" id="guests" name="guests" min="1" max="20" required >
                        </div>

                        <div class="form-group">
                            <label class="reservation" for="table-number" sstyle="display: inline-block; margin-right: 30px; text-align: left;">Table Number:</label>
                            <select id="table-number" name="table-number" required style="width: 200px; height:30px;border-radius: 5px;">
                        </div>

            
                        <option value="">Select a table number</option>
                        <option value="1">Table 1</option>
                        <option value="2">Table 2</option>
                        <option value="3">Table 3</option>
                        <option value="4">Table 4</option>
                        <option value="5">Table 5</option>
                        <option value="6">Table 6</option>
                        <option value="7">Table 7</option>
                        <option value="8">Table 8</option>
                        <option value="9">Table 9</option>
                        <option value="10">Table 10</option>
                        </select>
        
                        <h2>Pre-Order Menu Items</h2>
        
                        <div>
                          <label for="item1">Item 1:</label>
                          <input type="text" id="item1" name="item1" placeholder="Enter item name" required>
                          <input type="number" id="item1-quantity" name="item1-quantity" placeholder="Quantity" min="1" max="10">
                        </div>
                      
                        <div>
                          <label for="item2">Item 2:</label>
                          <input type="text" id="item2" name="item2" placeholder="Enter item name">
                          <input type="number" id="item2-quantity" name="item2-quantity" placeholder="Quantity" min="1" max="10">
                        </div>
                      
                        <div>
                          <label for="item3">Item 3:</label>
                          <input type="text" id="item3" name="item3" placeholder="Enter item name">
                          <input type="number" id="item3-quantity" name="item3-quantity" placeholder="Quantity" min="1" max="10">
                        </div>
                      
                        <div>
                          <label for="item4">Item 4:</label>
                          <input type="text" id="item4" name="item4" placeholder="Enter item name" required>
                          <input type="number" id="item4-quantity" name="item4-quantity" placeholder="Quantity" min="1" max="10">
                        </div>
            
                        <div>
                            <label for="item5">Item 5:</label>
                            <input type="text" id="item5" name="item5" placeholder="Enter item name" required>
                            <input type="number" id="item5-quantity" name="item5-quantity" placeholder="Quantity" min="1" max="10">
                        </div>
            
                        <input type="submit" value="Book Table">
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- <main class="bg-image-reservation ">
        <div class="container-reservation animate">
            <h1>Book a Table</h1>
            <form action="#" method="post">
                <label class="reservation" for="name">Name:</label>
                <input type="text" id="name" name="name" required>
    
                <label class="reservation" for="email">Email:</label>
                <input type="email" id="email" name="email" required>
    
                <label class="reservation" for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required>
    
                <label class="reservation" for="date">Date:</label>
                <input type="date" id="date" name="date" required>
    
                <label class="reservation" for="time">Time:</label>
                <input type="time" id="time" name="time" required>
    
                <label class="reservation" for="guests">Number of Guests:</label>
                <input type="number" id="guests" name="guests" min="1" max="20" required>
    
                <label class="reservation" for="table-number">Table Number:</label>
                <select id="table-number" name="table-number" required style="width: 365px; height:35px;border-radius: 5px;">

                <option value="">Select a table number</option>
                <option value="1">Table 1</option>
                <option value="2">Table 2</option>
                <option value="3">Table 3</option>
                <option value="4">Table 4</option>
                <option value="5">Table 5</option>
                <option value="6">Table 6</option>
                <option value="7">Table 7</option>
                <option value="8">Table 8</option>
                <option value="9">Table 9</option>
                <option value="10">Table 10</option>
                </select>

                <h2>Pre-Order Menu Items</h2>

                <div>
                  <label for="item1">Item 1:</label>
                  <input type="text" id="item1" name="item1" placeholder="Enter item name" required>
                  <input type="number" id="item1-quantity" name="item1-quantity" placeholder="Quantity" min="1" max="10" required>
                </div>
              
                <div>
                  <label for="item2">Item 2:</label>
                  <input type="text" id="item2" name="item2" placeholder="Enter item name" required>
                  <input type="number" id="item2-quantity" name="item2-quantity" placeholder="Quantity" min="1" max="10" required>
                </div>
              
                <div>
                  <label for="item3">Item 3:</label>
                  <input type="text" id="item3" name="item3" placeholder="Enter item name" required>
                  <input type="number" id="item3-quantity" name="item3-quantity" placeholder="Quantity" min="1" max="10" required>
                </div>
              
                <div>
                  <label for="item4">Item 4:</label>
                  <input type="text" id="item4" name="item4" placeholder="Enter item name" required>
                  <input type="number" id="item4-quantity" name="item4-quantity" placeholder="Quantity" min="1" max="10" required>
                </div>
    
                <div>
                    <label for="item5">Item 5:</label>
                    <input type="text" id="item5" name="item5" placeholder="Enter item name" required>
                    <input type="number" id="item5-quantity" name="item5-quantity" placeholder="Quantity" min="1" max="10" required>
                </div>
    
                <input type="submit" value="Book Table">
            </form>
        </div>
    </main> -->
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

