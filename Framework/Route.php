<?php

namespace Framework;

class Route
{
    protected $path;
    protected $controller;
    protected $method;

    public function __construct($path, $actionPath)
    {
        $this->path = $path;
        list($controller, $method) = $this->parseActionPath($actionPath);
        $this->controller = $controller;
        $this->method = $method;
    }

    /**
     * @param $controllerPath
     * @return array
     */
    public function parseActionPath($controllerPath)
    {
        list($controller, $method) = explode('@', $controllerPath);
        return array($controller, $method);
    }

    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }
}
