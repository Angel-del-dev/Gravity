<?php

namespace App\BuiltIn\MySql\Methods;

class Methods {

    public static function where(array $conditions): array
    {
        $where = ['where'];
        $conditionValues = [];

        foreach($conditions as $condition) {
            $noWhiteSpacesCondition = self::removeWhiteSpaces($condition[0]);
            
            $preparedCondition = self::prepareWhereString($noWhiteSpacesCondition);
            
            $formCondition = " {$preparedCondition[0]} " . (isset($condition[1]) ? $condition[1] : '');
            
            array_push($conditionValues, $preparedCondition[1]);
            array_push($where, $formCondition);
        }

        $whereString = implode(" ", $where);
        
        return [$whereString, $conditionValues];
    }

    public static function innerJoin() { }

    public static function leftJoin() { }

    public static function rightJoin() { }

    public static function fullJoin() { }

    public static function orderBy() { }
    
    public static function groupBy() { }

    public static function having() { }

    private static function removeWhiteSpaces(string $string): string
    {
        return preg_replace('/\s+/', '', $string);
    }

    /**
     * Replaces the actual value of the where with a ? and returns an array with both
     * the condition and the value
     */

    private static function prepareWhereString(string $condition): array
    {
        $conditionArray = explode('=', $condition);
        $whereValue = end($conditionArray);
        $modify = '?';
        $conditionArray[array_key_last($conditionArray)] = $modify;
        $preparedCondition = implode(' = ', $conditionArray);


        return [$preparedCondition, $whereValue];
    }
    
}