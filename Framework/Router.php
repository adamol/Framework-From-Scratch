<?php

namespace Framework;

class Router
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function match($routes, $request)
    {
        $url = $request->getPathInfo();

        $urlParts = explode('/', trim($url, '/'));
        foreach ($routes as $route) {
            $routePathParts = explode('/', trim($route->getPath(), '/'));

            if (sizeof($routePathParts) !== sizeof($urlParts)) {
                continue;
            }

            foreach ($routePathParts as $index => $part) {
                preg_match('/{(.*?)}/', $part, $matches);

                if (empty($matches) && $part === $urlParts[$index]) {
                    continue;
                }

                if (empty($matches) && $part !== $urlParts[$index]) {
                    continue 2;
                }

                $request->attributes[$matches[1]] = $urlParts[$index];
            }

            return [
                $this->instantiateController($route->getController()),
                $route->getMethod()
            ];
        }

        throw new \Exception('No matching route found for '.$url.'.');
    }

    public function instantiateController($controller)
    {
        return $this->container->get($controller);
    }
}
