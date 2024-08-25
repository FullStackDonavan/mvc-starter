<?php

namespace App;

class Router
{
    protected $routes = [];

    // Add route with optional parameters
    public function add($route, $callback)
    {
        // Convert route into a regular expression to capture dynamic segments
        $route = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $route);
        $this->routes[$route] = $callback;
    }

    // Dispatch the request to the appropriate controller method
    public function dispatch($uri)
    {
        $uri = trim($uri, '/');
        
        // Iterate through routes to find a match
        foreach ($this->routes as $route => $callback) {
            if (preg_match("#^$route$#", $uri, $matches)) {
                // Extract only the named parameters from the matches
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                
                // Ensure the controller and method exist before proceeding
                if (class_exists($callback[0]) && method_exists($callback[0], $callback[1])) {
                    $controller = new $callback[0]();
                    $method = $callback[1];
                    
                    // Call the controller method with the extracted parameters
                    return $controller->$method($params);
                } else {
                    echo "404 Not Found";
                    return;
                }
            }
        }

        // No route matched
        echo "404 Not Found";
    }
}
