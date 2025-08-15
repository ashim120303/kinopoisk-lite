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
        if ($this->auth()->attempt($email, $password)){
            $this->redirect('/admin');
        }
        $this->session()->set('error', 'неверный логин или пароль');
        $this->redirect('/login');
    }

    public function logout():void
    {
        $this->auth()->logout();
        $this->redirect('/');
    }
}