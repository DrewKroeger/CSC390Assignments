<!--Drew Kroeger CSC390 Project Three: This is the repeater page(it repeats a sentence betwen 1-500 times)
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
    <title>Repeater Page</title>  
</head>
<body class="repeaterPage">
    <a class="returnToIndex" href="index.php">Click here to return to main page</a>
    <h1>This is the repeater page of Drew Kroeger's Project Three</h1>
</body>
</html>



<?php
    $randomNumber = rand(1,500);
    echo "This is the amount of times the sentence will be displayed:" . $randomNumber;

    for ($i = 1; $i<=$randomNumber;$i++){
        echo  "<br>\n";
        echo "The Quick Brown Fox Jumped Over The Lazy Dog!";

    }