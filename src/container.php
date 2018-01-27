<?php

$container = new Framework\Container;

$container->set('App\Controllers\GreetingsController', function($c) {
    return new App\Controllers\GreetingsController(['foo' => 'bar']);
});

$container->set('router', function($c) {
    return new Framework\Router($c);
});

return $container;
