<?php
require_once('Animals.php');

    class Ape extends Animals{
        public $legs = 2;

        public function yell(){
            return "Auooo";
        }
    }
?>