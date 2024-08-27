<?php

namespace App;

use Jenssegers\Blade\Blade;

class Controller
{
    protected $blade;

    public function __construct()
    {
        $views = __DIR__ . '/../src/Views';
        $cache = __DIR__ . '/../src/cache';
        $this->blade = new Blade($views, $cache);
        
    }

    protected function render($view, $data = [])
    {
        if (!$this->blade) {
            error_log('Rendering view: ' . $view);

    try {
        $blade = new Blade($this->viewPath, $this->cachePath);
        $output = $blade->make($view)->render();
        // Debugging output
        error_log('View rendered successfully.');
        return $output;
    } catch (\Illuminate\Contracts\View\ViewNotFoundException $e) {
        // Debugging output
        error_log('View not found: ' . $e->getMessage());
        echo 'View not found.';
    } catch (\Exception $e) {
        // Debugging output
        error_log('Error rendering view: ' . $e->getMessage());
        
    }
        }

        echo $this->blade->make($view, $data);
        
    }
}


