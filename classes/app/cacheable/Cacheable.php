<?php

namespace app\cacheable;

abstract class Cacheable
{
    protected $request;
    private $cache;

    public function __construct(\app\Parameters $request, \utils\cache\interfaces\Cache $cache)
    {
        $this->request = $request;
        $this->cache = $cache;
    }

    public function render()
    {
        $uri = $this->request->uri();
        if ($this->cache->check($uri)) {
            return $this->cache->out($uri) . "<!-- served by cache -->";
        }

        $content = $this->content();
        $this->cache->in($uri, $content);
        return $content;
    }

    abstract protected function content();
}
