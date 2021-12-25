<?php

namespace Core;

use Buki\Router\Router;
use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class Application
{
    /**
     * @var Router
     */
    public Router $router;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__) . '/');
        $dotenv->load();

        $whoops = new Run();
        $whoops->pushHandler(new PrettyPageHandler());
        $whoops->register();

        $capsule = new Capsule();
        $capsule->addConnection([
            'driver'    => config('DB_DRIVER') ?? 'mysql',
            'host'      => config('DB_HOST') ?? 'localhost',
            'database'  => config('DB_NAME') ?? 'db',
            'username'  => config('DB_USER') ?? 'root',
            'password'  => config('DB_PASS') ?? '',
            'charset'   => config('DB_CHARSET') ?? 'utf8',
            'collation' => config('DB_COLLATION') ?? 'utf8_unicode_ci',
            'prefix'    => config('DB_PREFIX') ?? ''
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        $this->router = new Router([
            'paths' => [
                'controllers' => 'controllers',
                'middlewares' => 'middlewares'
            ],
            'namespaces' => [
                'controllers' => 'Controllers',
                'middlewares' => 'Middlewares'
            ]
        ]);
    }


    public function start() : void {
        $this->router->run();
    }
}