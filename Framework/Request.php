<?php

namespace Framework;

class Request
{
    public $query;

    public $request;

    public $server;

    public $attributes;

    public function __construct($attributes, $query, $request, $server)
    {
        $this->query = $query;
        $this->request = $request;
        $this->server = $server;
        $this->attributes = $attributes;
    }

    public static function createFromGlobals()
    {
        return new self([], $_GET, $_POST, $_SERVER);
    }

    public function getPathInfo()
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }
}
