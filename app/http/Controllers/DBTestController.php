<?php

declare(strict_types=1);

namespace App\http\Controllers;

use App\BuiltIn\MySql\Methods\Methods;
use App\http\Models\Model;
use App\http\Models\TestModel;
use App\http\Models\UserModel;

class DBTestController extends Controller{

    public static function dbtest()
    {
        
    }

    private function rawQueryExample(): void
    {
        // $result = Model::_raw("select * from test");
    }

    private function selectExample(): void
    {
        // $result = Model::get(
        //     table: ContentModel::$table,
        //     columns: ['contingut.id', 'u.name', 'titulo', 'portada', 'url', 'descripcio'],
        //     limit: 10,
        //     join: [Methods::innerJoin(ContentModel::$table, 'users', 'propietari', 'id', 'u')],
        //     orderBy: Methods::orderBy('contingut.id', 'desc'),
        //     groupBy: Methods::groupBy('contingut.id')
        // );
    }

    private function updateExample(): void
    {
        /**
         * Returns the amount of affected rows
         */
        // $result = Model::update(
        //     table: TestModel::$table,
        //     values: Methods::set(
        //         ['name' => 'test4']
        //     )
        // );
    }

    private function insertExample(): void
    {
        // Model::create(
        //     UserModel::$table,
        //     [
        //         ['id' => 1, 'name' => '"Lori"'],
        //         ['id' => 2, 'name' => '"Albert"'],
        //         ['id' => 3, 'name' => '"Carol"']
        //     ] 
        //  );
    }

    private function deleteExample(): void
    {
        // $result = Model::delete(
        //     table: TestModel::$table,
        //     where: Methods::where([
        //         ['id = 2']
        //     ])
        // );
    }
}