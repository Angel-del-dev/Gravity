<?php

declare(strict_types=1);

namespace App\http\Controllers;

use App\BuiltIn\Class\View;

class HomeController extends Controller{
    public static function getHome(array $params = []) {
        $vars = [
            "welcome" => "Welcome to home!",
        ];

       return View::call('home', $vars);
    }
}