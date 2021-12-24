<?php

namespace Core;

class Controller extends Application
{
    public function view($view, $data = []) : string {
        return $this->view->show($view, $data);
    }
}