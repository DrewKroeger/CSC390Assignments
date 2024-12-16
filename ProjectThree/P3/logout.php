<!--Drew Kroeger CSC390 Project Three: This is the logout page for project three,
 and is the only page, along with login, that does not need to be logged in-->
<?php
    session_start();
    include"UserAuthenticator.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Page</title>

    <link type="text/css" rel="stylesheet" href="styles.css">
</head>
<body>
<a class="returnToIndex" href="index.php">Click here to return to main page</a>
    <h1>This is the logout page of Drew Kroeger's Project Three</h1>
    <div id="logoutDiv">
        <form action="logout.php" method= "post">
            <p>
                Click here to logout: <br><input class="rpsButton" type="submit" name="logout" value="logout">
            </p>
    </div>
</body>
</html>

<?php
    if (isset($_POST["logout"])){
        $authenticTwo = new UserAuthenticator();
        $authenticTwo->logout();
    }