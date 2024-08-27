<?php

namespace App;

use Jenssegers\Blade\Blade;

class Router
{
    protected $routes = [];
    protected $viewPath;
    protected $cachePath;

    public function __construct()
    {
        $this->viewPath = __DIR__ . '/Views';
        $this->cachePath = __DIR__ . '/cache'; // Ensure this directory exists
    }

    public function add($route, $callback)
    {
        $route = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $route);
        $this->routes[$route] = $callback;
    }

    public function dispatch($uri)
    {
        $uri = trim($uri, '/');
        foreach ($this->routes as $route => $callback) {
            if (preg_match("#^$route$#", $uri, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                if (class_exists($callback[0]) && method_exists($callback[0], $callback[1])) {
                    $controller = new $callback[0]();
                    $method = $callback[1];
                    $view = $controller->$method($params);
                    return $this->render($view);
                } else {
                    echo "404 Not Found";
                    return;
                }
            }
        }
        echo "404 Not Found";
    }

    protected function render($view)
    {
        $blade = new Blade($this->viewPath, $this->cachePath);
        echo $blade->make($view)->render();
    }
}
