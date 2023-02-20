<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4725e3953fd4fcaa0e3038973347d90e
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit4725e3953fd4fcaa0e3038973347d90e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4725e3953fd4fcaa0e3038973347d90e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4725e3953fd4fcaa0e3038973347d90e::$classMap;

        }, null, ClassLoader::class);
    }
}
