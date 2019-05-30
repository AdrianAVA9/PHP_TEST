<?php
    include_once 'DBCredentials.php';

    class DBConnection{

        public $credentials;

        public function __construct(){
            $this->credentials = new DBCredentials();
        }

        public function GetConnection(){

            $connection = new mysqli($this->credentials->dbServer, $this->credentials->dbUser, 
                        $this->credentials->dbPassword, $this->credentials->dbName);

            return $connection;
        }
    }
?>