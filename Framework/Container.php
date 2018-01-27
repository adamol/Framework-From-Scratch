<?php

namespace Framework;

class Container
{
    protected $services = [];

    public function set($key, $callback)
    {
        $this->services[$key] = $callback($this);
    }

    public function get($key)
    {
        return $this->services[$key];
    }
}