<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit181e3796e2f3ff12a4bff29454fcb555
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit181e3796e2f3ff12a4bff29454fcb555::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit181e3796e2f3ff12a4bff29454fcb555::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit181e3796e2f3ff12a4bff29454fcb555::$classMap;

        }, null, ClassLoader::class);
    }
}
