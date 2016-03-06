<?php

namespace app;

class Parameters implements \IteratorAggregate
{
    private $values;

    public function __construct($parameters)
    {
        $this->values = array();
        foreach ($parameters as $parameter) {
            if (isset($_GET[$parameter])) {
                $this->values[$parameter] = $_GET[$parameter];
            } elseif (isset($_POST[$parameter])) {
                $this->values[$parameter] = $_POST[$parameter];
            } else {
                $this->values[$parameter] = null;
            }
        }
    }

    public function get($parameter)
    {
        return isset($this->values[$parameter]) ? $this->values[$parameter] : null;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->values);
    }
}
