<?php

namespace App\BuiltIn\MySql;

use App\BuiltIn\Class\Log;
use DateTime;

class MySql{

    public static function createConnection() {
        return MySqlController::establishConnection();
    }

    public static function create() { }

    public static function update() { }

    public static function get(
        string $table,
        array $columns = ['*'],
        array $where = []
    ) {
        $select = 'SELECT';

        $conn = self::createConnection();
        $query = "$select ". implode(', ', $columns) ." from $table {$where[0]}";

        $stmt = $conn->prepare($query);

        $fullQueryLog = "'$select ". implode(', ', $columns) ." from $table {$where[2]}'";

        Log::create(
            "Checked query executed $fullQueryLog", 
            $_SERVER['DOCUMENT_ROOT'] . '/../logs/Mysql/query.log'
        );
        
        return self::execute($stmt, $where[1]);
    }

    public static function delete() { }

    /**
     * Execute the query
     */
    private static function execute($stmt, $bind = []) {

        if(sizeof($bind) > 0) {
            $amount = self::createBind(count($bind));
    
            $stmt->bind_param($amount, ...$bind);
        }


        $stmt->execute();

        $result = $stmt->get_result();

        $affected_rows = $stmt->affected_rows;

        if (!$stmt -> execute()) {
            echo $stmt -> error;
            die();
        }

        $stmt->close();

        return $result->fetch_all(MYSQLI_ASSOC);
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
        
        Log::create(
            "Unchecked query executed '$query'", 
            $_SERVER['DOCUMENT_ROOT'] . '/../logs/Mysql/query.log'
        );

        return self::execute($stmt);
    }
}

?>