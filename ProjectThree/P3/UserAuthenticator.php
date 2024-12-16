<!--Drew Kroeger CSC390 Project Three: This is Userauthenticator page(it handles login information)
for project three, this page should never actually be displayed-->
<?php

    class UserAuthenticator{
        const USERNAME = "admin";
        const PASSWORD = "password";
        

        public function isLoggedIn(){
            #this function is used when a session exists, i think on the other 
            #pages(not the login) is when this is used
            return isset($_SESSION['username']);
        }

        public function authenticate($username, $password){
            #this would compare what the user puts in to the constants at the top
            if (!isset($_POST['username']) and  (!isset($_POST['password']))) {
                exit;
            }

            $pushedUserName = $_POST['username'];
            $pushedPassword = $_POST['password']; 
            
            if ($pushedUserName === self::USERNAME and $pushedPassword === self::PASSWORD){
                return true;
            }
            else{
                return false;
            }
            
        }

        public function logUserIn($username){
            #this gives the user a session variable??
            $_SESSION["username"] = $username;
        }

        public function logout(){
            #i think this is just abort session and set the session stuff to null
                session_destroy();
                $_SESSION = array();
                header("Location: login.php");
                exit;   
        }

        public function redirectToLogin(){
            #if authenticate is false then make a page do this?
            header("Location: login.php");
        }
    }


