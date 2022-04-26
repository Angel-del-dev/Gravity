<?php

namespace App\BuiltIn\File;

class File{
    public static function createOrAppend(string $route, string $text): void
    {
        $file = fopen($route, 'a+') or die("File '$route'  not found");
        
        fwrite($file, $text);
        fclose($file);
    }

    public static function read(string $route): string
    {
        $completeRoute = "{$_SERVER['DOCUMENT_ROOT']}/../$route";
        return file_get_contents($completeRoute);
    }

    public static function lastAccess(string $route, string $format)
    {
        $completeRoute = "{$_SERVER['DOCUMENT_ROOT']}/../$route";
        return date($format, fileatime($completeRoute));
    }
}

?>