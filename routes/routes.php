<?php

use App\BuiltIn\Class\Redirect;
use Configuration\Router;
use App\http\Controllers\ContactController;
use App\http\Controllers\DataTypeTestController;
use App\http\Controllers\HomeController;
use App\http\Controllers\DBTestController;
use Configuration\Request;

Router::get('/', [HomeController::class, 'getHome']);

/**
 * Example of get route with dynamic values as the url query string
 */
Router::get('/about', function() {
    return 'About section';

});
Router::get('/contact', [ContactController::class, 'execute']);
Router::get('/dbtest', [DBTestController::class, 'dbtest']);
Router::get('/fixedTypeArrayTest', [DataTypeTestController::class, 'fixedTypeArrayTest']);
Router::get('/fixedLengthArrayTest', [DataTypeTestController::class, 'fixedLengthArrayTest']);

Router::get('/redirectTest', function() {
    Redirect::send('/');
});
Router::get('/version/stable/:version:', function($get) {
    return $get;
});

Router::get('/urlparams/key/:prueba:', function($get) {
    return $get;
});

Router::get('/urlparams/key/asd/asdasd/:testRoute:', function($get) {
    return $get;
});

Router::get('/hello/:test1:', function($get) {
    return $get;
});

Router::post('/contact/:id:', [ContactController::class, 'contactPost']);

?>