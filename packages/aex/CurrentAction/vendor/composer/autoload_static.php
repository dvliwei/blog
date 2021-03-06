<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit40e086d904ffc681a6dc2b425f2d4908
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
            'Aex\\currentAction\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Aex\\currentAction\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/aex/currentAction/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit40e086d904ffc681a6dc2b425f2d4908::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit40e086d904ffc681a6dc2b425f2d4908::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
