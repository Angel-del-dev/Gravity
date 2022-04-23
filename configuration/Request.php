<?php

declare(strict_types=1);
namespace Configuration;

use DateTime;

class Request {
    public static function formatRequest($values) {
        $response = [
            'request' => $values,
            'timestamp' => new DateTime(),
            'access_method' => $_SERVER['REQUEST_METHOD'],
            'route' => $_SERVER['DOCUMENT_ROOT'],
            'host' => $_SERVER['HTTP_HOST']
        ];

        return json_encode($response);
    }
}