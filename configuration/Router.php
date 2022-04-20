<?php
declare(strict_types=1);

namespace Configuration;

use Configuration\Response;

class Router 
{

    private static $handlers;
    private static $notFoundHandler;

    private const METHOD_POST = 'POST';
    private const METHOD_GET = 'GET';

    /**
     * Get method 
     */

    public static function get(string $path, $handler): void
    {
        self::addHandler(self::METHOD_GET, $path, $handler);
    }

    /**
     * Post method
     */

    public static function post(string $path, $handler): void
    {
        self::addHandler(self::METHOD_POST, $path, $handler);
    }
    
    /**
     * Adding handler for non existing routes
     */

    public static function addNotFoundHandler($handler): void
    {
        self::$notFoundHandler = $handler;
    }

    /**
     * Add handler for existing routes
     */

    private static function addHandler(string $method, string $path, $handler): void
    {
        self::$handlers[$method . $path] = [
            'path' => $path,
            'method' => $method,
            'handler' => $handler,
        ];
    }

    public static function run() 
    {
        $callback = self::createCallbacks();

        self::routeNotExist($callback);

        // Allows to use $_GET && $_POST without the need of calling global variables
        $controllerReturn = call_user_func_array($callback, [
            array_merge($_GET, $_POST)
        ]);
        
        self::returnInformation($controllerReturn);
    }

    private static function createCallbacks() {
        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $requestPath = $requestUri['path'];

        $method = $_SERVER['REQUEST_METHOD'];
        $callback = null;

        foreach(self::$handlers as $handler) {
            if($handler['path'] === $requestPath && $method === $handler['method']) {
                $callback = $handler['handler'];
            }
        }

        return $callback;
    }

    private static function routeNotExist($callback) {
        // When the route does not exist
        if(is_array($callback)) {
            $handler = new $callback[0];
            $method = $callback[1];
            $callback = [$handler, $method];
        }

        if(!$callback) {
            if(!empty(self::$notFoundHandler)) {
                // Returning error 404
                header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);                
                /*
                 * User defined function only has __invoke method, if it's not called,
                 * it will return a closure object() instead of the given string
                 */
                $callback = self::$notFoundHandler->__invoke();
                self::createView($callback);
            }
            die();
        }
    }

    private static function returnInformation($controllerReturn) {
        if(is_array($controllerReturn) && array_is_list($controllerReturn) && is_string($controllerReturn[0])) {
            $checkIfRoute = self::checkIfRoute($controllerReturn[0]);

            if($checkIfRoute) {
                self::createView($controllerReturn);
                return null;
            }
        }

        $response = Response::formatResponse($controllerReturn);
        echo $response;
    }

    private static function checkIfRoute(string $controllReturn) {
        
        if(file_exists($controllReturn)) {
            return $controllReturn;
        }
    }

    private static function createView(array $view): void
    {
        foreach($view[1] as $key => $value) {
            ${$key} = $value;
        }

        require_once $view[0];
    }
}