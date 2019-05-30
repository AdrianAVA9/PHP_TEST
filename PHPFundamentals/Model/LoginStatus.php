<?php
    class LoginStatus{
        public $status;
        public $message;

        private function __construct($status, $message)
        {
            $this->status = $status;
            $this->message = $message;
        }

        public static function loginSuccessful($message){
            return new LoginStatus('successful', $message);
        }

        public static function loginFailed($message){
            return new LoginStatus('failed', $message);
        }
    }
?>