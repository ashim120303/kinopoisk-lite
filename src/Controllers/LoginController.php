<?php

namespace App\Controllers;
use App\Kernel\Controller\Controller;

class LoginController extends Controller{
    public function index():void{
        $this->view('login');
    }

    public function login():void
    {
        $email = $this->postRequest()->input('email');
        $password = $this->postRequest()->input('password');
        $this->auth()->attempt($email, $password);
        $this->redirect('/home');
    }

    public function logout():void
    {
        $this->auth()->logout();
        $this->redirect('/login');
    }
}