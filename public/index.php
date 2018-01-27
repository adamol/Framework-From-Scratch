<?php

require __DIR__.'/../vendor/autoload.php';

$routes = require __DIR__.'/../src/routes.php';
$container = require __DIR__.'/../src/container.php';

$request = Framework\Request::createFromGlobals();

try {
    $controller = $container->get('router')->match($routes, $request);

    $response = call_user_func($controller, $request);
} catch (Exception $e) {
    $response = new \Framework\Response($e->getMessage());
}

$response->send();
