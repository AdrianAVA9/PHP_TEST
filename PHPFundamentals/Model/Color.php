<?php
    class Color{
        public $id;
        public $name;
        public $hexadecimal;

        public function __construct($name, $hexadecimal, $id = -1){
            $this->$id  = $id;
            $this->hexadecimal = $hexadecimal;
            $this->name = $name;
        }
    }
?>