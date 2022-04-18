<?php

use Configuration\Router;

require_once('routes.php');
require_once('route-not-found.php');

Router::run();

?>