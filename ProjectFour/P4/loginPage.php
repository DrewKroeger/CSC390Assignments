

<?php
/*
Drew Kroeger/Owen Manley
CSC390- Project Four
This is an actual page(default page), that requires a user to login, or they can go to a create user page
*/
    session_start();
    include 'authenticator.php';
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
    <title>Login Page</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div id="reg-background">
    <div id="reg-container">
    <h2>Please Login Using an Existing Account</h2>
    <form action="loginPageBackend.php" method = "post">
        <p>
            Email: <input type="text" name="email">
        </p>
        <p>
            Password: <input type="password" name="plainTextPassword">
        </p>
        <p>
            <button>Login</button>
        </p>
    </form>
    <a href="userRegistrationPage.php">Click Here to Create an Account!</a>
    </div>
</div>
</body>