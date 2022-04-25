<?php

declare(strict_types=1);

namespace App\http\Controllers;

use App\BuiltIn\Class\Formatting\Entity;

class FormattingLibrary extends Controller{
   public static function test() {
    self::cleanString();
    print_r('<br />');
    self::checkOccurrences();
    print_r('<br />');
    self::formatArray();
   }

   private static function cleanString() {
        $delimiters = ["-","_","/",".",",","#"];
        $str = "what-a_cool/library.you,got#there";
        $config = "pascal";

        $str_format = Entity::cleanString($delimiters, $str, $config);

        print_r($str_format);
   }

   private static function checkOccurrences() {
    $str = "what-a_cool/library.you,got#there";
    $occurrences = Entity::howManyOccurrences($str, "h");

    print_r("Occurrences of letter h in: $str: $occurrences");
   }

   private static function formatArray() {
        $array = [["name"=>"test1", "details"=>"details1"],["name"=>"test2", "details"=>"details2"]];
        
        print_r('<b>From: </b>');
        $arrayAssoc = Entity::arrayToAssociative($array, "name");
        Entity::prettyPrintJson($array);
        
        print_r('<b>To: </b>');
        Entity::prettyPrintJson($arrayAssoc);
   }
}