<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3d685adf1707d554f27e27a87a1818bb
{
    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PHPassLib' => 
            array (
                0 => __DIR__ . '/..' . '/rych/phpass/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit3d685adf1707d554f27e27a87a1818bb::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}