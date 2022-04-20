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
        string $where = ''
    ) {
        $select = 'SELECT';

        $conn = self::createConnection();
        $query = "$select ". implode(', ', $columns) ." from $table $where";

        $stmt = $conn->prepare($query);
        return self::execute($stmt);
    }

    public static function delete() { }

    /**
     * Execute the query
     */
    public static function execute($stmt) {
        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>