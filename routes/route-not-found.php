<?php

use Configuration\Router;

Router::addNotFoundHandler(function() {
    $title = "Route not found";
    require_once __DIR__ . '/../views/404.phtml';
});

?>