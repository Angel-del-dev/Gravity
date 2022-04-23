<?php
    namespace App\BuiltIn\DataType\FixedLengthArray;

    use Exception;  

    class FixedLengthArrayException extends Exception {
        
        protected $details = "";

        public function __construct($details) {
            $this->details = $details;
            parent::__construct();
        }

        public function __toString() {
            return $this->details;
        }
    }
