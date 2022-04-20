<?php

namespace App\BuiltIn\MySql\Methods;

class Methods {

    public static function where(array $conditions): string
    {
        $where = ['where'];

        foreach($conditions as $condition) {

            $formCondition = " {$condition[0]} " . (isset($condition[1]) ? $condition[1] : '');

            array_push($where, $formCondition);
        }

        return implode(" ", $where);
    }

    public static function innerJoin() { }

    public static function leftJoin() { }

    public static function rightJoin() { }

    public static function fullJoin() { }

    public static function orderBy() { }
    
    public static function groupBy() { }

    public static function having() { }
    
}