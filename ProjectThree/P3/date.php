<!--Drew Kroeger CSC390 Project Three: This is the date page, it tells the date and time
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
    <title>Date Page</title>
</head>
<body id="datePage">
<a class="returnToIndex" href="index.php">Click here to return to main page</a>
    <h1>This is the time page of Drew Kroeger's Project Three</h1>
    <div>
       
    </div>
</body>
</html>

<?php
    date_default_timezone_set('America/Chicago');
    echo "Right now the time is:" . date("m/j/Y h:i A");
