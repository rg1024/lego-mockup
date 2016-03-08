<?php

error_reporting(E_ALL);

spl_autoload_register(
    function ($clase) {
        /**
         * Each class must be in a file located in /classes where every namespace is a directory.
         * Example:   app\html must be defined in /classes/app/Html.php.
         * namespace and directories are lowercase. Class file is camel case.
         */
        static $dir;

        if (is_null($dir)) {
            $dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR;
        }

        $file = $dir . str_replace("\\", DIRECTORY_SEPARATOR, $clase) . ".php";
        if (file_exists($file)) {
            include_once $file;
            return true;
        }
        return false;
    }
);
