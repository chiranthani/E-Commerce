<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbed2e8ccd949e6a4ede6dde5b9d39619
{
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitbed2e8ccd949e6a4ede6dde5b9d39619::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbed2e8ccd949e6a4ede6dde5b9d39619::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbed2e8ccd949e6a4ede6dde5b9d39619::$classMap;

        }, null, ClassLoader::class);
    }
}
