<?php

namespace app\cacheable;

abstract class Cacheable
{
    protected $request;

    public function __construct(\app\Parameters $request)
    {
        $this->request = $request;
    }

    public function render()
    {
        $uri = $this->request->uri();
        if (\html\Cache::check($uri)) {
            return \html\Cache::out($uri) . "<!-- served by cache -->";
        }

        $content = $this->content();
        \html\Cache::in($uri, $content);
        return $content;
    }

    abstract protected function content();
}
