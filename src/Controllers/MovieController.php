<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;


class MovieController extends Controller{
    public function index():void{
        $this->view('one-movie');
    }

    public function add():void{
        $this->view('admin/movies/add');
    }

    public function postAdd():void{
        dd($this->postRequest()->input('name'));
    }
}