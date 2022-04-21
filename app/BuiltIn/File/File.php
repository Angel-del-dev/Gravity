<?php

namespace App\BuiltIn\File;

class File{
    public static function createOrAppend(string $route, string $text): void
    {
        $file = fopen($route, 'a+') or die("File '$route'  not found");
        
        fwrite($file, $text);
        fclose($file);
    }
}

?>