<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit983f5a7f5445d70e31de6fccfb578d1c
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Modules\\Chat\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Modules\\Chat\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit983f5a7f5445d70e31de6fccfb578d1c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit983f5a7f5445d70e31de6fccfb578d1c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
