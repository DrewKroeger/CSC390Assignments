<!--Drew Kroeger CSC390 Project Three: This is theindex/main menu page
for project three, this page requires the user to be logged in or they are redirected-->
<?php
    session_start();
    include"UserAuthenticator.php";
    $authentic = new UserAuthenticator();
    if (!($authentic->isLoggedIn())){
        $authentic->redirectToLogin();
    }
    #echo $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>

    <link type="text/css" rel="stylesheet" href="styles.css">
</head>
<body id="indexPage">
    <h1>This is the index page of Drew Kroeger's Project Three</h1>
    <div class="indexButtons">
        <a href="repeater.php">Click here to go to repeater page!</a>
    </div>
    <div class="indexButtons">
        <a href="date.php">Click here to go to the time page!</a>
    </div>
    <div class="indexButtons">
        <a href="rps.php">Click here to go to rock paper scissors!</a>
    </div>
    <div class="indexButtons">
        <a href="logout.php">Click here to logout!</a>
    </div>
</body>
</html>