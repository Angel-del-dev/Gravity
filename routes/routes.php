<?php

use Configuration\Router;
use App\http\Controllers\ContactController;
use App\http\Controllers\HomeController;
use App\http\Controllers\DBTestController;

Router::get('/', [HomeController::class, 'getHome']);

/**
 * Example of get route with dynamic values as the url query string
 */
Router::get('/about', function(array $params = []) {
    return 'About section';
});

Router::get('/contact', [ContactController::class, 'execute']);
Router::get('/dbtest', [DBTestController::class, 'dbtest']);

Router::post('/contact', [ContactController::class, 'contactPost']);

?>