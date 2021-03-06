<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9b519bb67f32323a935c36907c699c62 {
    public static $prefixLengthsPsr4 = [
        'D' => [
            'DevOwl\\RealUtils\\Test\\' => 22,
            'DevOwl\\RealUtils\\' => 17
        ]
    ];

    public static $prefixDirsPsr4 = [
        'DevOwl\\RealUtils\\Test\\' => [
            0 => __DIR__ . '/../..' . '/test/phpunit'
        ],
        'DevOwl\\RealUtils\\' => [
            0 => __DIR__ . '/../..' . '/src'
        ]
    ];

    public static $classMap = [
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php'
    ];

    public static function getInitializer(ClassLoader $loader) {
        return \Closure::bind(
            function () use ($loader) {
                $loader->prefixLengthsPsr4 = ComposerStaticInit9b519bb67f32323a935c36907c699c62::$prefixLengthsPsr4;
                $loader->prefixDirsPsr4 = ComposerStaticInit9b519bb67f32323a935c36907c699c62::$prefixDirsPsr4;
                $loader->classMap = ComposerStaticInit9b519bb67f32323a935c36907c699c62::$classMap;
            },
            null,
            ClassLoader::class
        );
    }
}
