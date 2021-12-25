<?php
require_once __DIR__ . '/vendor/autoload.php';

use Core\Application;

$app = new Application();

require __DIR__ . '/routes/routes.php';

$app->start();