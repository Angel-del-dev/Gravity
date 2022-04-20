<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite6b06d2bbca4b2cf25fc2b30b3b7c0fc
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        'a4a119a56e50fbb293281d9a48007e0e' => __DIR__ . '/..' . '/symfony/polyfill-php80/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Php80\\' => 23,
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'P' => 
        array (
            'PhpOption\\' => 10,
        ),
        'G' => 
        array (
            'GrahamCampbell\\ResultType\\' => 26,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
        'C' => 
        array (
            'Configuration\\' => 14,
        ),
        'A' => 
        array (
            'App\\http\\Models\\' => 16,
            'App\\http\\Controllers\\' => 21,
            'App\\BuiltIn\\MySql\\Methods\\' => 26,
            'App\\BuiltIn\\MySql\\' => 18,
            'App\\BuiltIn\\Class\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Php80\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php80',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'PhpOption\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoption/phpoption/src/PhpOption',
        ),
        'GrahamCampbell\\ResultType\\' => 
        array (
            0 => __DIR__ . '/..' . '/graham-campbell/result-type/src',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
        'Configuration\\' => 
        array (
            0 => __DIR__ . '/../..' . '/configuration',
        ),
        'App\\http\\Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/http/Models',
        ),
        'App\\http\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/http/Controllers',
        ),
        'App\\BuiltIn\\MySql\\Methods\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/BuiltIn/MySql/Methods',
        ),
        'App\\BuiltIn\\MySql\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/BuiltIn/MySql',
        ),
        'App\\BuiltIn\\Class\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/BuiltIn/Class',
        ),
    );

    public static $classMap = array (
        'Attribute' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Attribute.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'PhpToken' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/PhpToken.php',
        'Stringable' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Stringable.php',
        'UnhandledMatchError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/UnhandledMatchError.php',
        'ValueError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/ValueError.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite6b06d2bbca4b2cf25fc2b30b3b7c0fc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite6b06d2bbca4b2cf25fc2b30b3b7c0fc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite6b06d2bbca4b2cf25fc2b30b3b7c0fc::$classMap;

        }, null, ClassLoader::class);
    }
}
