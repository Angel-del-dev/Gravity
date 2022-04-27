<?php

namespace App\BuiltIn\Auth;
session_start();


class Auth{
    
    private const AUTH_SESSION_NAME = '__auth';

    public static function _createSession(array $data): void
    {
        $sessionArray = [];
        foreach($data as $key => $value) {
            $sessionArray[$key] = $value;
        }
        $_SESSION[self::AUTH_SESSION_NAME] = $sessionArray;
    }
    
    public static function check(): bool
    {
        return isset($_SESSION[self::AUTH_SESSION_NAME]);
    }

}

?>