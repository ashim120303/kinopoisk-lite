<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class CategoriesController extends Controller{
    public function index():void{
        $this->view('categories');
    }
}