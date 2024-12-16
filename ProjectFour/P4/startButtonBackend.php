<!--
Drew Kroeger/Owen Manley
CSC390- Project Four
This page is not a visual page, but just a backend, it is for the start Buttons(s)
that are on the backlog.php page
-->
<?php
session_start();
require 'databaseConnector.php';

$theTime = date("Y-m-d H:i:s");


$databaseConnectorOne = new databaseConnector();
$dbh = $databaseConnectorOne->getDBH();
$sql = $databaseConnectorOne->startButtonBackendSQLQuery();



$query = $dbh->prepare($sql);

$query->bindValue(':user_id', $_SESSION['user_id']);
$query->bindValue(':date_started', $theTime);
$query->bindValue(':date_created', $_POST['date_created']);

$succeeded = $query->execute();

if ($succeeded) {
    $_SESSION['message'] = "Your game has been started successfully!";
    header("Location: backlogPage.php");
} else {
    $_SESSION['message'] =  "Sorry, something went wrong trying to start your game!";
    header("Location: backlogPage.php");
}

?>