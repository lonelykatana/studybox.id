<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9a3ac64d10aa86940293a9433dcb3031
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'M' => 
        array (
            'Midtrans\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Midtrans\\' => 
        array (
            0 => __DIR__ . '/..' . '/midtrans/midtrans-php/Midtrans',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9a3ac64d10aa86940293a9433dcb3031::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9a3ac64d10aa86940293a9433dcb3031::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9a3ac64d10aa86940293a9433dcb3031::$classMap;

        }, null, ClassLoader::class);
    }
}
