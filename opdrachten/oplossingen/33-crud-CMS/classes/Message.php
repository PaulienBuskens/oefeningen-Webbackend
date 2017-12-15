<?php

    class Message{

        private $type = '';
        private $text = '';

        public function __construct($type, $text){
            $this->type = $type;
            $this->text = $text;

            $_SESSION['message'] = array("text" => $this->text,
                                        "type" => $this->type);
        }

        public static function getMessage(){
            $message = $_SESSION['message'];
            return $message;
        }

        public static function remove(){
            unset($_SESSION['message']);
        }

    }

?>
