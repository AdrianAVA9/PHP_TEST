<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/PHPFundamentals/Model/color.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/PHPFundamentals/DB/DBConnection.php';

    class ColorRepository{

        public $connection;

        public function __construct(){

            $obj = new DBConnection();
            $this->connection = $obj->GetConnection();
        }

        public function getColors(){
             if($this->connection->connect_errno){
                 exit("Datanbase Connection Failed. Reason: ".$this->connection->connect_error);
             }

             $query = "SELECT * FROM tcolor";
             $result = $this->connection->query($query);
             $colors = array();

             if($result->num_rows > 0){
                while($color = $result->fetch_assoc()){
                    array_push($colors, new Color($color['name'],$color['hexadecimal'],$color['id']));
                }

                $this->connection->close();
                
                return $colors;
             }
        }
    }
?>