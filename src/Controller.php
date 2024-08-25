<?php

namespace App;

class Controller
{
    protected function render($view, $data = [])
    {
        extract($data);
        include __DIR__ . "/Views/$view.php";
    }
}
