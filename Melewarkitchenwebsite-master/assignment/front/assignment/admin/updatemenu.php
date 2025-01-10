<?php
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $menuID = $_POST['foodID'];
    $menuName = $_POST['name'];
    $menuDescription = $_POST['description'];
    $menuPrice = $_POST['price'];
    $imageOld = $_POST['imageOld'];
    $imageNew = $_POST['imageNew'];
    $category = $_POST['foodcategory'];
    
    if (isset($_POST['update'])) {
        echo "Update Clicked<br>";

        if ($category === 'food'){
        $query = "UPDATE food SET foodName = ?, foodDesc = ?, foodPrice = ? WHERE foodID = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("sssi", $menuName, $menuDescription, $menuPrice, $menuID);
        if ($stmt->execute()) {
            // Row was successfully updated
            echo "Row updated successfully.";
        } else {
            // An error occurred while updating the row
            echo "Error updating row: " . $stmt->error;
        }} else if ($category==='drink'){
        $query = "UPDATE drink SET drinkName = ?, drinkDesc = ?, drinkPrice = ? WHERE drinkID = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("sssi", $menuName, $menuDescription, $menuPrice, $menuID);
        if ($stmt->execute()) {
            // Row was successfully updated
            echo "Row updated successfully.";
        } else {
            // An error occurred while updating the row
            echo "Error updating row: " . $stmt->error;
        }
        } else if ($category==='dessert'){
            $query = "UPDATE dessert SET dessertName = ?, dessertDesc = ?, dessertPrice = ? WHERE dessertID = ?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("sssi", $menuName, $menuDescription, $menuPrice, $menuID);
            if ($stmt->execute()) {
            // Row was successfully updated
            echo "Row updated successfully.";
        } else {
            // An error occurred while updating the row
            echo "Error updating row: " . $stmt->error;
        }


        }



        $fileName = $_FILES['imageNew']['name'];
        $fileTmpPath = $_FILES['imageNew']['tmp_name'];

        if (!empty($fileName)) {
            // A file has been uploaded
            // Process the uploaded file
            $filename = basename($imageOld);
            echo "$filename<br>$imageNew";
            if(!strcmp($filename, $fileName)){
                echo "File is same";
            }else {
                echo "File not same";

                $query = "UPDATE food SET foodLoc = ? WHERE foodID = ?";
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param("si", $fileName,$menuID);
                if ($stmt->execute()) {
                    // Row was successfully updated
                    echo "Image updated successfully.";

                    $targetDirectory = 'res/'; // Specify the target directory where want to save the file
                    $targetFile = $targetDirectory .($fileName); // Set the target file path
                    echo "<br><br>";
                    echo $filename;
                    echo "<br><br>";
                    if (move_uploaded_file($_FILES['imageNew']['tmp_name'],$targetFile)) {
                    // File was successfully uploaded and moved to the target directory
                    echo 'File uploaded and saved successfully.';
                    } else {
                    // An error occurred while uploading/moving the file
                    echo 'Error uploading file.';
                    }
                } else {
                    // An error occurred while updating the row
                    echo "Error updating Image: " . $stmt->error;
                }

            }
            echo 'File uploaded.';
        } else {
            // No file uploaded or selected
            echo 'No file uploaded.';
        }


        $stmt->close();
        $mysqli->close();
        header("Location: editmenu.php");

    } elseif (isset($_POST['delete'])) {
        echo "Delete Clicked<br>";
        if ($category === 'food'){
        $query = "DELETE FROM food WHERE foodID = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i", $menuID);

        // Execute the statement
        if ($stmt->execute()) {
        // Row was successfully deleted
        echo "Row deleted successfully.";
        } else {
        // An error occurred while deleting the row
        echo "Error deleting row: " . $stmt->error;
        }}
        else if($category==='drink'){
        $query = "DELETE FROM drink WHERE drinkID = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i", $menuID);

        // Execute the statement
        if ($stmt->execute()) {
        // Row was successfully deleted
        echo "Row deleted successfully.";
        } else {
        // An error occurred while deleting the row
        echo "Error deleting row: " . $stmt->error;
        }
        }
        else if($category==='dessert'){
            $query = "DELETE FROM drink WHERE dessertID = ?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("i", $menuID);
    
            // Execute the statement
            if ($stmt->execute()) {
            // Row was successfully deleted
            echo "Row deleted successfully.";
            } else {
            // An error occurred while deleting the row
            echo "Error deleting row: " . $stmt->error;
            }
            }

        // Close the statement and database connection
        $stmt->close();
        $mysqli->close();

        if (file_exists($imageOld)) {
            if (unlink($imageOld)) {
                // File was successfully removed
                echo 'File removed successfully.';
            } else {
                // An error occurred while removing the file
                echo 'Error removing file.';
            }
        } else {
            // File doesn't exist
            echo 'File does not exist.';
        }
        header("Location: editmenu.php");
}
}
?>