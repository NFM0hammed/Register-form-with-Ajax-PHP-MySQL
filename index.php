<?php

    // Start of session
    session_start();

    // If there's a session then, redirect to the profile page
    if(isset($_SESSION["username"]) && $_SESSION["username"] == true) {

        header("location: profile.php");
        
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register form with AJAX and PHP</title>
        <link rel="stylesheet" href="css/main.css?v=<?=time();?>">
        <link rel="stylesheet" href="css/normalize.css">
    </head>
    <body>
        <div class="form">
            <!-- Toggle between sign up and sing in -->
            <div class="register">
                <h3 class="active SignUp">Sign up</h3>
                <h3 class="SignIn">Sign in</h3>
            </div>
            <!-- Sign up form -->
            <div class="sign-up">
                <div class="success"></div>
                <div class="error username"></div>
                <div class="error valid-username"></div>
                <input type="text" placeholder="Username" />
                <div class="error first-name"></div>
                <input type="text" placeholder="First name" />
                <div class="error last-name"></div>
                <input type="text" placeholder="Last name" />
                <div class="error password"></div>
                <input type="password" placeholder="Password" />
                <input type="submit" value="Register" />
            </div>
            <!-- Sign in form -->
            <div class="sign-in active">
                <div class="error username"></div>
                <div class="error valid-login"></div>
                <input type="text" placeholder="Username" />
                <div class="error password"></div>
                <input type="password" placeholder="Password" />
                <input type="submit" value="Login">
            </div>
        </div>

        <script src="js/main.js"></script>
    </body>
</html>