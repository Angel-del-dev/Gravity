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

    public static function innerJoin(
        string $principalTable, 
        string $secondaryTable, 
        string $firstParam, 
        string $secondParam, 
        string $secondaryTableAlias
    ): string
    {
        return 'INNER JOIN' . self::genericJoin(
            $principalTable, 
            $secondaryTable, 
            $firstParam, 
            $secondParam, 
            $secondaryTableAlias
        );
    }

    public static function leftJoin(
        string $leftTable, 
        string $rightTable, 
        string $leftParam, 
        string $rightParam, 
        string $rightTableAlias
    ): string 
    { 
        return 'LEFT JOIN' . self::genericJoin(
            $leftTable, 
            $rightTable, 
            $leftParam, 
            $rightParam, 
            $rightTableAlias
        );
    }

    public static function rightJoin(
        string $leftTable, 
        string $rightTable, 
        string $leftParam, 
        string $rightParam, 
        string $rightTableAlias
    ): string 
    { 
        return 'RIGHT JOIN' . self::genericJoin(
            $leftTable, 
            $rightTable, 
            $leftParam, 
            $rightParam, 
            $rightTableAlias
        );
    }

    public static function orderBy(
        string $column,
        string $order
    ): string
    { 
        return "ORDER BY $column $order";
    }
    
    public static function groupBy(string $column): string 
    {
        return "GROUP BY $column";
    }

    public static function having(string $condition): string
    {
        return "HAVING $condition";
    }

    public static function limit($limit, $offset = 0): string
    {
        return  "LIMIT $limit $offset";
    }

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

    private static function genericJoin(
        string $principalTable, 
        string $secondaryTable, 
        string $firstParam, 
        string $secondParam, 
        string $secondaryTableAlias
    ): string
    {
        return "$secondaryTable as $secondaryTableAlias 
        ON $principalTable.$firstParam = $secondaryTableAlias.$secondParam";
    }

    
}