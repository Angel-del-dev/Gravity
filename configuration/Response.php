<?php

namespace Configuration;

use DateTime;

class Response {
    public static function formatResponse($controllerReturn) {
        $response = [
            'response' => $controllerReturn,
            'timestamp' => new DateTime(),
            'access_method' => $_SERVER['REQUEST_METHOD']
        ];

        return json_encode($response);
    }
}