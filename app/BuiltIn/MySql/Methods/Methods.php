<?php

namespace App\BuiltIn\MySql\Methods;

class Methods {

    public static function where(array $conditions): array
    {
        $where = ['where'];
        $conditionValues = [];

        $rawWhere = '';

        foreach($conditions as $condition) {
            
            $preparedCondition = self::prepareWhereString($condition[0]);
            
            $formCondition = " {$preparedCondition[0]} " . (isset($condition[1]) ? $condition[1] : '');
            
            array_push($conditionValues, $preparedCondition[1]);
            array_push($where, $formCondition);

            $rawWhere .= " where {$condition[0]} " . (isset($condition[1]) ? $condition[1] : '');
        }

        $whereString = implode(" ", $where);
        return [$whereString, $conditionValues, $rawWhere];
    }

    public static function innerJoin() { }

    public static function leftJoin() { }

    public static function rightJoin() { }

    public static function fullJoin() { }

    public static function orderBy() { }
    
    public static function groupBy() { }

    public static function having() { }

    /**
     * Replaces the actual value of the where with a ? and returns an array with:
     * the condition, the value and the raw condition
     */

    private static function prepareWhereString(string $condition): array
    {
        $conditionArray = explode(' ', trim($condition));
        $operation = $conditionArray[1];
        $whereValue = end($conditionArray);
        $modify = '?';
        $conditionArray[array_key_last($conditionArray)] = $modify;
        $preparedCondition = implode($operation, [$conditionArray[0], end($conditionArray)]);

        return [$preparedCondition, $whereValue];
    }
    
}