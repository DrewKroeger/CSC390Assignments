<!--Drew Kroeger CSC390 Project Three: This is playrps menu page(handles cpu rps decision and tells result)
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
    <title>RPS Results Page</title>
    <link type="text/css" rel="stylesheet" href="styles.css">
    
    
</head>
<body id="playrpsPage">
    <a class="returnToIndex" href="index.php">Click here to return to main page</a>
    <a class="returnToIndex" href="rps.php">Click here to return to rock paper scissors page</a>
    <h1>This is the playrps page of Drew Kroeger's Project Three</h1>
    <div>
        
    </div>
</body>
</html>


<?php

if (isset($_POST['rps'])){
    
    $userStr = $_POST['rps'];
    echo "YOU PICKED:" .$userStr;
}
else{
    echo "Please click one of the rock paper scissors buttons!";
    exit;
}
$cpuInt= rand(1,3);
$cpuStr;
if($cpuInt ==1){
    $cpuStr = "Rock";
}
else if ($cpuInt ==2){
    $cpuStr = "Paper";
}
else if ($cpuInt ==3){
    $cpuStr = "Scissors";
}
echo "<br>";
echo "THE COMPUTER PICKED:" . $cpuStr;
echo "<br>";
if ($cpuStr == $userStr){
    echo "You and the computer tied!";
}
else if (($cpuStr == "Rock" and $userStr == "Paper") or ($cpuStr == "Paper" and $userStr == "Scissors") or ($cpuStr == "Scissors" and $userStr == "Rock")  )
{
    echo "You Won!";
}
else if (($cpuStr == "Paper" and $userStr == "Rock") or ($cpuStr == "Scissors" and $userStr == "Paper") or ($cpuStr == "Rock" and $userStr == "Scissors")  )
{
    echo "You Lost!";
}

