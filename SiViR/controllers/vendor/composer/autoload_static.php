<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit46379bae217a02a184e9354bd51339ee
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\SimpleCache\\' => 16,
            'Psr\\Cache\\' => 10,
            'Phpfastcache\\' => 13,
        ),
        'I' => 
        array (
            'InstagramScraper\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\SimpleCache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/simple-cache/src',
        ),
        'Psr\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/cache/src',
        ),
        'Phpfastcache\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpfastcache/phpfastcache/lib/Phpfastcache',
        ),
        'InstagramScraper\\' => 
        array (
            0 => __DIR__ . '/..' . '/raiym/instagram-php-scraper/src/InstagramScraper',
        ),
    );

    public static $prefixesPsr0 = array (
        'U' => 
        array (
            'Unirest\\' => 
            array (
                0 => __DIR__ . '/..' . '/mashape/unirest-php/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit46379bae217a02a184e9354bd51339ee::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit46379bae217a02a184e9354bd51339ee::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit46379bae217a02a184e9354bd51339ee::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
