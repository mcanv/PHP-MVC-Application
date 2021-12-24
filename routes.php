<?php

use Core\Application;
use Controllers\HomeController;

$app = new Application();

$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/posts', [HomeController::class, 'posts']);
$app->router->get('/posts/:id', [HomeController::class, 'show']);
$app->router->get('/test', [HomeController::class, 'test']);