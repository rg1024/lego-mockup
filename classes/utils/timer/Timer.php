<?php

namespace utils\timer;

class Timer implements \IteratorAggregate
{
    private $events;
    
    public function __construct()
    {
        $this->events["init"] = $_SERVER['REQUEST_TIME_FLOAT'];
    }

    public function record($event)
    {
        if (!isset($this->events[$event])) {
            $now = microtime(true);
            $this->events[$event] = $now;
            return $now;
        }
        return 0;
    }


    public function time($fromEvent = "init")
    {
        if (isset($this->events[$fromEvent])) {
            return microtime(true) - $this->events[$fromEvent];
        }
        return 0;
    }


    public function getIterator()
    {
        return new \ArrayIterator($this->events);
    }
}
