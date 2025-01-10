<?php
include_once 'config.php';
?>
<html>
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
        <main class="bg-image" style="min-height: 70%;">
            <!-- Table Management Section -->
            <div class="user-management-section">
                <div class="admin">
                  <h2 style="color: black;">Admin Section</h2>
                  <div class="user-management">
                    <h3 style="color: black;">Table Management</h3>
                    <ul>
                      <li><a href="#" class="view-users-link text-center" style="background-color: #ff726f;"><strong></strong></a></li>
                      <p style="color: red; font-size: small">*press the column to update</p>
                      <table id="Food" class="view-users-linkk">
                        <thead>
                          <tr>
                            <th class="hidden">Booking ID</th>
                            <th>Name</th>
                            <th>Phone No.</th>
                            <th>Table No.</th>
                            <th>Guest No.</th>
                            <th>Date & Time</th>
                            <th>Item 1 and Quantity</th>
                            <th>Item 2 and Quantity</th>
                            <th>Item 3 and Quantity</th>
                            <th>Item 4 and Quantity</th>
                            <th>Item 5 and Quantity</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $query = "SELECT * FROM reservations";
                                  $result = $mysqli->query($query)?>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                <td id="bookID" class="hidden"><?php echo $row['id'];?></td>
                                <td id="name"><?php echo $row['name']; ?></td>
                                <td id="phone"><?php echo $row['phone']; ?></td>
                                <td id="table"><?php echo $row['table_number']; ?></td>
                                <td id="guest"><?php echo $row['guests']; ?></td>
                                <td id="date"><?php echo $row['date']; ?><br><br><?php 
                                if ($row['time'] == 1) {
                                    echo '9.00-11.00';
                                } elseif ($row['time']==2){
                                    echo '11.00-13.00';
                                } elseif ($row['time']==3){
                                    echo '13.00-15.00';
                                }elseif ($row['time']==4){
                                    echo '15.00-17.00';
                                }
                                ?></td>
                                <td id="item1"><?php echo $row['item1']; ?><br>x<?php echo $row['item1_quantity']; ?></td>
                                <td id="item2"><?php echo $row['item2']; ?><br>x<?php echo $row['item2_quantity']; ?></td>
                                <td id="item3"><?php echo $row['item3']; ?><br>x<?php echo $row['item3_quantity']; ?></td>
                                <td id="item4"><?php echo $row['item4']; ?><br>x<?php echo $row['item4_quantity']; ?></td>
                                <td id="item5"><?php echo $row['item5']; ?><br>x<?php echo $row['item5_quantity']; ?></td>
                                </tr>
                                <?php } ?>
                        </tbody>
                      </table>
                      <!-- The form for updating user information -->
                        <form action="deletetable.php" class="update-user-form" method="post">
                            <br><h2>Update User Information</h2>
                            <div class="form-group">
                            <input type="hidden" id="idbook" name="idbook">
                            <label for="status">Name:</label>
                            <input type="text" id="nama" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="notable">Table no:</label>
                                <input type="text" id="notable" name="notable">
                                </div>
                            <input type="submit" value="Delete">
                        </form>
                        <form class="delete-user-form" method="post">
                            <input type="hidden" name="user_id" value="123">
                            <input type="submit" value="Delete">
                        </form>
                    </ul>
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

      const foodRows = document.querySelectorAll('#Food tbody tr');
      foodRows.forEach(row => {
        row.addEventListener('click', function() {
        form.classList.add('active');
       // dlete.classList.add('active');
      // Get the data from the clicked row
      
    const bookId = this.cells[0].innerText;
    const name = this.cells[1].innerText;
    const tableno = this.cells[3].innerText;
 

      // Populate the form with the data
      document.getElementById('idbook').value = bookId;
      document.getElementById('nama').value = name;
      document.getElementById('notable').value = tableno;
      
    });
  });

  </script>
    </body>
</html>