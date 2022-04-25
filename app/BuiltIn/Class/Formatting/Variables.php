<?php

namespace App\BuiltIn\Class\Formatting;

class Variables {
	private const VARIABLES = [
		"first_up" => ["name" => "firstUppercase"],
		"uppercase" => ["name" => "allUpercase"],
		"lowercase" => ["name" => "allLowercase"],
		"cammel" => ["name" => "cammelCase"],

		"pascal" => ["name" => "pascalCase"],

		"spaces" => ["name" => "customCase", "delimiter" => " "],
		"slash" => ["name" => "customCase", "delimiter" => "/"],
		"cobra" => ["name" => "customCase", "delimiter" => "_"],
		"dash" => ["name" => "customCase", "delimiter" => "-"],
		"dot" => ["name" => "customCase", "delimiter" => "."]
	];

    public static function get(): array
    {
        return self::VARIABLES;
    }
}
