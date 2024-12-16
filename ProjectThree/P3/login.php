<!--Drew Kroeger CSC390 Project Three: This is the login page for project three,
 and is the only page, along with logout, that does not need to be logged in-->
<?php
    session_start();
    include"UserAuthenticator.php";
    $authentic = new UserAuthenticator();
    if (($authentic->isLoggedIn())){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link type="text/css" rel="stylesheet" href="styles.css">
</head>
<body id="loginPage">
    <h1>This is the login page of Drew Kroeger's Project Three</h1>
    <div id="loginDiv">
        <form action="login.php" method= "post">
            <p>
                Username: <input type="text" name="username">
            </p>
            <p>
                Password: <input type="password" name="password">
            </p>
            <p>
                Submit: <input id="submitButton" type="Submit" name="logon" value="Click here to login">
            </p>
        </form>
    </div>
</body>
</html>

<?php
    $authentic = new UserAuthenticator();
    if (isset($_POST["logon"])){
        #echo $_POST["username"];
        #echo $_POST["password"];

        if (($authentic->authenticate($_POST["username"], $_POST["password"])) === true)
        {
            $authentic->logUserIn($_POST["username"]);
            header("Location: index.php");
        }
        else{
            echo "Please log in using credentials admin and password";
        }
    }
    #echo $_SESSION["username"];
?>
