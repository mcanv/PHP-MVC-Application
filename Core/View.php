<?php

namespace Core;

use Jenssegers\Blade\Blade;

class View
{
    /**
     * @var View
     */
    public View $view;

    public static function show($view, $data = []): string
    {
        $blade = new Blade(dirname(__DIR__) . '/public/views', dirname(__DIR__) . '/public/cache');
        return $blade->render($view, $data);
    }
}