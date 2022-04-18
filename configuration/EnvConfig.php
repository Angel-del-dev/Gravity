<?php

declare(strict_types=1);
namespace Configuration;

require_once __DIR__ . '/../vendor/autoload.php';
use Dotenv\Dotenv;

class EnvConfig {
    public static function getValues() {

        $dotEnv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotEnv->load();

        $envVariables = $_ENV;
        return $envVariables;
    }
}

?>