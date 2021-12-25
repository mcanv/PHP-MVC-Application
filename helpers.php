<?php

use Core\View;

function config($key, $default = null) : mixed
{
    $value = $_ENV[$key] ?? $_SERVER[$key] ?? null;
    if ($value === false) {
        return $default;
    }
    return $value;
}

function render_view($name): string
{
    return View::show($name);
}