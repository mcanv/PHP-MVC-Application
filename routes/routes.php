<?php

use Controllers\ApiController;
use Core\Application;
use Controllers\HomeController;

$app = new Application();
$router = $app->router;

/* Api Routes */
$router->group('/api', function($router) {
   $router->get('/', [ApiController::class, 'index']);
});

/* Main Routes */
$router->error(function() {
    echo render_view('errors.404');
});
$router->get('/', [HomeController::class, 'index']);