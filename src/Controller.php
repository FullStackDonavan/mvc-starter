<?php

namespace App;

use Jenssegers\Blade\Blade;

class Controller
{
    protected $blade;

    public function __construct()
    {
        // Initialize Blade with the views directory and cache directory
        $this->blade = new Blade(__DIR__ . '/../Views', __DIR__ . '/../cache');
    }

    protected function render($view, $data = [])
    {
        echo $this->blade->make($view, $data)->render();
    }
}
