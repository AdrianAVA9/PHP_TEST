<?php
    class Profile{
        public $id;
        public $username;
        public $password;
        public $isAdmin;

        public function __construct($username, $password, $isAdmin, $id = -1){
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->isAdmin = $isAdmin;
        }
    }
?>