<?php

namespace html;

class Encode
{
    public static function asAttribute($literal)
    {
        $replaces = array("'"=>"&#39;" , '"' =>"&#34;");
        return strtr($literal, $replaces);
    }
}
