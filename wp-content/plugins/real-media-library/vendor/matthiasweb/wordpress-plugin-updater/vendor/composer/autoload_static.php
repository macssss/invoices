<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit19d9c15c845141e248fdcd7ad3e29d47 {
    public static $prefixLengthsPsr4 = [
        'M' => [
            'MatthiasWeb\\WPU\\' => 16
        ]
    ];

    public static $prefixDirsPsr4 = [
        'MatthiasWeb\\WPU\\' => [
            0 => __DIR__ . '/../..' . '/src'
        ]
    ];

    public static $classMap = [
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'MatthiasWeb\\WPU\\V4\\AjaxController' => __DIR__ . '/../..' . '/src/V4/AjaxController.php',
        'MatthiasWeb\\WPU\\V4\\ClientConfig' => __DIR__ . '/../..' . '/src/V4/ClientConfig.php',
        'MatthiasWeb\\WPU\\V4\\LicenseManager' => __DIR__ . '/../..' . '/src/V4/LicenseManager.php',
        'MatthiasWeb\\WPU\\V4\\LicenseUIController' => __DIR__ . '/../..' . '/src/V4/LicenseUIController.php',
        'MatthiasWeb\\WPU\\V4\\Parsedown\\Parsedown' => __DIR__ . '/../..' . '/src/V4/Parsedown/Parsedown.php',
        'MatthiasWeb\\WPU\\V4\\Translations' => __DIR__ . '/../..' . '/src/V4/Translations.php',
        'MatthiasWeb\\WPU\\V4\\WPLSApi' => __DIR__ . '/../..' . '/src/V4/WPLSApi.php',
        'MatthiasWeb\\WPU\\V4\\WPLSClient' => __DIR__ . '/../..' . '/src/V4/WPLSClient.php',
        'MatthiasWeb\\WPU\\V4\\WPLSController' => __DIR__ . '/../..' . '/src/V4/WPLSController.php'
    ];

    public static function getInitializer(ClassLoader $loader) {
        return \Closure::bind(
            function () use ($loader) {
                $loader->prefixLengthsPsr4 = ComposerStaticInit19d9c15c845141e248fdcd7ad3e29d47::$prefixLengthsPsr4;
                $loader->prefixDirsPsr4 = ComposerStaticInit19d9c15c845141e248fdcd7ad3e29d47::$prefixDirsPsr4;
                $loader->classMap = ComposerStaticInit19d9c15c845141e248fdcd7ad3e29d47::$classMap;
            },
            null,
            ClassLoader::class
        );
    }
}
