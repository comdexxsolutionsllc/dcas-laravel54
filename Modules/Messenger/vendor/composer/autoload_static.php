<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit06028e686d63f09442a8ab16a8cb8f22
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Modules\\Messenger\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Modules\\Messenger\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit06028e686d63f09442a8ab16a8cb8f22::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit06028e686d63f09442a8ab16a8cb8f22::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}