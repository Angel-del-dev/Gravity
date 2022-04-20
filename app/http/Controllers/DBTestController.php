<?php

declare(strict_types=1);

namespace App\http\Controllers;

use App\BuiltIn\MySql\Methods\Methods;
use App\http\Models\Model;
use App\http\Models\TestModel;

class DBTestController extends Controller{

    public static function dbtest(): array
    {
        $result = Model::get(
            table: TestModel::$table,
            where: Methods::where([
                ['id = "1"', "and"],
                ['nombre = "test"']
            ]),
            columns: TestModel::$columns
        );
        return $result;
    }
}