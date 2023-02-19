<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6c568429b59f77c9f1ede5306d7ef7f6
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PracticaComposer\\Content\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PracticaComposer\\Content\\' => 
        array (
            0 => __DIR__ . '/../..' . '/content',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'FPDF' => __DIR__ . '/..' . '/setasign/fpdf/fpdf.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6c568429b59f77c9f1ede5306d7ef7f6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6c568429b59f77c9f1ede5306d7ef7f6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6c568429b59f77c9f1ede5306d7ef7f6::$classMap;

        }, null, ClassLoader::class);
    }
}