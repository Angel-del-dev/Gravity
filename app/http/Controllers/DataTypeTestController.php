<?php

declare(strict_types=1);

namespace App\http\Controllers;

use App\BuiltIn\DataType\FixedArray\FixedArray;

class DataTypeTestController extends Controller{
   public static function dataTypeTest(): void
    {
        $array = new FixedArray('STRI');
        $array->softAppend('test');
        $array->softAppend('test2');

        print_r($array->__toString());
        die();   
   }
}