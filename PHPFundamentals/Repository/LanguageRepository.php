<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/PHPFundamentals/Model/Language.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/PHPFundamentals/DB/DBConnection.php';

    class LanguageRepository{
        private $connection;

        public function __construct(){

            $obj = new DBConnection();
            $this->connection = $obj->GetConnection();
        }

        public function getLanguages(){

            if($this->connection->connect_errno){
                exit("Database Connection Failed. Reason: ".$this->connection->connect_error);
            }

            $query = "SELECT * FROM tlanguages";
            $result = $this->connection->query($query);
            $languages = array();
            
            if($result->num_rows > 0){
                while($language = $result->fetch_assoc()){
                    array_push($languages, new Language($language['language'],$language['id']));
                }
            }

            $this->connection->close();

            return $languages;
        }

    }
?>