<?php

namespace Core;

use Buki\Router\Router;

class Application
{
    /**
     * @var View
     */
    public View $view;
    /**
     * @var Router
     */
    public Router $router;

    public function __construct()
    {
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
        $this->view = new View();
    }


    public function start() : void {
        $this->router->run();
    }
}