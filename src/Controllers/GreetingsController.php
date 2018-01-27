<?php

namespace App\Controllers;

use Framework\Request;
use Framework\Response;

class GreetingsController
{
    /**
     * @var array
     */
    private $something;

    public function __construct(array $something)
    {
        $this->something = $something;
    }

    public function hello(Request $request)
    {
        return new Response(
            sprintf('Hello %s' . $this->something['foo'], $request->query['name'] ?: 'World')
        );
    }

    public function hellobye(Request $request)
    {
        return new Response(
            $request->attributes['id']
        );
    }
}