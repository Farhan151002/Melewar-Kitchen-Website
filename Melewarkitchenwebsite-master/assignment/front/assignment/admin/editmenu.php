
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="./admin.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap">
    
    <style>
    .hidden {
    display: none;
    }
    </style>

    <title>Admin | Melewar Kitchen</title>
</head>
<body>
    <nav>
        <div class="container nav-container">
            <a href="home.html">
                <img src="./res/logo.jpg"  alt="melewarkitchenlogo" width="100px">
            </a>
            <ul class="nav-menu">
                <li><a href="home.html">Home</a></li>
                <li><a href="user.php">User Management</a></li>
                <li><a href="table.php">Table Management</a></li>
                <li><a href="editmenu.php">Menu Management</a></li>
                <li><a href="/front/assignment/home.html">Logout</a></li>
            </ul>
            <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
            <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>
    <!---------------------------------------------------- END OF NAVBAR ---------------------------------------->

    <!----------------------------------------------- PAGE CONTENT START HERE ----------------------------------->
    <main class="bg-image">
        <!-- User Management Section -->
        <div class="user-management-section">
            <div class="admin" style="max-width: 930px;">
                <h2>Admin Section</h2>
                <span style="color: black;">
                <?php include_once 'config.php';
                $query = "SELECT * FROM food";
                $result = $mysqli->query($query);
                
                ?></span>
                <div class="user-management">
                    <h3>Menu Management</h3>
                    <ul>
                    <li><a href="#" class="view-users-link text-center" style="background-color: #ff726f;"><strong>View Menu</strong></a></li>
                        <p style="color: red; font-size: small">*press the column to update</p>
                        <div class="view-users-linkk">
                            <p style="color: black;">Menu category: </p>
                            <button class="menubutton tablinks" onclick="openMenu(event, 'Food')" id="myLink">Food</button>
                            <button class="menubutton tablinks" onclick="openMenu(event, 'Drinks')">Drinks</button>
                            <button class="menubutton tablinks" onclick="openMenu(event, 'Dessert')">Dessert</button>
                        </div>
                        <table id="Food" class="wrapper tabcontent">
                            <thead>
                                <tr>
                                    <th class="hidden">Food ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                <td id="foodId" class="hidden"><?php echo $row['foodID'];?></td>
                                <td id="name"><?php echo $row['foodName']; ?></td>
                                <td id="imagePreview"><img src="./res/<?php echo $row['foodLoc'];?>" height="100px" width="100px"></td>
                                <td id="description"><?php echo $row['foodDesc']; ?></td>
                                <td id="price">RM<?php echo $row['foodPrice']; ?></td>
                                </tr>
                                <?php } ?>                             
                            </tbody>
                        </table>
                        <table id="Drinks" class="wrapper tabcontent">
                        <thead>
                                <tr>
                                    <th class="hidden">Drink ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $query = "SELECT * FROM drink";
                                  $result = $mysqli->query($query)?>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                <td id="drinkId" class="hidden"><?php echo $row['drinkID'];?></td>
                                <td id="name"><?php echo $row['drinkName']; ?></td>
                                <td id="imagePreview"><img src="./res/<?php echo $row['drinkLoc'];?>" height="100px" width="100px"></td>
                                <td id="description"><?php echo $row['drinkDesc']; ?></td>
                                <td id="price">RM<?php echo $row['drinkPrice']; ?></td>
                                </tr>
                                <?php } ?>                             
                            </tbody>
                      </table>    
                      <table id="Dessert" class="wrapper tabcontent">
                      <thead>
                                <tr>
                                    <th class="hidden">Dessert ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $query = "SELECT * FROM dessert";
                                  $result = $mysqli->query($query)?>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                <td id="drinkId" class="hidden"><?php echo $row['dessertID'];?></td>
                                <td id="name"><?php echo $row['dessertName']; ?></td>
                                <td id="imagePreview"><img src="./res/<?php echo $row['dessertLoc'];?>" height="100px" width="100px"></td>
                                <td id="description"><?php echo $row['dessertDesc']; ?></td>
                                <td id="price">RM<?php echo $row['dessertPrice']; ?></td>
                                </tr>
                                <?php } ?>                             
                            </tbody>
                    </table>                                                                                                                                                                               
                <!-- The form for updating user information -->
                
                <form action="updatemenu.php" class="update-user-form" method="post" enctype="multipart/form-data">
                              <br><h2>Update Menu Information</h2>
                              <div class="form-group">
                              <label for="name">Name:</label>
                              <input type="hidden" id="foodcategory" name="foodcategory">
                              <input type="hidden" id="foodID" name="foodID">
                              <input type="text" id="foodname" name="name">
                              </div>
                              <div class="form-group">
                              <label for="image">Image:</label>
                              <img id="image" height="100px" width="100px">
                              <input type="hidden" id="imageOld" name="imageOld" value="hahaha">
                              <label>Upload new image to update: <input type="file" name="imageNew"></label>
                              </div>
                              <div class="form-group">
                              <label for="description">Description:</label>
                              <textarea rows="4" cols="50" type="text" id="fooddescription" name="description"></textarea>
                              </div>
                              <div class="form-group">
                                  <label for="price">Price(RM):</label>
                                  <input type="text" id="foodprice" name="price">
                                  </div>
                              <input type="submit" name="update" value="Update">
                              <input type="submit" name="delete" value="Delete">
                          </form>
                          

                    </ul>                    
 
                    </div>                 
                    <br>
                    <a href="updatemenu.html" class="update-users-link" style="color: black;"><input type="submit" value="Add Menu"></a>
                    <br>
                </div>
            </div>
        </div>
          
        
    </main>
    <!------------------------------------------------- END OF PAGE CONTENT ------------------------------------->

    <footer class="footer">
        <div class="footer-copyright">
            <small>All Right Reserved &copy; 2023 - Melewar Kitchen</small>
        </div>
    </footer>
    <!------------------------------------------------ End Of Footer ---------------------------------------------->

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="./admin.js"></script>

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
    <script>
  // Add event listener to table rows
  const foodRows = document.querySelectorAll('#Food tbody tr');
  const drinkRows = document.querySelectorAll('#Drinks tbody tr');
  const dessertRows = document.querySelectorAll('#Dessert tbody tr');
  foodRows.forEach(row => {
    row.addEventListener('click', function() {
        form.classList.add('active');
       // dlete.classList.add('active');
      // Get the data from the clicked row
      
    const foodId = this.cells[0].innerText;
    const name = this.cells[1].innerText;
    const imageSrc = this.cells[2].querySelector('img').src;
    const description = this.cells[3].innerText;
    const price = this.cells[4].innerText;
    const numericPrice = parseFloat(price.replace("RM", ""));
    const formattedPrice = numericPrice.toFixed(2);

    const imageName = imageSrc.replace("http://localhost/Melewarkitchenwebsite/assignment/front/assignment/admin/", "./"); 

    console.log(foodId);
      // Populate the form with the data
      document.getElementById('foodcategory').value= 'food';
      document.getElementById('foodID').value = foodId;
      document.getElementById('foodname').value = name;
      document.getElementById('image').src = imageName;
      document.getElementById('imageOld').value = imageName;
      document.getElementById('fooddescription').value = description;
      document.getElementById('foodprice').value = formattedPrice;
    });
  });
  drinkRows.forEach(row => {
    row.addEventListener('click', function() {
        form.classList.add('active');
       // dlete.classList.add('active');
      // Get the data from the clicked row
      
    const foodId = this.cells[0].innerText;
    const name = this.cells[1].innerText;
    const imageSrc = this.cells[2].querySelector('img').src;
    const description = this.cells[3].innerText;
    const price = this.cells[4].innerText;
    const numericPrice = parseFloat(price.replace("RM", ""));
    const formattedPrice = numericPrice.toFixed(2);

    const imageName = imageSrc.replace("http://localhost/Melewarkitchenwebsite/assignment/front/assignment/admin/", "./"); 

    console.log(foodId);
      // Populate the form with the data
      document.getElementById('foodcategory').value= 'drink';
      document.getElementById('foodID').value = foodId;
      document.getElementById('foodname').value = name;
      document.getElementById('image').src = imageName;
      document.getElementById('imageOld').value = imageName;
      document.getElementById('fooddescription').value = description;
      document.getElementById('foodprice').value = formattedPrice;
    });
  });
  dessertRows.forEach(row => {
    row.addEventListener('click', function() {
        form.classList.add('active');
       // dlete.classList.add('active');
      // Get the data from the clicked row
      
    const foodId = this.cells[0].innerText;
    const name = this.cells[1].innerText;
    const imageSrc = this.cells[2].querySelector('img').src;
    const description = this.cells[3].innerText;
    const price = this.cells[4].innerText;
    const numericPrice = parseFloat(price.replace("RM", ""));
    const formattedPrice = numericPrice.toFixed(2);

    const imageName = imageSrc.replace("http://localhost/Melewarkitchenwebsite/assignment/front/assignment/admin/", "./"); 

    console.log(foodId);
      // Populate the form with the data
      document.getElementById('foodcategory').value= 'dessert';
      document.getElementById('foodID').value = foodId;
      document.getElementById('foodname').value = name;
      document.getElementById('image').src = imageName;
      document.getElementById('imageOld').value = imageName;
      document.getElementById('fooddescription').value = description;
      document.getElementById('foodprice').value = formattedPrice;
    });
  });
  
</script>
</body>
</html>