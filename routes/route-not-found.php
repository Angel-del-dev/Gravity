<?php

use App\BuiltIn\Class\View;
use Configuration\Router;

Router::addNotFoundHandler(function() {
    $title = "Route not found";
    $message = '
    $router->get(\'/\', function() {
        echo \'Home Page\';
    });';

    $vars = [
        "title" => $title,
        "message" => $message
    ];

    return View::call('404', $vars);
});

?>