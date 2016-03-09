<?php

namespace utils\cache\interfaces;

interface Cache
{
   
    public function in($key, $content);
    public function check($key);
    public function out($request);
}
