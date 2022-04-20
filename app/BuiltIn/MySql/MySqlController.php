<?php

namespace App\BuiltIn\MySql;

use Configuration\EnvConfig;
use mysqli;

class MySqlController {
    public static function establishConnection() {
        $env_vars = EnvConfig::getValues();

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $connection = new mysqli(
            $env_vars['MYSQL_HOST'], 
            $env_vars['MYSQL_USER'], 
            $env_vars['MYSQL_PASSWORD'], 
            $env_vars['MYSQL_DATABASE']
        );

        return $connection;
    }
}

?>