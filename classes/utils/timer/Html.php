<?php

namespace utils\timer;

class Html
{

    public static function signature()
    {
        return sprintf("<!-- generated in %.4f seconds-->", Timer::time());
    }

    public static function log()
    {
        $now = microtime(true);
        $log = "\n<!-- log time ";
        foreach (Timer::events() as $event => $time) {
            $log .= sprintf("\n%s in %.4f seconds", $event, $now - $time);
        }
        $log .="\n-->";
        return $log;
    }
}
