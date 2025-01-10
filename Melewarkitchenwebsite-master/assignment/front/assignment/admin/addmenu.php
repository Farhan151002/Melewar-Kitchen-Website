<?php
require_once 'config.php';


    $menuName = $_POST['menu_name'];
    $menuDescription = $_POST['menu_description'];
    $fileName = $_FILES['menu_photo']['name'];
    $fileTmpPath = $_FILES['menu_photo']['tmp_name'];
    $menuPrice = $_POST['menu_price'];
    $category = $_POST['category'];

    $fileContent = file_get_contents($fileTmpPath);


    echo "<br>$menuName<br>$menuPrice<br>$fileName<br>$menuDescription";

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if ($_POST['category'] === 'food'){        
    $query = "INSERT INTO food (foodName,foodDesc,foodPrice,foodLoc) VALUES (?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssss",$menuName,$menuDescription,$menuPrice,$fileName);
    if ($stmt->execute()) {
        // Execution was successful
        echo "Insertion successful!";
        
    } else {
        // Execution failed
        echo "Error: ";
        
    }} else if($category==='drink'){
        $query = "INSERT INTO drink (drinkName,drinkDesc,drinkPrice,drinkLoc) VALUES (?,?,?,?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ssss",$menuName,$menuDescription,$menuPrice,$fileName);
        if ($stmt->execute()) {
            // Execution was successful
            echo "Insertion successful!";
        
    }   else {
            // Execution failed
            echo "Error: ";

    }} else if($category==='dessert'){
        $query = "INSERT INTO dessert (dessertName,dessertDesc,dessertPrice,dessertLoc) VALUES (?,?,?,?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ssss",$menuName,$menuDescription,$menuPrice,$fileName);
        if ($stmt->execute()) {
            // Execution was successful
            echo "Insertion successful!";
        
    }   else {
            // Execution failed
            echo "Error: ";}}

    $targetDirectory = 'res/'; // Specify the target directory where you want to save the file
    $targetFile = $targetDirectory . basename($_FILES['menu_photo']['name']); // Set the target file path

    if (move_uploaded_file($_FILES['menu_photo']['tmp_name'], $targetFile)) {
    // File was successfully uploaded and moved to the target directory
    echo 'File uploaded and saved successfully.';
    } else {
    // An error occurred while uploading/moving the file
    echo 'Error uploading file.';
    }

    $stmt->close();
    $mysqli->close();

    header("Location: editmenu.php");



?>