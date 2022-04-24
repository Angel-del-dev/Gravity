<?php

declare(strict_types=1);

namespace App\http\Controllers;

use App\BuiltIn\DataType\FixedLengthArray\FixedLengthArray;
use App\BuiltIn\DataType\FixedTypeArray\FixedTypeArray;

class DataTypeTestController extends Controller{
   public static function fixedTypeArrayTest(): void
    {
        $array = new FixedTypeArray('S');
        $array->softAppend('test');
        $array->softAppend('test2');

        print_r($array->_toString());   
   }

   public static function fixedLengthArrayTest(): void
   {
      $array = new FixedLengthArray(3);

      $array->softAppend('test');
      $array->softAppend(2);
      $array->softAppend(4);
      $array->softAppend(4);

      print_r($array->_toString());
   }
}