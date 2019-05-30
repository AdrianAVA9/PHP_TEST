<?php
    class User{
        public $id;
        public $username;
        public $color;
        public $gender;
        public $comments;
        public $password;
        public $isAdmin;

        public function __construct($username, $color, $gender, $comments ,$password, $isAdmin, $id = -1){
            $this->id = $id;
            $this->username = $username;
            $this->color = $color;
            $this->gender = $gender;
            $this->comments = $comments;
            $this->password = $password;
            $this->isAdmin = $isAdmin;
        }
    }
?>