<?php
// Connect to the database
$servername = "localhost";
$username = "user";
$password = "userpwd";
$database = "melewar";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check the database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $guests = $_POST['guests'];
    $tableNumber = $_POST['table-number'];
    $item1 = $_POST['item1'];
    $item1Quantity = $_POST['item1-quantity'];
    $item2 = $_POST['item2'];
    $item2Quantity = $_POST['item2-quantity'];
    $item3 = $_POST['item3'];
    $item3Quantity = $_POST['item3-quantity'];
    $item4 = $_POST['item4'];
    $item4Quantity = $_POST['item4-quantity'];
    $item5 = $_POST['item5'];
    $item5Quantity = $_POST['item5-quantity'];
    echo '<br>'.'<br>'.'masa'.$time;
    
    // TODO: Perform input validation and sanitization

    $query = "SELECT * FROM reservations WHERE date = '$date' AND time = '$time' AND table_number = '$tableNumber'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the row exists
    if (mysqli_num_rows($result) > 0) {
    // The row exists, show the pop-up message or perform the desired action
    echo "<script>alert('The table already book!'); window.location.href = 'reservation.php';</script>";
    
    } else {
    // The row does not exist
    echo "<script>alert('The row does not exist!');</script>";

    $sql = "INSERT INTO reservations (name, email, phone, date, time, guests, table_number, item1, item1_quantity, item2, item2_quantity, item3, item3_quantity, item4, item4_quantity, item5, item5_quantity)
    VALUES ('$name', '$email', '$phone', '$date', '$time', '$guests', '$tableNumber', '$item1', '$item1Quantity', '$item2', '$item2Quantity', '$item3', '$item3Quantity', '$item4', '$item4Quantity', '$item5', '$item5Quantity')";

    if (mysqli_query($conn, $sql)) {
    echo "Reservation successfully created.";
    header("Location: reservation.php");
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    }
    
    // Insert the data into the reservations table
    
    
    // Close the database connection
    mysqli_close($conn);
}
?>