<?php

namespace html;

class Cache
{
    private static $cachedFileDirectory;
    private static $timeout;


    public static function init($cachedFileDirectory = "cache", $defaultTimeout = 5000)
    {
        if (is_dir($cachedFileDirectory) && is_writable($cachedFileDirectory)) {
            self::$cachedFileDirectory = $cachedFileDirectory;
        } else {
            self::$cachedFileDirectory = false;
        }

        self::$timeout = (int) $defaultTimeout;
    }


    public static function in($request, $html)
    {
        if (self::$cachedFileDirectory) {
            file_put_contents(self::fileName($request), $html);
        }
    }


    public static function check($request)
    {
        if (!self::$cachedFileDirectory) {
            return false;
        }

        $fileName = self::fileName($request);
        $existsInCache = file_exists($fileName);

        if ($existsInCache && (time() - filemtime($fileName) ) < self::$timeout) {
            return true;
        } elseif ($existsInCache) {
            unlink($fileName);
        }
        return false;
    }



    public static function out($request)
    {
       
        if (self::$cachedFileDirectory && self::check($request)) {
            $fileName = self::fileName($request);
            return file_get_contents($fileName);
        }
        return false;
    }


    private static function fileName($name)
    {
        return self::$cachedFileDirectory . '/' . md5($name);
    }
}
