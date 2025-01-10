<?php
    include_once 'config.php';
    
        $userName = $_POST['username'];
        $mail = $_POST['email'];
        $phoneNumber = $_POST['phone'];
        $password = $_POST['password'];


        

        // Check if the username exists
        $query = "SELECT * FROM user WHERE userName ='".$userName."'";
        $result = $mysqli->query($query);
        if($result->num_rows > 0){
            echo "<script>alert('This username already exists.');</script>";
            // prompt
        } else {
            $query = "SELECT * FROM user WHERE email ='".$mail."'";
            $result = $mysqli->query($query);
            if($result->num_rows > 0){
                echo "<script>alert('This email already exists.');window.location.href = 'loginmain.php';</script>";
                // prompt
            } else {
                $query = "SELECT * FROM user WHERE phoneNumber ='".$phoneNumber."'";
                $result = $mysqli->query($query);
                if($result->num_rows > 0){
                    echo "<script>alert('This phone number already exists');window.location.href = 'loginmain.php';</script>";
                    // prompt
                } else {
                    
                    $query = "INSERT INTO `user`(userName,email, phoneNumber,password) VALUES (?,?,?,?)";
                    $stmt = $mysqli->prepare($query);
                    $stmt->bind_param("ssss", $userName, $mail, $phoneNumber, $password);
                    if ($stmt->execute()) {
                        header("Location: loginmain.php"); // jump to log in
                        exit(); 
                    } else {
                        echo "<script>alert('Register failed!'); window.location.href = 'loginmain.php';</script>";
                    }
                }
            }
        }
    
?>
