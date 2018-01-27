<?php

$routes = new Framework\RouteCollection;

$routes->add(new Framework\Route('/hello', 'App\Controllers\GreetingsController@hello'));
$routes->add(new Framework\Route('/bye', 'App\Controllers\GreetingsController@bye'));

$routes->add(new Framework\Route('/hello/{id}/bye', 'App\Controllers\GreetingsController@hellobye'));


return $routes;