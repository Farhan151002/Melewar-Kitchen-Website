<?php
    include_once 'config.php';
    $userID = $_POST['userID'];
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password'];
    $birthDate = $_POST['birthDate'];
    $address = $_POST['address'];

    $query = "UPDATE user SET userName = ?, email = ?, phoneNumber = ?, password = ?, birthDate = ?, address = ? WHERE userID = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ssssssi", $userName, $email, $phoneNumber, $password, $birthDate, $address, $userID);
        if ($stmt->execute()) {
            // Row was successfully updated
            echo "Row updated successfully.";
        } else {
            // An error occurred while updating the row
            echo "Error updating row: " . $stmt->error;}
            header("Location: user.php");     
?>