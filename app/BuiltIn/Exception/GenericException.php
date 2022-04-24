<?php
    namespace App\BuiltIn\Exception;

use App\BuiltIn\Class\View;

    class GenericException {
        public static function _throwException(string $route, array $details = []): void
        {
            $originRoute = $_SERVER['DOCUMENT_ROOT'];
            foreach($details as $key => $value) {
                ${$key} = $value;
            }
            require $originRoute . "/../views/$route.gravity.phtml";
            die();
        }
    }
