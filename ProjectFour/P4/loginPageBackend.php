<!--
Drew Kroeger/Owen Manley
CSC390- Project Four
This page is the backend for loginPage.php, which handles logging a user into a database
-->

<?php
session_start();
include "authenticator.php";
require 'databaseConnector.php';
$email = $_POST['email'];
$plaintextPassword = $_POST['plainTextPassword'];

if ($email === '') {
    $_SESSION['message'] = "no email/password given, please try again";
    header("Location: loginPage.php");
    exit;
}

if ($plaintextPassword === '') {
    $_SESSION['message'] = "no password/email given, please try again";
    header("Location: loginPage.php");
    exit;
}



$databaseConnectorOne = new databaseConnector();
$dbh = $databaseConnectorOne->getDBH();
$sql = $databaseConnectorOne->loginPageBackendSQLQuery();


$retrieveLoginInfo = $dbh->prepare($sql); #helps prevent sql injection, prepared statements
$retrieveLoginInfo->bindParam(':email', $email, PDO::PARAM_STR); #this takes the email in the query and makes the php var together
$retrieveLoginInfo->execute(); #executes the statements, using email
$user = $retrieveLoginInfo->fetch(PDO::FETCH_ASSOC); #retrieve the query gets the passowrd and user_id


if($user){
    if (password_verify($plaintextPassword, $user['password_hash'])) {
        Authenticator::setIsLoggedIn(true);
        $_SESSION['user_id'] = $user['user_id'];
        header("Location: backlogPage.php");
        exit;
    }
    else{
        $_SESSION['message'] = "Password or username seems to be wrong... please try again(DEBUG:USER EXISTS, PASSWORD IS WRONG)";
        header("Location: loginPage.php");
        exit;
    }
}
else
{
    $_SESSION['message'] = "username/password may be wrong.. please try again(DEBUG: USER DOES NOT EXIST)";
    header("Location: loginPage.php");
    exit;
}