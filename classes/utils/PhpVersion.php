<?php

namespace utils;

class PhpVersion
{
    
    public static function atLeast($major, $minor)
    {
        // we use namespace, so we are at least in php 5.3. PHP_VERSION_MAJOR are defined in 5.2)
        return PHP_MAJOR_VERSION> $major || (PHP_MAJOR_VERSION==$major && PHP_MINOR_VERSION >= $minor);
    }

    public static function dieIfnotMatchs($major, $minor)
    {
        if (!self::atLeast($major, $minor)) {
            die("PHP {$major}.{$minor} or superior required");
        }
    }
}
