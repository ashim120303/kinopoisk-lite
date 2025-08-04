<?php

namespace App\Controllers;
use App\Kernel\Controller\Controller;

class RegisterController extends Controller{
    public function index():void{
        $this->view('register');
    }
    public function test():void{
        $this->view('testReg');
    }

    public function register()
    {
        $validation = $this->postRequest()->validate([
            'name' => ['required', 'min:2', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'min:8'],
        ]);
        if(!$validation){
            foreach($this->postRequest()->errors() as $fields=>$errors){
                $this->session()->set($fields, $errors);
            }
            $this->redirect('/register');
        }
        $this->db()->insert('user', [
            'name' => $this->postRequest()->input('name'),
            'email' => $this->postRequest()->input('email'),
            'password' => password_hash($this->postRequest()->input('password'), PASSWORD_DEFAULT),
        ]);
        $this->redirect('/login');
    }
}