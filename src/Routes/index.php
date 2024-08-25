<?php

use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\BlogController;

// Existing route
$router->add('', [HomeController::class, 'index']);

// New route for About page
$router->add('about', [AboutController::class, 'index']);

// New route for Blog page
$router->add('blog', [BlogController::class, 'index']);




