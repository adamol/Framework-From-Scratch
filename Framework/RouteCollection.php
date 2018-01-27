<?php

namespace Framework;

class RouteCollection implements \IteratorAggregate
{
    /**
     * @var array
     */
    private $routes;

    public function __construct($routes = [])
    {
        $this->routes = $routes;
    }

    public function add(Route $route)
    {
        $this->routes[$route->getPath()] = $route;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->routes);
    }
}
