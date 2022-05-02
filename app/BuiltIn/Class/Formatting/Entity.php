<?php

namespace App\BuiltIn\Class\Formatting;

class Entity
{
	//
	// Start of string cleaning functions
	//
	public static function cleanString(array $delimiters, string $str, string $config = "spaces"): string
	{
		foreach ($delimiters as $delimiter) {
			$str = self::removeDelimiter($delimiter, $str);
		}

		$str = self::configString($config, $str);

		return $str;
	}

	private static function removeDelimiter(string $delimiter, string $str): string
	{
		return implode(" ", explode($delimiter, $str));
	}

	private static function configString(string $config, string $str): string
	{
		$function_array = Variables::get()[$config];
		return self::checkIfCustomCase($function_array, $str);
	}

	private static function checkIfCustomCase(array $config, string $str): string
	{
		$methodName = $config["name"];
		if ($methodName === "customCase") {
			$delimiter = $config["delimiter"];
			return self::$methodName($delimiter, $str);
		}

		return self::$methodName($str);
	}

	private static function firstUppercase(string $str): string
	{
		return ucfirst($str);
	}

	private static function allUpercase(string $str): string
	{
		return strtoupper($str);
	}

	private static function allLowercase(string $str): string
	{
		return strtolower($str);
	}

	private static function cammelCase(string $str): string
	{
		return ucwords($str);
	}

	private static function pascalCase(string $str): string
	{
		return implode("", explode(" ", ucwords($str)));
	}

	private static function customCase(string $delimiter, string $str): string
	{
		return implode($delimiter, explode(" ", $str));
	}

	public static function howManyOccurrences(string $str, string $check): int
	{
		$str_array = str_split($str);
		$number = 0;

		foreach ($str_array as $character) {
			if ($character === $check) {
				$number += 1;
			}
		}

		return $number;
	}

	//
	// End of string cleaning functions
	//

	// 
	// Start of array formatting functions
	// 
	public static function arrayToAssociative(array $array, string $key): array
	{
		$format_array = [];

		foreach ($array as $row) {
			$keys = array_keys($row);
			$newRow = [];

			foreach ($keys as $newKey) {
				if ($newKey !== $key) {
					$newRow[$newKey] = $row[$newKey];
				}
			}
			$format_array[$row[$key]] = $newRow;
		}

		return $format_array;
	}

	public static function isArrayIdenticalWithItself(array $array): bool
	{
		for($i = 0 ; $i < sizeof($array) ; $i++) {
			for($j = 0; $j < sizeof($array); $j++) {
				if($array[$j] !== $array[$i]) {
					return false;
				}
			}
		}

		return true;
	}
	// 
	// End of array formatting functions
	// 

	// 
	// Start of pretty print
	// 
	public static function prettyPrintJson($json)
	{
		print("<pre>");
		print_r($json);
		print("</pre>");
	}
	// 
	// End of pretty print
	// 
}
