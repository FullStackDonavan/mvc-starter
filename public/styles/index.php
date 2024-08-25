<?php

require '../vendor/autoload.php';

$router = new App\Router();
require '../src/Routes/index.php';

$router->dispatch($_SERVER['REQUEST_URI']);
