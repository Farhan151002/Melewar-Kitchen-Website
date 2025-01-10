<?php
session_start();
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="./headerfooterstyle.css">
    <link rel="stylesheet" href="./profile.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap">


    <title>Profile</title>
</head>
<body>
<?php
include_once 'nav.php';
?>
<!---------------------------------------------------- END OF NAVBAR ---------------------------------------->

<!----------------------------------------------- PAGE CONTENT START HERE ----------------------------------->
<main class="bg-image">
    <div class="profile_border">
        <div class="form-box login">
            <h2>My Profile</h2>
            <div class="profile_container">
                <table>
                    <tr>
                        <td style="display: flex; align-items: center;"><img src="res/profile_name.png" style="width: 20px; margin-right: 30px;">*Username     : </td>
                        <td id="name" style="text-align: left;">
                            <?php echo $user['userName']?>
                        </td>

                    </tr>
                    <tr>
                        <td style="display: flex; align-items: center;"><img src="res/profile_email.png" style="width: 20px; margin-right: 30px;">*Email address   : </td>
                        <td id="email" style="text-align: left;">
                            <?php echo $user['email']?>
                        </td>
                    </tr>
                    <tr>
                        <td style="display: flex; align-items: center;"><img src="res/profile_phone.png" style="width: 20px; margin-right: 30px;">*Phone number   : </td>
                        <td id="phone" style="text-align: left;">
                            <?php echo $user['phoneNumber']?>
                        </td>
                    </tr>
                    <tr>
                        <td style="display: flex; align-items: center;"><img src="res/profile_pass.png" style="width: 20px; margin-right: 30px;">*Password : </td>
                        <td id="password" style="text-align: left;">
                            <?php echo $user['password']?>
                        </td>
                    </tr>
                    <tr>
                        <td style="display: flex; align-items: center;"><img src="res/profile_birth.png" style="width: 20px; margin-right: 30px;">Birthday  : </td>
                        <td id="birthday" style="text-align: left;">
                        <?php echo $user['birthDate']?>
                        </td>
                    </tr>
                    <tr>
                        <td style="display: flex; align-items: center;"><img src="res/profile_address.png" style="width: 20px; margin-right: 30px;">Address  : </td>
                        <td id="address" style="text-align: left;">
                            <?php echo $user['address']?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1" style="text-align: center;color:red">* Indicates required field. </td>
                    </tr>
                </table>
            </div>
            <div>
                <button class="btn" onclick="location.href='profile-edit.php'">Edit Profile</button>
                <button class="btn" id="delete-account" style="float: right;">Delete Account</button>
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

    // get delete buttons
    const deleteButton = document.querySelector('#delete-account')

    // add event to every button
    deleteButton.addEventListener('click', (event) => {
        //let flag = window.confirm("Are you sure to delete this account?")
        //if (!flag) {
        //    return false
        //} else {
         //   window.location.href = "home.html"
        //}
        window.location.href = "checkDelete.php"
    })

    const urlParams = new URLSearchParams(window.location.search);
    const name = urlParams.get('name');
    const email = urlParams.get('email');
    const phone = urlParams.get('phone');
    const password = urlParams.get('password');
    const address = urlParams.get('address');
    const birthday = urlParams.get('birthday');

    if (name) document.getElementById("name").innerHTML = name;
    if (email) document.getElementById("email").innerHTML = email;
    if (phone) document.getElementById("phone").innerHTML = phone;
    if (password) document.getElementById("password").innerHTML = password;
    if (address) document.getElementById("address").innerHTML = address;
    if (birthday) document.getElementById("birthday").innerHTML = birthday;
</script>
</body>
</html>

