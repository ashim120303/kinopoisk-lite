<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Kernel\Http\Redirect;

class MovieController extends Controller{
    public function index():void{
        $this->view('one-movie');
    }

    public function add():void{
        $this->view('admin/movies/add');
    }

    public function postAdd():void{
        $validation = $this->postRequest()->validate([
            'name' => ['required', 'min:3', 'max:100']
        ]);
        if(!$validation){
            $this->redirect('/admin/movies/add');
        }
        dd('Validation Succeeded');
    }
}