<!--
Drew Kroeger/Owen Manley
CSC390- Project Four
This page is not an actual visual page, but just backend for the userRegistrationPage.php
-->
<?php
session_start();
require 'databaseConnector.php';


$username = $_POST['name'];
$email = $_POST['email'];
$plaintextPassword = $_POST['plainTextPassword'];

if ($username === '') {
    echo "No name given";
    exit;
}
if ($email === '') {
    echo "No email given;";
    exit;
}
if ($plaintextPassword === '') {
    echo "No password given";
    exit;
}
$hashedPassword = password_hash($plaintextPassword, PASSWORD_DEFAULT);



$databaseConnectorOne = new databaseConnector();
$dbh = $databaseConnectorOne->getDBH();
$sql = $databaseConnectorOne->userRegistrationPageBackendSQLQuery();

$query = $dbh->prepare($sql);
$query->bindValue(':username', $username);
$query->bindValue(':email', $email);
$query->bindValue(':hashedPassword', $hashedPassword); 

$succeeded = $query->execute();

if ($succeeded) {
    $_SESSION['message'] = "Your account has been created successfully!";
    header("Location: loginPage.php");
} else {
    $_SESSION['message'] =  "Sorry, something went wrong...just fill all three boxes!";
    header("Location: userRegistration.php");
}