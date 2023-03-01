<?php

    // Start of session
    session_start();

    // Include the connection file
    require_once "connection.php";

    // Get data to check it into database
    if(isset($_POST["username"]) && isset($_POST["password"])) {
        
        $username     = $_POST["username"];
        $password     = $_POST["password"];
        $hashPassword = sha1($password);

        // Sql command to check if username and password are the same
        $stmt = $conn->prepare("SELECT
                                    username, password
                                FROM
                                    users
                                WHERE
                                    username = ? AND password = ?");
        $stmt->execute(array(
            $username,
            $hashPassword
        ));
    
        $count = $stmt->rowCount();
    
        if($count > 0) {
    
            // Create the session with the name of the logged
            $_SESSION["username"] = $username;
    
            echo 1;
    
        }
    }