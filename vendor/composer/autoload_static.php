<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8f86b9ee5cbabd3e0869d2b96f5da0e4
{
    public static $files = array (
        '87fca1da063280925d7ef45beb9f62eb' => __DIR__ . '/../..' . '/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8f86b9ee5cbabd3e0869d2b96f5da0e4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8f86b9ee5cbabd3e0869d2b96f5da0e4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8f86b9ee5cbabd3e0869d2b96f5da0e4::$classMap;

        }, null, ClassLoader::class);
    }
}
