<?php

namespace App\Kernel\Controller;

use App\Kernel\View\View;

abstract class Controller{
    private View $view;

    public function view(string $viewName):void{
        $this->view->page($viewName);
    }
    public function setView(View $view): void{$this->view = $view;}

}