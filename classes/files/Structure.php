<?php

namespace files;

class Structure
{
    private static $rootDir;

    public static function init_once($dir)
    {

        if (empty(self::$rootDir)) {
            self::$rootDir = $dir;
            return true;
        }
        return false;
    }

    public static function get()
    {
        $paths = func_get_args();
        return self::$rootDir . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $paths);
    }
}
