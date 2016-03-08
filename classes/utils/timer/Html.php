<?php

namespace utils\timer;

class Html
{

    public static function signature()
    {
        return sprintf("<!-- generated in %.4f seconds-->", Timer::time());
    }

    private static function log()
    {
        $now = microtime(true);
        $return = "<!-- log time ";
        foreach (Timer::events() as $event => $time) {
            $return .= sprintf("\n%s in %.4f seconds", $events, $now - $time);
        }
        return "\-->";
        return $return;
    }
}
