<?php

/* 
 * Consider Parameters as the main parameters of a web page usualy the request.
 *
 *
 */

namespace app\interfaces;

interface Parameters extends \IteratorAggregate
{
    public function get($parameter);
    public function uri();
    
    // Note: \IteratorAggregate requires the implementation of this function
    // public function getIterator();
}
