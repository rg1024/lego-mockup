<?php

namespace utils\timer;

class Html
{

    public static function signature(Timer $timer)
    {
        return sprintf("<!-- generated in %.4f seconds-->", $timer->time());
    }

    public static function log(Timer $timer)
    {
        $now = microtime(true);
        $log = "\n<!-- log time ";
        foreach ($timer as $event => $time) {
            $log .= sprintf("\n%s in %.4f seconds", $event, $now - $time);
        }
        $log .="\n-->";
        return $log;
    }
}
