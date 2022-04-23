<?php

declare(strict_types=1);
namespace Configuration;

class Output {
    public static function show($rawResponse) {
        if($rawResponse !== NULL) {
            $response = Response::formatResponse($rawResponse);
            echo $response;
        }
    }
}