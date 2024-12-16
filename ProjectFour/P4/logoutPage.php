
<?php
/*
Drew Kroeger/Owen Manley
CSC390- Project Four
This page is a visual page, it allows the user to logout of their account,
the user can also go back to the backlog page
*/
    session_start();
    include"authenticator.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout Page</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <div id = "reg-background">
        <div id = "logout-content">
    <h1>Logout Page</h1>
    <a href="backlogPage.php">Click here to go back to backlog page!</a>
    <form action="logoutPageBackend.php" method= "post">
    <h1>
    <button>Logout</button>
    </h1>
    </form>
    </div>
    </div>
</body>
</html>
