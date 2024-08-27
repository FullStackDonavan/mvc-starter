<?php

require '../vendor/autoload.php';
require '../src/Router.php';
require '../src/Container.php';
require '../src/Controllers/HomeController.php';
require '../src/Controllers/AboutController.php';
require '../src/Controllers/BlogController.php';

use App\Container;
use App\Router;
use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\BlogController;

// Set up the container
$container = new Container();
$container->bind(HomeController::class, function($container) {
    return new HomeController();
});
$container->bind(AboutController::class, function($container) {
    return new AboutController();
});
$container->bind(BlogController::class, function($container) {
    return new BlogController();
});

// Set up the router with the container
$router = new Router();
$router->add('', [HomeController::class, 'index']); // Route for the homepage
$router->add('about', [AboutController::class, 'index']); // Route for the About page
$router->add('blog', [BlogController::class, 'index']); // Route for the Blog index page
$router->add('blog/{id}', [BlogController::class, 'show']); // Route for individual blog post by ID
$router->add('blog/slug/{slug}', [BlogController::class, 'showBySlug']); // Route for individual blog post by slug

// Dispatch a URI
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'); // Get the current URI
$router->dispatch($uri);
