
<?php
/*
Drew Kroeger/Owen Manley
CSC390- Project Four
This page is not a visual page, but just a backend, 
it handles all the sql querys, and the DBH/PDO object
THIS SHOULD BE REQUIRED ON ALL PAGES THAT HANDLE AN SQL QUERY
*/
    class databaseConnector{
        private $dbh;

        public function __construct(){
            $databaseName = 'fa24_390_dkr';
            $host = 'localhost';
            $dsn = "mysql:dbname=$databaseName;host=$host";
            $user = 'fa24_390_dkr'; #need to change this if working on thor or on localhost
            $password ='9stXRVdB';

            try
            {
                $this->dbh = new PDO($dsn, $user, $password);
            } catch(\PDOException $e){
                echo "Cannot connect to database" . $e->getMessage();
                exit;
            }
        }

        public function getDBH(){
            return $this->dbh;
        }

        public function backLogPageSQLQuery(){
            $sql = "
            SELECT * FROM backlog WHERE user_id = :user_id
            ";
            if (isset($_POST['sorting'])) 
            {
                
                if ($_POST['sorting'] === 'all') 
                {
                    $sql = "SELECT * FROM backlog WHERE user_id = :user_id";
                } if ($_POST['sorting'] === 'started') 
                {
                    echo "Only started games shown!<br>";
                    $sql = "SELECT * FROM backlog WHERE user_id = :user_id 
                    AND date_started IS NOT NULL AND date_completed IS NULL";
                } elseif ($_POST['sorting'] === 'completed') 
                {
                    echo "only completed games shown<br>";
                    $sql = "SELECT * FROM backlog WHERE user_id = :user_id 
                    AND date_completed IS NOT NULL";
                } else
                {
                    echo"All games shown!<br>";
                    $sql = "SELECT * FROM backlog 
                    WHERE user_id = :user_id";
                }
            }
            else{
                $sql = "SELECT * FROM backlog WHERE user_id = :user_id";
            }
            return $sql;
        }

        public function userRegistrationPageBackendSQLQuery(){
            $sql = "
                INSERT INTO `user` (`name`,`email`,`password_hash`)
                VALUES (:username, :email, :hashedPassword)";
            return $sql;
        }
        public function startButtonBackendSQLQuery(){
            $sql = "
                UPDATE backlog
                SET date_started = :date_started
                WHERE user_id = :user_id AND date_created = :date_created
                ";
            return $sql;
        }   
        public function loginPageBackendSQLQuery(){
            $query = "
                SELECT user_id, email, password_hash FROM user WHERE email= :email LIMIT 1
                ";
            return $query;
        }
        public function completedButtonBackendSQLQuery(){
            $sql = "
                UPDATE backlog
                SET date_completed = :date_completed
                WHERE user_id = :user_id AND date_created = :date_created
                ";
            return $sql;
        } 
        public function submitButtonBackendSQLQuery(){
            $sql = "
                    INSERT into `backlog` (`user_id`,`game_name`,`game_platform`,`date_created`)
                    VALUES (:user_id, :newGame, :game_platform, :date_created)
                ";
            return $sql;
        }

        public function deleteButtonBackendSQLQuery(){
            $sql = "
                DELETE FROM backlog 
                WHERE backlog_id = :backlog_id
                ";
            return $sql;
        }
    }