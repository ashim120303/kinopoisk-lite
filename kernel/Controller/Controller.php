<?php

namespace App\Kernel\Controller;

use App\Kernel\Http\Redirect;
use App\Kernel\Http\RedirectInterface;
use App\Kernel\Http\Request;
use App\Kernel\Http\RequestInterface;
use App\Kernel\Session\Session;
use App\Kernel\Session\SessionInterface;
use App\Kernel\View\View;
use App\Kernel\View\ViewInterface;

abstract class Controller{
    private ViewInterface $view;
    private RequestInterface $postRequest;
    private RedirectInterface $redirect;
    private SessionInterface $session;

    public function view(string $viewName):void{
        $this->view->page($viewName);
    }
    public function setView(ViewInterface $view): void{$this->view = $view;}

    public function postRequest(): RequestInterface{return $this->postRequest;}

    public function setPostRequest(RequestInterface $postRequest): void{
        $this->postRequest = $postRequest;
    }

    public function setRedirect(RedirectInterface $redirect): void{
        $this->redirect = $redirect;
    }

    public function redirect(string $url):void{
        $this->redirect->to($url);
    }

    public function setSession(SessionInterface $session): void{
        $this->session = $session;
    }

    public function session(): SessionInterface{
        return $this->session;
    }


}