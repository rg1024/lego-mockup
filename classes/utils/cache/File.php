<?php

namespace utils\cache;

class File implements interfaces\Cache
{
    private $cachedFileDirectory;
    private $timeout;


    public function __construct($cachedFileDirectory = "cache", $defaultTimeout = 5000)
    {
        if (is_dir($cachedFileDirectory) && is_writable($cachedFileDirectory)) {
            $this->cachedFileDirectory = $cachedFileDirectory;
        } else {
            $this->cachedFileDirectory = false;
        }

        $this->timeout = (int) $defaultTimeout;
    }


    public function in($key, $content)
    {
        if ($this->cachedFileDirectory) {
            file_put_contents($this->fileName($key), $content);
        }
    }


    public function check($key)
    {
        if (!$this->cachedFileDirectory) {
            return false;
        }

        $fileName = $this->fileName($key);
        $existsInCache = file_exists($fileName);

        if ($existsInCache && (time() - filemtime($fileName) ) < $this->timeout) {
            return true;
        } elseif ($existsInCache) {
            unlink($fileName);
        }
        return false;
    }



    public function out($request)
    {
        if ($this->cachedFileDirectory && $this->check($request)) {
            $fileName = $this->fileName($request);
            return file_get_contents($fileName);
        }
        return false;
    }


    private function fileName($name)
    {
        return $this->cachedFileDirectory . '/' . md5($name);
    }
}
