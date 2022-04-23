<?php

declare(strict_types=1);

namespace App\http\Controllers;

use App\BuiltIn\Class\View;

class ContactController extends Controller{
    public static function execute()
    {
      return View::call('contact');
    }

    public static function contactPost($params)
    {
        return $params;
    }
}