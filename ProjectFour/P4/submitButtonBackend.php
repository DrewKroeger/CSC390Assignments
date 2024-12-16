<?php
/**<!--
Drew Kroeger/Owen Manley
CSC390- Project Four
This page is not a visual page, but just a backend, it is for the submit button
that are on the backlog.php page
--> */
session_start();
require 'databaseConnector.php';



$theTime = date("Y-m-d H:i:s");


$databaseConnectorOne = new databaseConnector();
$dbh = $databaseConnectorOne->getDBH();
$sql = $databaseConnectorOne->submitButtonBackendSQLQuery();




$query = $dbh->prepare($sql);

$query->bindValue(':user_id', $_SESSION['user_id']);
$query->bindValue(':newGame', $_POST['newGame']);
$query->bindValue(':game_platform', $_POST['newGamePlatform']);
$query->bindValue(':date_created', $theTime);

$succeeded = $query->execute();



    
$sql = "
    SELECT backlog_id, game_name, game_platform, date_created, date_started, date_completed
    FROM backlog
    WHERE user_id = :user_id AND game_name = :newGame AND game_platform = :newGamePlatform
    ORDER BY date_created DESC LIMIT 1
";

$query = $dbh->prepare($sql);
$query->bindValue(':user_id', $_SESSION['user_id']);
$query->bindValue(':newGame', $_POST['newGame']);
$query->bindValue(':newGamePlatform', $_POST['newGamePlatform']);
$query->execute();

    
$newGameData = $query->fetch(PDO::FETCH_ASSOC);

header('Content-Type: application/json');    
$json = json_encode($newGameData);
echo $json;

