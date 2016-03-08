<?php

namespace utils\timer;

class Timer
{
    private static $events;
    
    public static function initOnce()
    {
        self::record("init");
    }


    public static function record($event)
    {
        if (!isset(self::$events[$event])) {
            self::$events[$event] = microtime(true);
        }
    }


    public static function time($fromEvent = "init")
    {
        if (isset(self::$events[$fromEvent])) {
            return microtime(true)-self::$events[$fromEvent];
        }
        return 0;
    }


    public static function events()
    {
        return new \ArrayIterator(self::$events);
    }
}
