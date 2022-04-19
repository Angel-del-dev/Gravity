<?php

namespace App\BuiltIn\Class;

class View{
    public static function call(string $viewName, array $vars = []): array
    {
       $originRoute = $_SERVER['DOCUMENT_ROOT'];
        return [$originRoute . "/../views/$viewName.gravity.phtml", $vars];
    }

}

?>