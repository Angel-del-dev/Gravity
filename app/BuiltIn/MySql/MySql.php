<?php

namespace App\BuiltIn\MySql;

use App\BuiltIn\Class\Formatting\Entity;
use App\BuiltIn\Class\Log;
use Configuration\EnvConfig;
use Exception;

class MySql{

    public static function createConnection() {
        return MySqlController::establishConnection();
    }

    public static function create(
        string $table,
        array $keyValue
    ) { 
        $conn = self::createConnection();
        
        $insert = 'INSERT';
    
        $values = [];
        $params = [];
        
        foreach($keyValue as $list) {
            $mockupParam = [];
            $mockupValues = [];
            foreach($list as $key => $value) {
                $mockupParam[] = $key;
                $mockupValues[] = $value;
            }
            $params[] = '('.implode(', ', $mockupParam) .')';
            $values[] = '('.implode(', ', $mockupValues) .')';
        }
        if (!Entity::isArrayIdenticalWithItself($params)) throw new Exception('The columns must be the same');

        $query = "$insert INTO $table {$params[0]} VALUES ". implode(', ', $values);
        self::createLog("Checked query executed: $query");
        
        $stmt = $conn->prepare($query);
        return self::execute($stmt);
    }

    public static function update(
        string $table,
        array $values,
        array $where = ['where 1 = ?', ['1'], 'where 1 = 1']
    ) {
        $conn = self::createConnection();
        $update = 'UPDATE';
        $query = "$update $table SET ".implode(', ',$values)."  {$where[0]}";
        
        $stmt = $conn->prepare($query);

        $fullQueryLog = "$update $table SET ".implode(', ',$values)."  {$where[2]}";

        self::createLog("Checked query executed: $fullQueryLog");
        return self::execute($stmt, $where[1]);
     }

    public static function get(
        string $table,
        array $columns = ['*'],
        array $where = ['where 1 = ?', ['1'], 'where 1 = 1'],
        array $join = [],
        string $orderBy = '',
        string $groupBy = '',
        string $having = '',
        int $limit = 0 
    ) {
        $select = 'SELECT';

        $conn = self::createConnection();
        $query = "$select ". implode(', ', $columns) ." from $table ".implode(' ', $join)." {$where[0]} $groupBy $orderBy $having";

        if($limit > 0) $query .= "limit $limit";

        $stmt = $conn->prepare($query);

        $fullQueryLog = "'$select ". implode(', ', $columns) ." from $table {$where[2]}'";

        self::createLog("Checked query executed: $fullQueryLog");
        
        return self::execute($stmt, $where[1]);
    }

    public static function delete(
        string $table,
        array $where = []
    ) {
        $delete = 'DELETE';

        $conn = self::createConnection();

        $whereParams = (count($where) > 2) ? $where[0] : '';
        $fullQueryWhereParams = (count($where) > 2) ? $where[2] : '';

        $query = "$delete from $table $whereParams";

        $stmt = $conn->prepare($query);

        $fullQuery = "$delete from $table $fullQueryWhereParams";

        self::createLog("Checked query executed: $fullQuery");

        return self::execute($stmt, $where[1]);
     }

    /**
     * Execute the query
     */
    private static function execute($stmt, $bind = []) {
        
        if(sizeof($bind) > 0) {
            $amount = self::createBind(count($bind));
    
            $stmt->bind_param($amount, ...$bind);
        }


        $executed = $stmt->execute();

        $result = $stmt->get_result();

        $affected_rows = $stmt->affected_rows;

        if (!$executed) {
            echo $stmt -> error;
            die();
        }

        $stmt->close();

        $return = $affected_rows;

        if(!is_bool($result)) {
            $result->fetch_all(MYSQLI_ASSOC);
        }

        return $return;
    }

    private static function createBind(int $length): string
    {
        return str_repeat("s", $length);
    }

    /**
     * Functions that might cause problems
     */

    public static function _raw(string $query) {
        $conn = self::createConnection();
        $stmt = $conn->prepare($query);
        
        self::createLog(
            "Unchecked query executed '$query'"
        );

        return self::execute($stmt);
    }

    private static function createLog(string $message): void
    {
        $env_vars = EnvConfig::getValues();
        
        if($env_vars['MYSQL_LOG_AFTER_QUERY'] === 'true') {
            Log::create(
                $message, 
                $_SERVER['DOCUMENT_ROOT'] . '/../logs/Mysql/query.log'
            );
        }
    }
}

?>