
<?php
/*
Drew Kroeger/Owen Manley
CSC390- Project Four
This page is an actual webpage that the user goes to to create a new user account
If the user is logged in it will redirect to the backlogPage
*/
    session_start();
    include 'authenticator.php';
    require 'databaseConnector.php';
    if (Authenticator::getLoggedIn()) 
    {
        header("Location: backlogPage.php");
    }
    if (isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Page</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<!--<div id="registration-background">
<img src="images/christmas-tree.jpg"></div>-->
<div id="reg-background">
    <div id="reg-container">
    <h2>Please Create A New Account</h2>
    <a href="loginPage.php">Go back to login page</a>
    <form action="userRegistrationPageBackend.php" method = "post">
        <p>
            Name: <input type="text" name="name">
        </p>
        <p>
            Email: <input type="text" name="email">
        </p>
        <p>
            Password: <input type="password" name="plainTextPassword">
        </p>
        <p>
            <button>Create User!</button>
        </p>
    </form>
    </div>
</div>
</body>


