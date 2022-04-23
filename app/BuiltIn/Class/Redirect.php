<?php

namespace App\BuiltIn\Class;

class Redirect{
    public static function send(string $route): void 
    {
        header("Location: $route");
    }

}

?>