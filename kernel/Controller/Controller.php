<?php

namespace App\Kernel\Controller;

use App\Kernel\Http\Request;
use App\Kernel\View\View;

abstract class Controller{
    private View $view;
    private Request $postRequest;

    public function view(string $viewName):void{
        $this->view->page($viewName);
    }
    public function setView(View $view): void{$this->view = $view;}

    public function postRequest(): Request{return $this->postRequest;}

    public function setPostRequest(Request $postRequest): void{
        $this->postRequest = $postRequest;
    }



}