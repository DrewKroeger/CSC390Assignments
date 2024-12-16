<!--
Drew Kroeger/Owen Manley
CSC390- Project Four
This page is not a visual page, but just a backend, a boolean is activated when a user logs in,
this makes sure the user is redirected properly if they try activating certain webpages
-->
<?php
    class Authenticator{


        public static function setIsLoggedIn($var){
            $_SESSION['isLoggedIn'] = (bool) $var;
        }
        public static function getLoggedIn()
        {
            return isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'];
        }
    }