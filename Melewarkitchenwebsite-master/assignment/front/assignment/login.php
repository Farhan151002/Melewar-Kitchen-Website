<?php
session_start();
include_once 'config.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

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
                $_SESSION["userID"]= $user['userID'];
                header("Location: home.php"); // jump to home
            }else{

                echo "<script>alert('Incorrect password');</script>";
                echo "<script>window.location.href='loginmain.php';</script>";

            }

        }else{
            echo "<script>alert('Log in failed');</script>";
            echo "<script>window.location.href='loginmain.php';</script>";
        }
    }else{
        echo "<script>alert('This email is not registered');</script>";
        echo "<script>window.location.href='loginmain.php';</script>";
    }
    die();
?>