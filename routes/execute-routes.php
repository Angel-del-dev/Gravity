<?php

use App\BuiltIn\Auth\Auth;
use Configuration\Router;

require_once('routes.php');
if(Auth::check()) {
    require_once('auth-routes.php');
}
require_once('route-not-found.php');

Router::run();

?>