
<?php
/*
Drew Kroeger/Owen Manley
CSC390- Project Four
This page is a visual page, and is the main page when a user is logged in where they can see games in their database
If the user is not logged in then they will be redirected to thelogin page
*/
    session_start();
    include 'authenticator.php';
    require 'databaseConnector.php';
    if (!Authenticator::getLoggedIn()) {
        header("Location: loginPage.php");
        exit;
    }
    if (isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    $user_id = $_SESSION['user_id'];



    $databaseConnectorOne = new databaseConnector();
    $dbh = $databaseConnectorOne->getDBH();
    $sql = $databaseConnectorOne->backLogPageSQLQuery();
    
    
    
    $backlog_query = $dbh->prepare($sql);
    $backlog_query->bindValue(':user_id',$user_id );
    $backlog_query->execute();
    
    $backlog_entries = $backlog_query->fetchAll(PDO::FETCH_ASSOC);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="refreshGameBacklog.js"></script>
    <link href="style.css" type="text/css" rel="stylesheet" />
    <title>Game Backlog Page</title>
</head>
<body>
    <div id="backlog-background">
    <h1>Game Backlog Page</h1>
    <a href="logoutPage.php">Click here to go to logout page!</a><p><br></p>
    <form action="submitButtonBackend.php" id="addGameForm" method="POST">
        <label>Add New Game: <input type="text" name="newGame" /></label>
        <label>Add Game Platform: <input type="text" name="newGamePlatform" /></label>
        <button type="submit" id="submitGameDataButton">Submit</button>
    </form>

    <form action="backlogPage.php" method="POST">
        <label>Filter Games</label>
        <select name="sorting">
            <option value="all">All Games</option>
            <option value="started">Only Started Games (not completed)</option>
            <option value="completed">Only Completed Games</option>
        </select>
        <button type="submit">Filter</button>
    </form>

    <div id="backlogDetail">
        <?php
        foreach ($backlog_entries as $entry) {
            $gameName = htmlspecialchars($entry['game_name']);
            $platform = htmlspecialchars($entry['game_platform']);
            $dateCreated = htmlspecialchars($entry['date_created']);
            $dateStarted = htmlspecialchars($entry['date_started']);
            $dateCompleted = htmlspecialchars($entry['date_completed']);
            $backlogId = htmlspecialchars($entry['backlog_id']);
            ?>
            <p>
                Game Name: <?php echo $gameName; ?><br>
                Platform: <?php echo $platform; ?><br>
                Date Created: <?php echo $dateCreated; ?><br>
                Date Started: <?php echo $dateStarted; ?><br>
                Date Completed: <?php echo $dateCompleted; ?><br>

                <form action="deleteButtonBackend.php" method="POST">
                    <input type="hidden" name="backlog_id" value="<?php echo $backlogId; ?>">
                    <button type="submit">Delete</button>
                </form>

                <form action="startButtonBackend.php" method="POST">
                    <input type="hidden" name="date_created" value="<?php echo $dateCreated; ?>" >
                    <button type="submit">Start Game</button>
                </form>

                <form action="completedButtonBackend.php" method="POST">
                    <input type="hidden" name="date_created" value="<?php echo $dateCreated; ?>">
                    <button type="submit">Complete Game</button>
                </form>
            </p>
            <hr>
        <?php } ?>
    </div>
        </div>
  
    
</body>
</html>





