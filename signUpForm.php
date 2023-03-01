<?php

    // Include the connection file
    require_once "connection.php";

    // Get data to insert it into database
    if(isset($_POST["username"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["password"])) {
        
        $username         = $_POST["username"];
        $firstname        = $_POST["firstname"];
        $lastname         = $_POST["lastname"];
        $password         = $_POST["password"];
        $hashPassword     = sha1($password);

        // For validate username and inputs fields
        $validUsername    = false;
        $checkInputValues = false;

        // Sql command to check if username is already in database or not
        $stmt = $conn->prepare("SELECT
                                    username
                                FROM
                                    users
                                WHERE
                                    username = ?");
        // Execute the sql command
        $stmt->execute(array(
            $username
        ));
    
        // Nubmer of row
        $count = $stmt->rowCount();
    
        // If all the input fields are fulfilled
        if($username != "" && $firstname != "" && $lastname != "" && $password != "") {
    
            $checkInputValues = true;
    
            // If the username isn't in database
            if($count === 0) {
    
                $validUsername = true;
    
                $sql = $conn->prepare("INSERT INTO
                                                users (username, first_name, last_name, password)
                                        VALUES
                                                (:uname, :fname, :lname, :pwd)");
                $sql->execute(array(
                    ":uname" => $username,
                    ":fname" => $firstname,
                    ":lname" => $lastname,
                    ":pwd"   => $hashPassword
                ));
    
            }
    
        }
    
        // Means all input fields are fulfilled
        if($checkInputValues === true) {
            // Means the username isn't in the database
            if($validUsername === true) {
    
                echo 1;
    
            } else {
    
                echo 0;
    
            }
    
        }
    }
