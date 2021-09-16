<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaa869398387d51d91fcee7f6a9f969d9
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'Novuslogics\\AdminPanel\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Novuslogics\\AdminPanel\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaa869398387d51d91fcee7f6a9f969d9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaa869398387d51d91fcee7f6a9f969d9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitaa869398387d51d91fcee7f6a9f969d9::$classMap;

        }, null, ClassLoader::class);
    }
}
