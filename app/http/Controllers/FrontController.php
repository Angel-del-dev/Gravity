<?php

declare(strict_types=1);

namespace App\http\Controllers;

use App\BuiltIn\Class\View;

class FrontController extends Controller{
    public static function showcase()
    {
        return View::call('Front/front-showcase', [
            "frameworkName" => "Gravity",
            "description" => "Full stack web dev framework"
        ]);
    }
}