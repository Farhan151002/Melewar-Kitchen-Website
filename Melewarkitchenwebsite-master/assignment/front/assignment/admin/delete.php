<?php
include_once 'config.php';


    $userID = $_POST['userID'];
    echo "Delete Clicked<br>";
        
        $query = "DELETE FROM user WHERE userID = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i", $userID);

        // Execute the statement
        if ($stmt->execute()) {
        // Row was successfully deleted
        echo "Row deleted successfully.";
        } else {
        // An error occurred while deleting the row
        echo "Error deleting row: " . $stmt->error;
        }
        
            

        // Close the statement and database connection
        $stmt->close();
        $mysqli->close();

        header("Location: user.php");
        


?>