<?php

namespace App\BuiltIn\Class;

use App\BuiltIn\File\File;

class Log{
    public static function create(string $operation, string $route): void 
    {

        $log = " $operation " . date('H:i:s d-m-Y') . "\n";
    
        File::createOrAppend(
            $route, 
            $log
        );
    }

}

?>