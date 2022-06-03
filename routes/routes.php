<?php

use Configuration\Router;
use App\http\Controllers\FrontController;

Router::get('/front-showcase/get-data', [FrontController::class, 'showcase']);

?>