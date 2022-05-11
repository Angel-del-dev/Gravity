<?php

namespace App\BuiltIn\Class;

use Configuration\EnvConfig;

class View{
    public static function call(string $viewName, array $vars = []): array
    {
       $originRoute = $_SERVER['DOCUMENT_ROOT'];

       $env_vars = EnvConfig::getValues();
       
        return [$originRoute . "/../views/$viewName.{$env_vars['VIEW_EXTENSION']}", $vars];
    }

}

?>