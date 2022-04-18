<?php

namespace App\http\Controllers;

class Controller {

    private static $originRoute;

    public function __construct() {
        self::$originRoute = $_SERVER['DOCUMENT_ROOT'];
    }

    public static function view(string $viewName) {
        return self::$originRoute . "/../views/$viewName.phtml";
    }
}