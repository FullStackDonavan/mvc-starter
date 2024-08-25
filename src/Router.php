<?php

namespace App;

class Router
{
    protected $routes = [];

    public function add($route, $callback)
    {
        $this->routes[$route] = $callback;
    }

    public function dispatch($uri)
    {
        $uri = trim($uri, '/');
        
        if (array_key_exists($uri, $this->routes)) {
            // Create an instance of the controller
            $callback = $this->routes[$uri];
            $controller = new $callback[0]();
            $method = $callback[1];
            $controller->$method(); // Call the method on the controller instance
        } else {
            echo "404 Not Found";
        }
    }
}
