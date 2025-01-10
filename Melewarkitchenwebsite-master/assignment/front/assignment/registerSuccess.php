<?php
session_start();
include_once 'config.php';
if(isPost()) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Incorrect email format" .$email;
        die();
    }

    $query = "select * from user where email ='".$email."'";
    $result = $mysqli->query($query);
    if($result->num_rows > 0){
        $data=[];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
        }
        $user=$data[0];
        if(!empty($user)){
            if($user['password'] == $password){
                $_SESSION["username"]= $user['userName'];
                echo "Log in successfully";
//            header("Location: home.php");
            }else{
                echo "Incorrect password";
            }

        }else{
            echo "Log in failed";
        }
    }else{
        echo "This email is not registered" .$email;
    }
    die();
}
?>
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
    

    <title>Login | Melewar Kitchen</title>
</head>
<body>
    <header>
        <?php
        include_once 'nav.php';
        ?>
    </header>
    <!---------------------------------------------------- END OF NAVBAR ---------------------------------------->

    <!----------------------------------------------- PAGE CONTENT START HERE ----------------------------------->
    <main class="bg-image">
        <div class="border">
            <div class="form-box login">
                <h2>Register successfully! You can login now!</h2>
                <form action="login.php" method="post">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input id="email" name="email" type="text" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input id="password" name="password" type="password" required>
                        <label>Password</label>
                    </div>
                    <div class="remember-forgot">
                        <!--<label><input type="checkbox">Remember Me</label>-->
                        <a href="password_reset.html">Forgot Password?</a>
                    </div>
                    <button type="submit" id="loginbtn" class="btnSubmit">Login</button>
                    <div class="login-register">
                        <p>Don't have an account? 
                            <a href="register.php" class="register-link">Register</a> </p>
                    </div>
                </form>
            </div>

            <div class="form-box register">
                <h2>Registration</h2>
                <form action="#">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <input type="text" required>
                        <label>Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="location"></ion-icon></span>
                        <input type="text" required>
                        <label>Address</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input id="emailreg" type="text" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input id="passreg" type="password" required>
                        <label>Password</label>
                    </div>
                    <div class="remember-forgot">
                      
                    </div>
                    <button id="regbtn" type="submit" class="btnSubmit">Register</button>
                    <div class="login-register">
                        <p>Already have an account? 
                            <a href="#" class="login-link">Login</a> </p>
                    </div>
                </form>
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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>