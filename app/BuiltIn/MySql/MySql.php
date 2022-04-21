<?php

namespace App\BuiltIn\MySql;

class MySql{

    public static function createConnection() {
        return MySqlController::establishConnection();
    }

    public static function _raw(string $query) {
        $conn = self::createConnection();
        $stmt = $conn->prepare($query);
        

        return self::execute($stmt);
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
        
        return self::execute($stmt, $where[1]);
    }

    public static function delete() { }

    /**
     * Execute the query
     */
    public static function execute($stmt, $bind = []) {

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
}

?>