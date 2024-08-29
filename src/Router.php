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
        $this->cachePath = __DIR__ . '/Cache'; 

        // Debugging output
        error_log('Router initialized.');
        error_log('View Path: ' . $this->viewPath);
        error_log('Cache Path: ' . $this->cachePath);
    }

    // Add routes for GET requests
    public function get($route, $callback)
    {
        $this->addRoute('GET', $route, $callback);
    }

    // Add routes for POST requests
    public function post($route, $callback)
    {
        $this->addRoute('POST', $route, $callback);
    }

    // Add routes for PUT requests
    public function put($route, $callback)
    {
        $this->addRoute('PUT', $route, $callback);
    }

    // Add routes for DELETE requests
    public function delete($route, $callback)
    {
        $this->addRoute('DELETE', $route, $callback);
    }

    // Add route to the routes array with the specified HTTP method
    protected function addRoute($method, $route, $callback)
    {
        $route = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $route);
        $this->routes[$method][$route] = $callback;

        error_log("Route added: [$method] " . $route);
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

                if (is_array($callback) && isset($callback[0], $callback[1])) {
                    $controller = $callback[0];
                    $method = $callback[1];
                    
                    if (class_exists($controller) && method_exists($controller, $method)) {
                        $instance = new $controller();
                        $view = $instance->$method($params);

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
        }
    }

   



    protected function render($view)
    {
        // Debugging output
        error_log('Rendering view: ' . $view);

        try {
            // Define custom view paths
            $viewPaths = [
                __DIR__ . '/Views',
                // Add other paths if necessary
            ];

            // Initialize Blade with custom view paths and cache path
        
            $blade = new Blade($this->viewPath, $this->cachePath);
            // Render the view
            echo $blade->make($view)->render();
        } catch (\Exception $e) {
            // Debugging output
            error_log('Error rendering view: ' . $e->getMessage());
            echo "Error rendering view: " . $e->getMessage();
        }
    }
}




