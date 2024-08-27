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
        $this->cachePath = __DIR__ . '/Cache'; // Ensure this directory exists

        // Debugging output
        error_log('Router initialized.');
        error_log('View Path: ' . $this->viewPath);
        error_log('Cache Path: ' . $this->cachePath);
    }

    public function add($route, $callback)
    {
        $route = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $route);
        $this->routes[$route] = $callback;

        // Debugging output
        error_log('Route added: ' . $route);
        error_log('Callback: ' . print_r($callback, true));
    }

    public function dispatch($uri)
    {
        $uri = trim($uri, '/');
        error_log('Dispatching URI: ' . $uri);

        foreach ($this->routes as $route => $callback) {
            if (preg_match("#^$route$#", $uri, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                
                // Debugging output
                error_log('Route matched: ' . $route);
                error_log('Parameters: ' . print_r($params, true));

                if (class_exists($callback[0]) && method_exists($callback[0], $callback[1])) {
                    $controller = new $callback[0]();
                    $method = $callback[1];
                    $view = $controller->$method($params);

                    // Debugging output
                    error_log('View returned from controller: ' . $view);

                    return $this->render($view);
                } else {
                    // Debugging output
                    error_log('Error: Controller or method does not exist.');
                    echo "404 Not Found";
                    return;
                }
            }
        }

        // Debugging output
        error_log('Error: No matching route found.');
        echo "404 Not Found";
    }

    protected function render($view)
    {
        // Debugging output
        error_log('Rendering view: ' . $view);

        try {
            $blade = new Blade($this->viewPath, $this->cachePath);
            echo $blade->make($view)->render();
        } catch (\Exception $e) {
            // Debugging output
            error_log('Error rendering view: ' . $e->getMessage());
            
        }
    }
}
