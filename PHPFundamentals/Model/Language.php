<?php
    class Language{
        public $id;
        public $language;

        public function __construct($language, $id = -1){
            $this->id = $id;
            $this->language = $language;
        }
    }
?>