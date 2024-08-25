<?php

use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\BlogController;

// Existing route for Home page
$router->add('', [HomeController::class, 'index']);

// New route for About page
$router->add('about', [AboutController::class, 'index']);

// New route for Blog index page
$router->add('blog', [BlogController::class, 'index']);

// New dynamic route for individual blog posts by ID
$router->add('blog/{id}', [BlogController::class, 'show']);

// New dynamic route for individual blog posts by slug
$router->add('blog/slug/{slug}', [BlogController::class, 'showBySlug']);
