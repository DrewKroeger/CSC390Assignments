<!--
Drew Kroeger/Owen Manley
CSC390- Project Four
This page is not a visual page, but just a backend, it is for the deleteButtons(s)
that are on the backlog.php page
-->
<?php
session_start();
require 'databaseConnector.php';
$theTime = date("Y-m-d H:i:s");

$databaseConnectorOne = new databaseConnector();
$dbh = $databaseConnectorOne->getDBH();
$sql = $databaseConnectorOne->deleteButtonBackendSQLQuery();



$query = $dbh->prepare($sql);

$query->bindValue(':backlog_id', $_POST['backlog_id']);

$succeeded = $query->execute();

if ($succeeded) {
    $_SESSION['message'] = "Your game has been deleted successfully!";
    header("Location: backlogPage.php");
} else {
    $_SESSION['message'] =  "Sorry, something went wrong trying to delete your game!";
    header("Location: backlogPage.php");
}

?>