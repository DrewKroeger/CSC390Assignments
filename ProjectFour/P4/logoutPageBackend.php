<!--
Drew Kroeger/Owen Manley
CSC390- Project Four
This page is not a visual page, but just a backend, logout page
it just destroys the session and sends the user back to the loginPage.php
-->
<?php
#could put this inside of authenticator
    session_start();
    session_destroy();
    $_SESSION = array();
    header("Location: loginPage.php");
    exit;