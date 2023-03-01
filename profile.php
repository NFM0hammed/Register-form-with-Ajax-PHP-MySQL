<?php

    // Start of session
    session_start();

    // Include the connection file
    require_once "connection.php";

    // If there's a session, store the session into a variable
    if(isset($_SESSION["username"]) && $_SESSION["username"] == true) {

        $login = $_SESSION["username"];

    } else {

        header("Location: index.php");

        exit;

    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile page</title>
        <style>
            .profile {
                margin: 100px auto;
                padding: 50px 20px;
                box-shadow: 0px 0px 10px #eee;
                border-radius: 10px;
            }
            @media(min-width: 600px) {
                .profile {
                    width: 500px;
                }
            }
            .profile .info div{
                display: flex;
            }
            .profile .info div h3 {
                flex-basis: 30%;
                color: #ddd;
                font-weight: normal;
            }
            .profile .info div h4 {
                color: #19d7ff;
            }
            .profile .info hr {
                background-color: #eee;
                height: 0.5px;
                border: none;
            }
            .profile a {
                display: block;
                background-color: #19d7ff;
                color: #fff;
                text-align: center;
                text-decoration: none;
                width: 100%;
                margin-top: 50px;
                padding: 10px 0;
                border-radius: 5px;
                transition: .3s;
            }
            .profile a:hover {
                background-color: #19d7ffa1;
            }
        </style>
    </head>
    <body>
        <?php
            
            $stmt = $conn->prepare("SELECT
                                        *
                                    FROM
                                        users
                                    WHERE
                                        username = ?");

            $stmt->execute(array(
                $login
            ));

            $count = $stmt->rowCount();

            if($count > 0) {

                $info = $stmt->fetch();

                ?>
                <div class="profile">
                    <div class="info">
                        <div>
                            <h3>Username</h3>
                            <h4>:&nbsp;&nbsp;<?=$info["username"]?></h4>
                        </div>
                        <hr>
                        <div>
                            <h3>User id</h3>
                            <h4>:&nbsp;&nbsp;<?=$info["user_id"]?></h4>
                        </div>
                        <hr>
                        <div>
                            <h3>First name</h3>
                            <h4>:&nbsp;&nbsp;<?=$info["first_name"]?></h4>
                        </div>
                        <hr>
                        <div>
                            <h3>Last name</h3>
                            <h4>:&nbsp;&nbsp;<?=$info["last_name"]?></h4>
                        </div>
                    </div>
                    <a href="Logout.php">Logout</a>
                </div>
            <?php
            }
        ?>
    </body>
</html>