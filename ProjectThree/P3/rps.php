<!--Drew Kroeger CSC390 Project Three: This is rps page(handles players rps decision and sends to playrps)
for project three, this page requires the user to be logged in or they are redirected-->
<?php
    session_start();
    include"UserAuthenticator.php";
    $authentic = new UserAuthenticator();
    if (!($authentic->isLoggedIn())){
        $authentic->redirectToLogin();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="styles.css">
    <title>RPS Page</title>

    
</head>
<body>
<a class="returnToIndex" href="index.php">Click here to return to main page</a>
    <h1>This is the rps of Drew Kroeger's Project Three</h1>
    <div id="rpsDiv">
        <form action="playrps.php" method="post">
            <p>ROCK:
                <input type="radio" name="rps" value="Rock">
            </p>
            <p>PAPER:
                <input type="radio" name="rps" value="Paper">
            </p>
            <p>SCISSORS:
                <input type="radio" name="rps" value="Scissors">
            </p>
            <br>
            <input class="rpsButton" type="submit" name="play" value="Click here to play!">
            
        </form>
    </div>
</body>
</html>


